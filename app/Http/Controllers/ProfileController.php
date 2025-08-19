<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\CV;
use App\Models\Kandidat;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(Request $request): View
    {
        $title = 'Profile';
        $user = $request->user();
        $kandidat = Kandidat::where('user_id', $user->id)->first();
        $cv = CV::where('kandidat_id', $kandidat->id)->first();
        // return view('kandidat.index', compact('title', 'user', 'kandidat', 'cv'));
        return view('kandidat.profile', compact('title', 'user', 'kandidat', 'cv'));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    try {
        $request->validate([
            'telepon' => 'required|digits_between:10,15',
            'no_ktp' => 'required|digits:16',
            'bpjs' => 'required|digits:13',
            'npwp' => 'nullable|digits:15',
            'no_kk' => 'required|digits:16',
        ]);

        $kandidat = Kandidat::find($request->id);

        if (!$kandidat) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kandidat tidak ditemukan.',
            ], 404);
        }

        $kandidat->update([
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ktpalamat' => $request->ktpalamat,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'no_ktp' => $request->no_ktp,
            'bpjs' => $request->bpjs,
            'npwp' => $request->npwp,
            'no_kk' => $request->no_kk,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diupdate.',
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mengupdate data: ' . $th->getMessage(),
        ], 500);
    }
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateAvatar(Request $request)
{
    try {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = $request->user();
        $kandidat = \App\Models\Kandidat::where('user_id', $user->id)->first();

        if (!$kandidat) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kandidat tidak ditemukan.'
            ], 404);
        }

        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada
            if ($kandidat->foto && Storage::disk('public')->exists($kandidat->foto)) {
                Storage::disk('public')->delete($kandidat->foto);
            }

            // Simpan file baru
            $file = $request->file('avatar');
            $path = $file->store('kandidat/avatar', 'public');

            // Update kolom foto
            $kandidat->foto = $path;
            $kandidat->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Foto profil berhasil diperbarui.'
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal memperbarui foto: ' . $th->getMessage(),
        ], 500);
    }
}

    public function data($id)
    {
        $kandidat = Kandidat::where('user_id', Auth::id())->firstOrFail();
        // dd($kandidat->id);
        $data = Pekerjaan::where('kandidat_id', $kandidat->id)->get();

        return DataTables::of($data)
            ->addColumn('aksi', function ($row) {
                return '<button class="btn btn-sm btn-danger" onclick="hapusPekerjaan(' . $row->id . ')">Hapus</button>';
            })
            ->editColumn('status', function ($row) {
                return $row->status == 'aktif' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-secondary">Tidak Aktif</span>';
            })
            ->editColumn('jurusan', fn($row) => \Carbon\Carbon::parse($row->tanggal_mulai)->format('d-m-Y'))
            ->editColumn('tanggal_selesai', fn($row) => $row->tanggal_selesai ? \Carbon\Carbon::parse($row->tanggal_selesai)->format('d-m-Y') : '-')
            ->rawColumns(['aksi', 'status'])
            ->make(true);
    }
    public function dataPendidikan($id)
    {
        $kandidat = Kandidat::where('user_id', Auth::id())->firstOrFail();
        // dd($kandidat->id);
        $data = Pendidikan::where('kandidat_id', $kandidat->id)->get();

        return DataTables::of($data)
            ->addColumn('aksi', function ($row) {
                return '<button class="btn btn-sm btn-danger" onclick="hapusPendidikan(' . $row->id . ')">Hapus</button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function storePekerjaan(Request $request)
    {
        try {
            $request->validate([
                'perusahaan' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'mulai_bekerja' => 'required|date',
                'selesai_bekerja' => 'nullable|date|after_or_equal:tanggal_mulai',
                'status' => 'required|in:0,1',
            ]);

            $kandidat = Kandidat::where('user_id', Auth::id())->firstOrFail();

            $pekerjaan = new \App\Models\Pekerjaan();
            $pekerjaan->kandidat_id = $kandidat->id;
            $pekerjaan->nama_perusahaan = $request->perusahaan;
            $pekerjaan->jabatan = $request->jabatan;
            $pekerjaan->tanggal_mulai = $request->mulai_bekerja;
            $pekerjaan->tanggal_selesai = $request->selesai_bekerja;
            $pekerjaan->status = $request->status;
            $pekerjaan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambahkan Pekerjaan.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan Pekerjaan: ' . $e->getMessage(),
            ]);
        }
    }

    public function storePendidikan(Request $request)
    {
        try {
            $request->validate([
                'pendidikan' => 'required|string|max:255',
                'institusi' => 'required|string|max:255',
                'jurusan' => 'required|string|max:255',
                'nilai' => 'required|string|max:255',
                'mulai' => 'required|string|max:255',
                'selesai' => 'required|string|max:255',
            ]);

            $kandidat = Kandidat::where('user_id', Auth::id())->firstOrFail();

            $pekerjaan = new \App\Models\Pendidikan();
            $pekerjaan->kandidat_id = $kandidat->id;
            $pekerjaan->pendidikan = $request->pendidikan;
            $pekerjaan->institusi = $request->institusi;
            $pekerjaan->jurusan = $request->jurusan;
            $pekerjaan->nilai = $request->nilai;
            $pekerjaan->mulai = $request->mulai;
            $pekerjaan->selesai = $request->selesai;
            $pekerjaan->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambahkan Pendidikan.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan Pendidikan: ' . $e->getMessage(),
            ]);
        }
    }

    public function destroyPekerjaan($id)
    {
        try {
            $pekerjaan = Pekerjaan::findOrFail($id);
            $pekerjaan->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus Pekerjaan.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus Pekerjaan: ' . $e->getMessage(),
            ]);
        }
    }

    public function destroyPendidikan($id)
    {
        try {
            $pendidikan = Pendidikan::findOrFail($id);
            $pendidikan->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus Pendidikan.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menghapus Pendidikan: ' . $e->getMessage(),
            ]);
        }
    }

    public function uploadCV(Request $request)
    {
        try {
            $request->validate([
                'cv_file' => 'required|file|max:5120|mimes:pdf,doc,docx',
            ]);

            $file = $request->file('cv_file');
            $path = $file->store('file');

            $kandidat = Kandidat::where('user_id', auth()->id())->firstOrFail();

            Cv::create([
                'kandidat_id' => $kandidat->id,
                'filename' => $file->getClientOriginalName(),
                'mime' => $file->getClientMimeType(),
                'file' => $path,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Upload CV.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Upload CV: ' . $th->getMessage(),
            ]);
        }
    }

    public function previewCV($id)
    {
        $cv = Cv::findOrFail($id);

        if (!Storage::exists($cv->file)) {
            abort(404, 'File not found.');
        }

        return response()->file(storage_path("app/{$cv->file}"), [
            'Content-Type' => $cv->mime,
            'Content-Disposition' => 'inline; filename="' . $cv->filename . '"',
        ]);
    }

    public function destroyCV($id)
    {
        $cv = Cv::findOrFail($id);

        if (Storage::exists($cv->file)) {
            Storage::delete($cv->file);
        }

        $cv->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'CV berhasil dihapus.',
        ]);
    }
}
