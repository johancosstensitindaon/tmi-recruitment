@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="includeDeleted">
                            <label class="form-check-label" for="includeDeleted">
                                Tampilkan juga data terhapus
                            </label>
                        </div>
                    </div>
                    <!--end::Search-->
                </div>
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end">

                        <button class="btn btn-primary" onclick="addLowongan()">
                            <i class="fa fa-plus"></i> Tambah Lowongan
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">


                <table class="table align-middle table-row-dashed fs-6 gy-5" id="tableLowongan">
                    <thead>
                        <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                            <th class="">No</th>
                            <th class="">Judul</th>
                            <th class="">Kode Posisi</th>
                            <th class="">Kategori</th>
                            <th class="">Department</th>
                            <th class="">Tgl Buka</th>
                            <th class="">Status</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah/Update Lowongan -->
    <div class="modal fade" id="modalLowongan" tabindex="-1" aria-labelledby="modalLowonganLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="formLowongan">
                @csrf
                <input type="hidden" name="id" id="lowongan_id"> <!-- untuk update -->
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalLowonganLabel">Tambah Lowongan</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" required>
                            </div>
                            <div class="col-md-6">
                                <label for="kode_posisi" class="form-label">Kode Posisi</label>
                                <input type="text" class="form-control" name="kode_posisi" id="kode_posisi" required>
                            </div>
                            <div class="col-md-6">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id" id="kategori_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-select" name="department_id" id="department_id" required>
                                    <option value="">-- Pilih Department --</option>
                                    @foreach ($departments as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
                                <input type="date" class="form-control" name="tanggal_buka" id="tanggal_buka" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
                                <input type="date" class="form-control" name="tanggal_tutup" id="tanggal_tutup" required>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Remarks</label>
                                <input type="text" name="catatan" id="catatan" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="kualifikasi" class="form-label">Kualifikasi</label>
                                <textarea class="form-control" name="kualifikasi" id="kualifikasi"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="persyaratan" class="form-label">Persyaratan</label>
                                <textarea class="form-control" name="persyaratan" id="persyaratan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="btnSave">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kualifikasi, #persyaratan').summernote({
                placeholder: 'Tulis disini...',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });

        $(document).ready(function() {
            const table = $('#tableLowongan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.lowongan.data') }}",
                    data: function(d) {
                        d.includeDeleted = $('#includeDeleted').is(':checked');
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'kode_posisi',
                        name: 'kode_posisi'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'department',
                        name: 'department'
                    },
                    {
                        data: 'tanggal_buka',
                        name: 'tanggal_buka'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        className: 'text-end'
                    },
                ]
            });

            $('#includeDeleted').on('change', function() {
                table.ajax.reload();
            });
        });
    </script>
    <script>
        function addLowongan() {
            $('#formLowongan')[0].reset();
            $('#lowongan_id').val('');
            $('#modalLowonganLabel').text('Tambah Lowongan');
            $('#btnSave').text('Simpan');

            $('#kualifikasi').summernote('code', '');
            $('#persyaratan').summernote('code', '');

            $('#modalLowongan').modal('show');
        }

        function editLowongan(id) {
            const url = "{{ route('admin.lowongan.edit', ':id') }}".replace(':id', id);

            $.get(url, function(data) {
                $('#formLowongan')[0].reset();
                $('#lowongan_id').val(data.id);
                $('#judul').val(data.judul);
                $('#kode_posisi').val(data.kode_posisi);
                $('#kategori_id').val(data.kategori_id);
                $('#department_id').val(data.department_id);
                $('#tanggal_buka').val(data.tanggal_buka);
                $('#tanggal_tutup').val(data.tanggal_tutup);
                $('#status').val(data.status);
                $('#catatan').val(data.catatan);

                $('#kualifikasi').summernote('code', data.kualifikasi ?? '');
                $('#persyaratan').summernote('code', data.persyaratan ?? '');

                $('#modalLowonganLabel').text('Edit Lowongan');
                $('#btnSave').text('Update');
                $('#modalLowongan').modal('show');
            });
        }



        // Submit form (tambah / update)
        $('#formLowongan').on('submit', function(e) {
            e.preventDefault();
            const id = $('#lowongan_id').val();
            const url = id ?
                "{{ route('admin.lowongan.update', ':id') }}".replace(':id', id) :
                "{{ route('admin.lowongan.store') }}";

            let formData = $(this).serialize();
            if (id) {
                formData += '&_method=PUT'; // <── tambahin ini
            }

            $.ajax({
                url: url,
                type: "POST", // selalu POST
                data: formData,
                success: function(res) {
                    $('#modalLowongan').modal('hide');
                    $('#formLowongan')[0].reset();
                    $('#tableLowongan').DataTable().ajax.reload();
                    toastr.success(id ? 'Lowongan berhasil diupdate' : 'Lowongan berhasil ditambahkan');
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan, coba lagi');
                }
            });
        });

        function deleteLowongan(id) {
            Swal.fire({
                title: 'Yakin hapus lowongan ini?',
                text: "Data akan masuk ke daftar terhapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lowongan.destroy', ':id') }}".replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            $('#tableLowongan').DataTable().ajax.reload();
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal menghapus data.',
                            });
                        }
                    });
                }
            });
        }

        function restoreLowongan(id) {
            Swal.fire({
                title: 'Pulihkan lowongan ini?',
                text: "Data akan dikembalikan seperti semula",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, pulihkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lowongan.restore', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            $('#tableLowongan').DataTable().ajax.reload();
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Gagal memulihkan data.',
                            });
                        }
                    });
                }
            });
        }

        function forceLowongan(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data lowongan ini akan dihapus permanen dan tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus permanen!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lowongan.forceDelete', ':id') }}".replace(':id', id),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            if (res.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: res.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                $('#tableLowongan').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: res.message
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: xhr.responseJSON?.message || "Terjadi kesalahan!"
                            });
                        }
                    });
                }
            });
        }

        // ketika switch diklik
        $(document).on('change', '.toggle-status', function() {
            let id = $(this).data('id');
            let isChecked = $(this).is(':checked');
            let newStatus = isChecked ? 'Aktif' : 'Nonaktif';

            Swal.fire({
                title: 'Ubah Status?',
                text: "Apakah kamu yakin ingin mengubah status ke " + newStatus + "?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.lowongan.toggle', ':id') }}".replace(':id', id),
                        type: "PATCH",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            if (res.success) {
                                Swal.fire('Berhasil!', res.message, 'success');
                                $('#tableLowongan').DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire('Gagal!', res.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', xhr.responseJSON.message, 'error');
                            $('#tableLowongan').DataTable().ajax.reload(null, false);
                        }
                    });
                } else {
                    // kalau batal → kembalikan posisi switch
                    $(this).prop('checked', !isChecked);
                }
            });
        });
    </script>
@endpush
