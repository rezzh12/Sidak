@extends('admin.layouts.master')
@section('title','Data KK')
@section('judul','Data KK')

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data KK') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJurusanModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-striped table-white table-responsive-lg">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>No KK</th>
                            <th>Kepala</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($kk as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $row->no_kk }}</td>
                                <td >{{ $row->kepala }}</td>
                                <td >{{ $row->rt }}</td>
                                <td >{{ $row->rw }}</td>
                                <td >{{ $row->desa }}</td>
                                <td >{{ $row->kecamatan }}</td>
                                <td >{{ $row->kabupaten }}</td>
                                <td >{{ $row->provinsi }}</td>
                                <td >
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-jurusan" class="btn btn-xs btn-success"
                                            data-toggle="modal" data-target="#ubahJurusanModal"
                                            data-id="{{ $row->id }}"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-xs"></button>
                                            <button type="button" class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ $row->id }}', '{{ $row->no_kk }}' )"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Tambah Jurusan -->
<div class="modal fade" id="tambahJurusanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.kk.submit') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" class="form-control" name="no_kk" id="no_kk" required />
                        </div>
                        <div class="form-group">
                            <label for="kepala">Kepala</label>
                            <input type="text" class="form-control" name="kepala" id="kepala" required />
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="number" class="form-control" name="rt" id="rt" required />
                        </div>
                        <div class="form-group">
                        <label for="rw">RW</label>
                            <input type="number" class="form-control" name="rw" id="rw" required />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="desa">Desa</label>
                            <input type="text" class="form-control" name="desa" id="desa" required />
                        </div>

                        <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" required />
                        </div>
                        <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" id="kabupaten" required />
                        </div>
                        <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi" required />
                        </div>
                        </div>
                        </div>
                        </div>
                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Ubah Jurusan -->
     <div class="modal fade" id="ubahJurusanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.kk.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-no_kk">No KK</label>
                            <input type="number" class="form-control" name="no_kk" id="edit-no_kk" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-kepala">Kepala</label>
                            <input type="text" class="form-control" name="kepala" id="edit-kepala" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-rt">RT</label>
                            <input type="number" class="form-control" name="rt" id="edit-rt" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-rw">RW</label>
                            <input type="number" class="form-control" name="rw" id="edit-rw" required />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="edit-desa">Desa</label>
                            <input type="text" class="form-control" name="desa" id="edit-desa" required />
                        </div>

                        <div class="form-group">
                        <label for="edit-kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="edit-kecamatan" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" id="edit-kabupaten" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-provinsi">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="edit-provinsi" required />
                        </div>
                        </div>
                        </div>
                        </div>
                        

                <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    @stop

    @section('js')
    <script>
        //EDIT
        $(function() {
            $(document).on('click', '#btn-edit-jurusan', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataKk') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-no_kk').val(res.no_kk);
                        $('#edit-kepala').val(res.kepala);
                        $('#edit-rt').val(res.rt);
                        $('#edit-rw').val(res.rw);
                        $('#edit-desa').val(res.desa);
                        $('#edit-kecamatan').val(res.kecamatan);
                        $('#edit-kabupaten').val(res.kabupaten);
                        $('#edit-provinsi').val(res.provinsi);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

        function deleteConfirmation(npm, judul) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data dengan nama " + judul + "?!",

                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "kk/delete/" + npm,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
        
        </script>
    @stop