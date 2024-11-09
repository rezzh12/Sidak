@extends('admin.layouts.master')
@section('title','Data Penduduk')
@section('judul','Data Penduduk')

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Penduduk') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJurusanModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-striped table-white table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($penduduk as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $row->kk->no_kk }}</td>
                                <td >{{ $row->nik }}</td>
                                <td >{{ $row->nama }}</td>
                                <td >{{ $row->tempat_lahir }}</td>
                                <td >{{ $row->tgl_lahir }}</td>
                                <td >{{ $row->gender }}</td>
                                <td >{{ $row->agama }}</td>
                                <td >{{ $row->pendidikan }}</td>
                                <td >{{ $row->pekerjaan }}</td>
                                <td >{{ $row->status }}</td>
                                <td >
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-jurusan" class="btn btn-xs btn-success"
                                            data-toggle="modal" data-target="#ubahJurusanModal"
                                            data-id="{{ $row->id }}"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-xs"></button>
                                            <button type="button" class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ $row->id }}', '{{ $row->nik }}' )"><i class="fa fa-times"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.penduduk.submit') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" class="form-control" name="no_kk" id="no_kk" required />
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" name="nik" id="nik" required />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required />
                        </div>
                        <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required />
                        </div>
                        <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required />
                        </div>
                        
                      

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen </option>
                            <option value="Katolik">Katolik </option>
                            <option value="Hindu">Hindu </option>
                            <option value="Buddha">Buddha </option>
                            <option value="Khonghucu">Khonghucu </option>
                            <option value="Lainnya">Lainnya </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="pendidikan" required>
                            <option value="">Pilih Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP/MTS">SMP/MTS </option>
                            <option value="SMA/SMK">SMA/SMK </option>
                            <option value="D3/D4">D3/D4 </option>
                            <option value="S1">S1 </option>
                            <option value="S2">S2 </option>
                            <option value="S3">S3 </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                            <option value="">Pilih Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                            <option value="">Pilih Pekerjaan</option>
                            <option value="PNS">PNS</option>
                            <option value="Pedagang">Pedaganag </option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh </option>
                            <option value="Wiraswasta">Wiraswasta </option>
                            <option value="Pegawai Swasta">Pegawai Swasta </option>
                           </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.penduduk.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-nik">NIK</label>
                            <input type="number" class="form-control" name="nik" id="edit-nik" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="edit-tempat_lahir" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="edit-tgl_lahir" required />
                        </div>
                   

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="edit-gender">Gender</label>
                            <select name="gender" id="edit-gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-agama">Agama</label>
                            <select class="form-control" name="agama" id="edit-agama" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen </option>
                            <option value="Katolik">Katolik </option>
                            <option value="Hindu">Hindu </option>
                            <option value="Buddha">Buddha </option>
                            <option value="Khonghucu">Khonghucu </option>
                            <option value="Lainnya">Lainnya </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-pendidikan">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="edit-pendidikan" required>
                            <option value="">Pilih Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP/MTS">SMP/MTS </option>
                            <option value="SMA/SMK">SMA/SMK </option>
                            <option value="D3/D4">D3/D4 </option>
                            <option value="S1">S1 </option>
                            <option value="S2">S2 </option>
                            <option value="S3">S3 </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-status">Status</label>
                            <select class="form-control" name="status" id="edit-status" required>
                            <option value="">Pilih Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-pekerjaan">Pekerjaan</label>
                            <select class="form-control" name="pekerjaan" id="edit-pekerjaan" required>
                            <option value="">Pilih Pekerjaan</option>
                            <option value="PNS">PNS</option>
                            <option value="Pedagang">Pedaganag </option>
                            <option value="Petani">Petani</option>
                            <option value="Buruh">Buruh </option>
                            <option value="Wiraswasta">Wiraswasta </option>
                            <option value="Pegawai Swasta">Pegawai Swasta </option>
                           </select>
                        </div>
                        </div>
                        </div>
                        </div>
                <div class="modal-footer">
                <input type="hidden" name="no_kk" id="edit-no_kk" />
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
                    url: "{{ url('/admin/ajaxadmin/dataPenduduk') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-no_kk').val(res.k_k_s_id);
                        $('#edit-nik').val(res.nik);
                        $('#edit-nama').val(res.nama);
                        $('#edit-tempat_lahir').val(res.tempat_lahir);
                        $('#edit-tgl_lahir').val(res.tgl_lahir);
                        $('#edit-gender').val(res.gender);
                        $('#edit-agama').val(res.agama);
                        $('#edit-pendidikan').val(res.pendidikan);
                        $('#edit-pekerjaan').val(res.pekerjaan);
                        $('#edit-status').val(res.status);
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
                        url: "penduduk/delete/" + npm,
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