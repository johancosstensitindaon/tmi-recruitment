<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Kategori;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class LowonganController extends Controller
{
    public function index()
    {
        $title = 'Lowongan';
        $kategoris = Kategori::all();
        $departments = Department::all();
        return view('admin.lowongan', compact('title', 'kategoris', 'departments'));
    }

    public function indexDepartment()
    {
        $title = 'Department';
        return view('admin.department', compact('title'));
    }

    public function indexKategori()
    {
        $title = 'Kategori';
        return view('admin.kategori', compact('title'));
    }

    public function dataDepartment(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::select(['id', 'kode', 'nama']);

            return DataTables::of($departments)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return '
                        <button type="button" class="btn btn-sm btn-light-primary me-1" onclick="editDepartment(' .
                        $row->id .
                        ')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light-danger" onclick="deleteDepartment(' .
                        $row->id .
                        ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function dataKategori(Request $request)
    {
        if ($request->ajax()) {
            $kategoris = Kategori::select(['id', 'nama']);

            return DataTables::of($kategoris)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return '
                        <button type="button" class="btn btn-sm btn-light-primary me-1" onclick="editKategori(' .
                        $row->id .
                        ')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light-danger" onclick="deleteKategori(' .
                        $row->id .
                        ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
    }

    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }

    public function editKategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        return response()->json($kategori);
    }

    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:departments,kode,' . $id,
            'nama' => 'required',
        ]);

        try {
            $department = Department::findOrFail($id);
            $department->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Department berhasil diperbarui.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal memperbarui department: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->update([
                'nama' => $request->nama,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil diperbarui.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal memperbarui Kategori: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:departments,kode',
            'nama' => 'required',
        ]);

        try {
            Department::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Department berhasil ditambahkan.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan department: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            Kategori::create([
                'nama' => $request->nama,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil ditambahkan.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan Kategori: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function destroyDepartment($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Department berhasil dihapus.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal menghapus department: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function destroyKategori($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Kategori berhasil dihapus.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Gagal menghapus Kategori: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function dataLowongan(Request $request)
    {
        if ($request->ajax()) {
            $query = Lowongan::with(['kategori', 'department']);
            if ($request->boolean('includeDeleted')) {
                $query = $query->withTrashed();
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('kategori', function ($row) {
                    Log::info($row->kategori);
                    return $row->kategori->nama ?? '-';
                })
                ->editColumn('department', fn($row) => $row->department->nama ?? '-')
                ->editColumn('tanggal_buka', fn($row) => \Carbon\Carbon::parse($row->tanggal_buka)->format('d M Y'))
                // ->addColumn('status', function ($row) {
                //     if ($row->trashed()) {
                //         return '<span class="badge bg-danger">Terhapus</span>';
                //     }
                //     return $row->status === 'aktif' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>';
                // })
                ->addColumn('status', function ($row) {
                    $checked = $row->status === 'aktif' ? 'checked' : '';
                    return '
        <div class="form-check form-switch">
            <input class="form-check-input toggle-status" type="checkbox" data-id="' .
                        $row->id .
                        '" ' .
                        $checked .
                        '>
        </div>
    ';
                })
                ->addColumn('action', function ($row) {
                    $toggleBtn =
                        '<button class="btn btn-sm ' .
                        ($row->aktif ? 'btn-warning' : 'btn-success') .
                        '"
                    onclick="toggleStatus(' .
                        $row->id .
                        ')">
                    <i class="fa ' .
                        ($row->aktif ? 'fa-ban' : 'fa-check') .
                        '"></i> ' .
                        ($row->aktif ? 'Nonaktifkan' : 'Aktifkan') .
                        '
                  </button>';

                    return $toggleBtn;
                })
                ->addColumn('aksi', function ($row) {
                    if ($row->trashed()) {
                        return '
                        <button class="btn btn-sm btn-light-success" onclick="restoreLowongan(' .
                            $row->id .
                            ')">
                            <i class="fa fa-undo"></i> Pulihkan
                        </button>
                        <button class="btn btn-sm btn-light-danger" onclick="forceLowongan(' .
                            $row->id .
                            ')">
                            <i class="fa fa-trash"></i> Hapus Permanen
                        </button>';
                    } else {
                        return '
                        <button class="btn btn-sm btn-light-primary" onclick="editLowongan(' .
                            $row->id .
                            ')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-light-danger" onclick="deleteLowongan(' .
                            $row->id .
                            ')">
                            <i class="fa fa-trash"></i>
                        </button>';
                    }
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }
    }

    public function storeLowongan(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'kode_posisi' => 'required|string|max:255',
                'kategori_id' => 'required|exists:kategoris,id',
                'department_id' => 'required|exists:departments,id',
                'tanggal_buka' => 'required|date',
                'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
                'status' => 'required|in:aktif,nonaktif',
            ]);

            Lowongan::create([
                'judul' => $request->judul,
                'kode_posisi' => $request->kode_posisi,
                'kategori_id' => $request->kategori_id,
                'department_id' => $request->department_id,
                'tanggal_buka' => $request->tanggal_buka,
                'tanggal_tutup' => $request->tanggal_tutup,
                'status' => $request->status,
                'kualifikasi' => $request->kualifikasi,
                'persyaratan' => $request->persyaratan,
                'catatan' => $request->catatan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Lowongan berhasil ditambahkan.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat menyimpan data.',
                ],
                500,
            );
        }
    }

    public function updateLowongan(Request $request, $id)
    {
        try {
            $lowongan = Lowongan::findOrFail($id);

            $request->validate([
                'judul' => 'required|string|max:255',
                'kode_posisi' => 'required|string|max:255',
                'kategori_id' => 'required|exists:kategoris,id',
                'department_id' => 'required|exists:departments,id',
                'tanggal_buka' => 'required|date',
                'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
                'status' => 'required|in:aktif,nonaktif',
            ]);

            $lowongan->update([
                'judul' => $request->judul,
                'kode_posisi' => $request->kode_posisi,
                'kategori_id' => $request->kategori_id,
                'department_id' => $request->department_id,
                'tanggal_buka' => $request->tanggal_buka,
                'tanggal_tutup' => $request->tanggal_tutup,
                'status' => $request->status,
                'kualifikasi' => $request->kualifikasi,
                'persyaratan' => $request->persyaratan,
                'catatan' => $request->catatan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Lowongan berhasil diperbarui.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat memperbarui data.',
                ],
                500,
            );
        }
    }

    public function editLowongan($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return response()->json($lowongan);
    }

    public function destroyLowongan($id)
    {
        try {
            $lowongan = Lowongan::findOrFail($id);
            $lowongan->delete(); // soft delete

            return response()->json([
                'status' => 'success',
                'message' => 'Lowongan berhasil dihapus (soft delete).',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat menghapus data.',
                ],
                500,
            );
        }
    }

    public function restoreLowongan($id)
    {
        try {
            $lowongan = Lowongan::withTrashed()->findOrFail($id);
            $lowongan->restore();

            return response()->json([
                'status' => 'success',
                'message' => 'Lowongan berhasil dipulihkan.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat memulihkan data.',
                ],
                500,
            );
        }
    }

    public function forceDelete($id)
    {
        try {
            $lowongan = Lowongan::withTrashed()->findOrFail($id);
            $lowongan->forceDelete();

            return response()->json([
                'success' => true,
                'message' => 'Lowongan berhasil dihapus permanen.',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal menghapus permanen: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function toggleStatus($id)
{
    try {
        $lowongan = Lowongan::findOrFail($id);
        $status = '';
        if ($lowongan->status === 'aktif') {
            $status = 'nonaktif';
        }
        if ($lowongan->status === 'nonaktif') {
            $status = 'aktif';
        }
        $lowongan->status = $status;
        $lowongan->save();

        return response()->json([
            'success' => true,
            'message' => 'Status diubah ke ' . $status,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal: ' . $e->getMessage(),
        ], 500);
    }
}

}
