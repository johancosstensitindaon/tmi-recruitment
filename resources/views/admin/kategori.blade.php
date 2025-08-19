@extends('admin.layouts.app')
@section('css')

@endsection
@section('content')
<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button class="btn btn-primary" onclick="openAddKategori()">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="tableKategori">
                <thead>
                    <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">No</th>
                        <th class="min-w-125px">Name</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalKategori" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formKategori" class="modal-content">
            @csrf
            <input type="hidden" name="_method" value="">
            <input type="hidden" name="id" id="KategoriId">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriTitle">Tambah Kategori</h5>
                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btnSaveKategori">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
            $('#tableKategori').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.kategori.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'text-end'
                    },
                ]
            });
        });

        function deleteKategori(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data Kategori yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    showSwalLoader('Menghapus...', 'Sedang menghapus data Kategori.');
                    $.ajax({
                        url: '/admin/kategori/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            hideSwalLoader();
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data Kategori berhasil dihapus.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            $('#tableKategori').DataTable().ajax.reload();
                        },
                        error: function(err) {
                            hideSwalLoader();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                            });
                        }
                    });
                }
            });
        }

        let saveMethod = 'create';

        function openAddKategori() {
            saveMethod = 'create';
            $('#formKategori')[0].reset();
            $('#modalKategoriTitle').text('Tambah Kategori');
            $('#KategoriId').val('');
            $('#modalKategori').modal('show');
        }

        $('#formKategori').submit(function(e) {
            e.preventDefault();

            const id = $('#KategoriId').val();
            const formData = $(this).serializeArray();

            if (saveMethod !== 'create') {
                formData.push({
                    name: '_method',
                    value: 'PUT'
                });
            }

            showSwalLoader('Menyimpan...');

            const url = saveMethod === 'create' ?
                '/admin/kategori' :
                '/admin/kategori/' + id;

            $.ajax({
                url: url,
                type: 'POST',
                data: $.param(formData),
                success: function(res) {
                    hideSwalLoader();
                    $('#modalKategori').modal('hide');
                    $('#tableKategori').DataTable().ajax.reload(null, false);

                    Swal.fire('Berhasil', res.message, 'success');
                },
                error: function(xhr) {
                    hideSwalLoader();
                    let msg = 'Terjadi kesalahan.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }

                    Swal.fire('Gagal', msg, 'error');
                }
            });
        });
        function editKategori(id) {
            showSwalLoader('Memuat Data...');
            $.get("{{ route('admin.kategori.edit', ['id' => '__id__']) }}".replace('__id__', id), function(data) {
                hideSwalLoader();

                Swal.fire({
                    title: 'Edit Kategori',
                    html: `
                        <input id="editNama" class="swal2-input" placeholder="Nama" value="${data.nama}">
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal',
                    focusConfirm: false,
                    preConfirm: () => {
                        const nama = document.getElementById('editNama').value;

                        if (!nama) {
                            Swal.showValidationMessage('Semua field wajib diisi');
                            return false;
                        }

                        return {
                            nama: nama
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        showSwalLoader('Menyimpan...');
                        const routeUpdateKategori = `{{ route('admin.kategori.update', ['id' => '__ID__']) }}`;
                        const url = routeUpdateKategori.replace('__ID__', id);
                        $.ajax({
                            url: url,
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}',
                                nama: result.value.nama,
                            },
                            success: function() {
                                hideSwalLoader();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Data berhasil diperbarui.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                $('#tableKategori').DataTable().ajax.reload();
                            },
                            error: function() {
                                hideSwalLoader();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat update data.'
                                });
                            }
                        });
                    }
                });
            });
        }
</script>
@endpush
