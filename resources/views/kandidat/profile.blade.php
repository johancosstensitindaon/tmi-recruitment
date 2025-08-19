@extends('kandidat.layouts.app')
@section('css')
    <style>
        .accordion-button:not(.collapsed) {
            background-color: #295ba7 !important;
            color: #fff !important;
            box-shadow: none;
        }
    </style>
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bold fs-1">Data Diri</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Accordion-->
        <div class="accordion" id="kt_accordion_1">
            <div class="accordion-item active">
                <h2 class="accordion-header" id="kt_accordion_1_header_1">
                    <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                        Data Pribadi
                    </button>
                </h2>
                <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                    aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <form class="form" action="{{ route('profile.update') }}" id="formUpdateProfile">
                            <input type="hidden" name="id" value="{{ $kandidat->id }}">
                            <div class="row">
                                @php
                                    $photo = asset('storage/' . $kandidat->foto);
                                @endphp
                                <!-- Kolom Foto -->
                                <div
                                    class="col-md-3 d-flex flex-column align-items-center justify-content-start bg-light p-5">
                                    <h6 class="fw-bold mb-4">Data Pribadi</h6>
                                    <div class="symbol symbol-circle w-150px h-150px mb-4"
                                        style="background-image: url('{{ $photo ?? asset('assets/media/svg/files/blank-image.svg') }}'); background-size: cover; background-position: center;">
                                    </div>

                                    <!-- Optional: upload avatar -->
                                    <label class="btn btn-sm btn-light-primary">
                                        Ganti Foto
                                        <input type="file" name="avatar" id="avatar-upload" accept=".png, .jpg, .jpeg"
                                            hidden>
                                    </label>
                                </div>

                                <!-- Kolom Form -->
                                <div class="col-md-9 bg-white p-5">
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold required">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control border-primary mb-3"
                                                value="{{ $kandidat->nama }}">
                                            <label class="form-label fw-semibold required">Alamat Email</label>
                                            <input type="email" name="email" class="form-control border-primary"
                                                value="{{ $kandidat->email }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold required">Alamat Sesuai KTP</label>
                                            <textarea name="ktpalamat" class="form-control border-primary" rows="3">{{ $kandidat->ktpalamat }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold required">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir"
                                                class="form-control border-primary mb-3"
                                                value="{{ $kandidat->tanggal_lahir }}">
                                            <label class="form-label fw-semibold required">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control border-primary"
                                                value="{{ $kandidat->tempat_lahir }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold required">Alamat Tempat Tinggal</label>
                                            <textarea name="alamat" class="form-control border-primary" rows="3">{{ $kandidat->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-white p-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="" class="form-select border-primary">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="1" @if ($kandidat->jenis_kelamin == 1) selected @endif>
                                                    Laki -
                                                    Laki</option>
                                                <option value="2" @if ($kandidat->jenis_kelamin == 2) selected @endif>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">Status Pernikahan</label>
                                            <select name="status_pernikahan" id="" class="form-select border-primary">
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value="1" @if ($kandidat->status_pernikahan == 1) selected @endif>
                                                    Lajang</option>
                                                <option value="2" @if ($kandidat->status_pernikahan == 2) selected @endif>
                                                    Menikah</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">Suku</label>
                                            <select name="suku" id="" class="form-select border-primary">
                                                <option value="" disabled {{ $kandidat->suku == '' ? 'selected' : '' }}>Pilih Suku</option>
                                                <option value="Aceh" {{ $kandidat->suku == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                                                <option value="Batak" {{ $kandidat->suku == 'Batak' ? 'selected' : '' }}>Batak</option>
                                                <option value="Minangkabau" {{ $kandidat->suku == 'Minangkabau' ? 'selected' : '' }}>Minangkabau</option>
                                                <option value="Melayu" {{ $kandidat->suku == 'Melayu' ? 'selected' : '' }}>Melayu</option>
                                                <option value="Sunda" {{ $kandidat->suku == 'Sunda' ? 'selected' : '' }}>Sunda</option>
                                                <option value="Jawa" {{ $kandidat->suku == 'Jawa' ? 'selected' : '' }}>Jawa</option>
                                                <option value="Betawi" {{ $kandidat->suku == 'Betawi' ? 'selected' : '' }}>Betawi</option>
                                                <option value="Madura" {{ $kandidat->suku == 'Madura' ? 'selected' : '' }}>Madura</option>
                                                <option value="Bali" {{ $kandidat->suku == 'Bali' ? 'selected' : '' }}>Bali</option>
                                                <option value="Sasak" {{ $kandidat->suku == 'Sasak' ? 'selected' : '' }}>Sasak</option>
                                                <option value="Dayak" {{ $kandidat->suku == 'Dayak' ? 'selected' : '' }}>Dayak</option>
                                                <option value="Banjar" {{ $kandidat->suku == 'Banjar' ? 'selected' : '' }}>Banjar</option>
                                                <option value="Bugis" {{ $kandidat->suku == 'Bugis' ? 'selected' : '' }}>Bugis</option>
                                                <option value="Makassar" {{ $kandidat->suku == 'Makassar' ? 'selected' : '' }}>Makassar</option>
                                                <option value="Toraja" {{ $kandidat->suku == 'Toraja' ? 'selected' : '' }}>Toraja</option>
                                                <option value="Manado" {{ $kandidat->suku == 'Manado' ? 'selected' : '' }}>Manado</option>
                                                <option value="Papua" {{ $kandidat->suku == 'Papua' ? 'selected' : '' }}>Papua</option>
                                                <option value="Lainnya" {{ $kandidat->suku == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">No Telp (WhatsApp)</label>
                                            <input type="text" name="telepon" class="form-control border-primary"
                                                value="{{ $kandidat->telepon }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 bg-white p-5">
                                    <div class="row mb-7">
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">NPWP</label>
                                            <input type="text" name="npwp" class="form-control border-primary"
                                                value="{{ $kandidat->npwp }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">No. BPJS</label>
                                            <input type="text" name="bpjs" class="form-control border-primary"
                                                value="{{ $kandidat->bpjs }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">No. KTP</label>
                                            <input type="text" name="no_ktp" class="form-control border-primary"
                                                value="{{ $kandidat->no_ktp }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-semibold required">No Kartu Keluarga</label>
                                            <input type="text" name="no_kk" class="form-control border-primary"
                                                value="{{ $kandidat->no_kk }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <button type="submit" id="btnsimpan" class="btn btn-light-primary ">
                                    <span class="indicator-label">Simpan</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_2">
                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_2" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_2">
                        Riwayat Hidup / Curriculum Vitae (CV)
                    </button>
                </h2>
                <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold required mb-3">
                                    Unggah Curriculum Vitae (CV)
                                </label>
                                <!--end::Label-->

                                <!--begin::Upload wrapper-->
                                <div class="d-flex align-items-center">
                                    <!-- Upload icon -->
                                    <div class="symbol symbol-50px me-4 bg-light-primary">
                                        <i class="ki-outline ki-upload fs-2x text-primary"></i>
                                    </div>

                                    <!-- Upload input + filename preview -->
                                    <div class="flex-grow-1">
                                        <form id="cv-form" enctype="multipart/form-data">
                                            <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">
                                            <input type="file" class="form-control form-control-solid" name="cv_file"
                                                accept=".pdf,.doc,.docx" id="cv-upload">
                                            <div class="form-text mt-1">Format: PDF, DOC, DOCX. Maks 1MB.</div>
                                            <div id="cv-filename" class="text-muted mt-2 d-none"><i
                                                    class="ki-outline ki-document fs-5 me-1"></i><span></span></div>
                                        </form>
                                    </div>
                                </div>
                                <!--end::Upload wrapper-->
                                @if ($cv && $cv->id)
                                    <div class="d-flex align-items-center mb-3">
                                        {{-- <a href="{{ asset('storage/' . $kandidat->cv) }}" target="_blank" class="btn btn-sm btn-light-success me-2">
                                <i class="ki-outline ki-eye fs-5"></i> Lihat CV
                            </a> --}}
                                        <a
                                            @if ($cv && $cv->id) href="{{ route('cv.preview', $cv->id) }}"
                                target="_blank"
                                title="Lihat CV"
                                class="btn btn-info btn-sm mt-3 me-3"
                                @else
                                href="#"
                                class="btn btn-info btn-sm mt-3 disabled me-3"
                                title="CV belum diunggah"
                                disabled @endif>
                                            <i class="fa fa-eye"></i> Lihat CV
                                        </a>
                                        @if ($cv && $cv->id)
                                            <button class="btn btn-sm btn-light-danger mt-3"
                                                onclick="deleteCV({{ $cv->id }})">
                                                <i class="fa fa-trash"></i> Hapus CV
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-light-danger mt-3" disabled>
                                                <i class="fa fa-trash"></i> Hapus CV
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_3">
                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_3" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_3">
                        Pendidikan Formal
                    </button>
                </h2>
                <div id="kt_accordion_1_body_3" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataPendidikan">
                                <thead>
                                    <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">Jenjang Pendidikan</th>
                                        <th class="min-w-100px">Institusi</th>
                                        <th class="min-w-100px">Jurusan</th>
                                        <th class="min-w-100px">Nilai/IPK</th>
                                        <th class="min-w-100px">Mulai</th>
                                        <th class="min-w-100px">Selesai</th>
                                        <th class="min-w-100px"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <button class="btn btn-primary mt-5" data-bs-toggle="modal"
                            data-bs-target="#modalpendidikan">Tambah
                            Pendidikan</button>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_4">
                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_4" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_4">
                        Pengalaman Kerja
                    </button>
                </h2>
                <div id="kt_accordion_1_body_4" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="dataPekerjaan">
                                <thead>
                                    <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">Perusahaan</th>
                                        <th class="min-w-100px">Jabatan</th>
                                        <th class="min-w-100px">Mulai Bekerja</th>
                                        <th class="min-w-100px">Selesai Bekerja</th>
                                        <th class="min-w-100px">Status</th>
                                        <th class="min-w-100px">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <button class="btn btn-primary mt-5" data-bs-toggle="modal"
                            data-bs-target="#modalpekerjaan">Tambah
                            Pekerjaan</button>

                    </div>
                </div>
            </div>
        </div>
        <!--end::Accordion-->
    </div>
    <!--end::Content-->
    <div class="modal fade" id="modalpendidikan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Pendidikan</h2>
                    <div class="btn btn-icon btn-sm btn-active-color-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <form id="formPendidikan" action="{{ route('kandidat.pendidikan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">
                    <div class="modal-body py-10">
                        <div class="mb-10">
                            <label class="form-label required">Jenjang Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan"
                                placeholder="Masukkan Jenjang Pendidikan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Institusi</label>
                            <input type="text" class="form-control" name="institusi"
                                placeholder="Masukkan Institusi" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Nilai/IPK</label>
                            <input type="text" class="form-control" name="nilai"
                                placeholder="Masukkan Nilai/IPK" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Mulai</label>
                            <input type="text" class="form-control" name="mulai" placeholder="Masukkan Mulai" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Selesai</label>
                            <input type="text" class="form-control" name="selesai" placeholder="Masukkan Selesai" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Silahkan Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalpekerjaan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Riwayat Pekerjaan</h2>
                    <div class="btn btn-icon btn-sm btn-active-color-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <form id="formPekerjaan" action="{{ route('kandidat.pekerjaan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">
                    <div class="modal-body py-10">
                        <div class="mb-10">
                            <label class="form-label required">Perusahaan</label>
                            <input type="text" class="form-control" name="perusahaan"
                                placeholder="Masukkan Nama Perusahaan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan" />
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-6">
                                <label class="form-label required">Mulai Bekerja</label>
                                <input type="date" class="form-control" name="mulai_bekerja" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Selesai Bekerja</label>
                                <input type="date" class="form-control" name="selesai_bekerja" />
                            </div>
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-select">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Silahkan Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('avatar-upload').addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('avatar', file);
            formData.append('kandidat_id', '{{ $kandidat->id }}');

            fetch("{{ route('kandidat.update.avatar') }}", {
                    method: "POST",
                    body: formData
                })
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) throw new Error(data.message);
                    toastr.success(data.message || 'Foto berhasil diunggah');
                    location.reload();
                })
                .catch(err => {
                    console.error(err);
                    toastr.error(err.message || 'Terjadi kesalahan saat upload');
                });
        });


        window.deleteCV = function(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/cv/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                toastr.success(data.message);
                                location.reload(); // atau update tampilan tanpa reload
                            } else {
                                toastr.error('Gagal menghapus CV: ' + data.message);
                            }
                        })
                        .catch(error => {
                            toastr.error('Terjadi kesalahan: ' + error);
                        });
                }
            });
        }

        window.hapusPekerjaan = function(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('pekerjaan.destroy', '') }}/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            toastr.success(res.message);
                            $('#dataPekerjaan').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            toastr.error('Gagal menghapus data');
                        }
                    });
                }
            });
        }

        window.hapusPendidikan = function(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('pendidikan.destroy', '') }}/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            toastr.success(res.message);
                            $('#dataPendidikan').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            toastr.error('Gagal menghapus data');
                        }
                    });
                }
            });
        }

        $('#formPekerjaan').on('submit', function(e) {
            e.preventDefault(); // stop form default

            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    showSwalLoader('Menyimpan...', 'Mohon tunggu sebentar');
                },
                success: function(response) {
                    $('#formPekerjaan')[0].reset();
                    $('#modalpekerjaan').modal('hide');
                    $('#dataPekerjaan').DataTable().ajax.reload();
                    hideSwalLoader();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    hideSwalLoader();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                    });
                }
            });
        });

        $('#formPendidikan').on('submit', function(e) {
            e.preventDefault(); // stop form default

            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    showSwalLoader('Menyimpan...', 'Mohon tunggu sebentar');
                },
                success: function(response) {
                    $('#formPendidikan')[0].reset();
                    $('#modalpendidikan').modal('hide');
                    $('#dataPendidikan').DataTable().ajax.reload();
                    hideSwalLoader();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    hideSwalLoader();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                    });
                }
            });
        });

        document.getElementById('cv-upload').addEventListener('change', function() {
            const file = this.files[0];
            const form = document.getElementById('cv-form'); // ← Ambil elemen <form> yang benar

            const formData = new FormData(form); // ← Ini sekarang valid
            formData.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('cv.upload') }}", {
                    method: "POST",
                    body: formData
                })
                .then(async res => {
                    if (!res.ok) {
                        const errorData = await res.json();
                        throw new Error(errorData.message || 'Upload gagal');
                    }
                    return res.json();
                })
                .then(data => {
                    toastr.success(data.message || 'CV berhasil diunggah');
                    location.reload();
                })
                .catch(err => {
                    console.error(err);
                    toastr.error(err.message || 'Terjadi kesalahan saat upload');
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            let id = {{ Auth::id() }};

            $('#dataPekerjaan').DataTable({
                processing: true,
                serverSide: true,
                info: false,
                searching: false,
                paging: false,
                ajax: '{{ route('kandidat.pekerjaan.data', Auth::id()) }}',
                columns: [{
                        data: 'nama_perusahaan',
                        name: 'nama_perusahaan'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai'
                    },
                    {
                        data: 'tanggal_selesai',
                        name: 'tanggal_selesai'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#dataPendidikan').DataTable({
                processing: true,
                serverSide: true,
                info: false,
                searching: false,
                paging: false,
                ajax: '{{ route('kandidat.pendidikan.data', Auth::id()) }}',
                columns: [{
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'institusi',
                        name: 'institusi'
                    },
                    {
                        data: 'jurusan',
                        name: 'jurusan'
                    },
                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                    {
                        data: 'mulai',
                        name: 'mulai',
                    },
                    {
                        data: 'selesai',
                        name: 'selesai',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#formUpdateProfile').on('submit', function(e) {
                e.preventDefault();

                const telepon = $('input[name="telepon"]').val().trim();
                const no_ktp = $('input[name="no_ktp"]').val().trim();
                const bpjs = $('input[name="bpjs"]').val().trim();
                const npwp = $('input[name="npwp"]').val().trim();
                const no_kk = $('input[name="no_kk"]').val().trim();

                const regexAngka = /^[0-9]+$/;

                if (!regexAngka.test(telepon) || telepon.length < 10 || telepon.length > 15) {
                    Swal.fire('Error', 'Nomor HP harus berupa angka 10-15 digit.', 'error');
                    return;
                }

                if (!regexAngka.test(no_ktp) || no_ktp.length !== 16) {
                    Swal.fire('Error', 'No KTP harus 16 digit angka.', 'error');
                    return;
                }

                if (!regexAngka.test(bpjs) || bpjs.length !== 13) {
                    Swal.fire('Error', 'No BPJS harus 13 digit angka.', 'error');
                    return;
                }

                if (npwp && (!regexAngka.test(npwp) || npwp.length !== 15)) {
                    Swal.fire('Error', 'No NPWP harus 15 digit angka jika diisi.', 'error');
                    return;
                }

                if (!regexAngka.test(no_kk) || no_kk.length !== 16) {
                    Swal.fire('Error', 'No KK harus 16 digit angka.', 'error');
                    return;
                }

                let form = $(this)[0];
                let formData = new FormData(form);

                $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                beforeSend: function() {
                showSwalLoader('Menyimpan...', 'Mohon tunggu sebentar');
                },
                success: function(response) {
                hideSwalLoader();

                if (response.status === 'success') {
                Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
                });
                } else {
                Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: response.message
                });
                }
                },
                error: function(xhr) {
                hideSwalLoader();

                let message = 'Terjadi kesalahan.';

                // Ambil pesan dari JSON jika tersedia
                if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
                }

                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: message,
                });
                }
                });
            });
        });
    </script>
@endpush
