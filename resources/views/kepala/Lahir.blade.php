@extends('kepala.layouts.master')
@section('title','Riwayat Lahir')
@section('judul','Riwayat Lahir')

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Riwayat Lahir') }}</div>
            <div class="card-body">
            <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kades.pendatang') }}">Pendatang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kades.pindah') }}">Pindah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('kades.lahir') }}">Lahir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kades.meninggal') }}">Meninggal</a>
            </li>
            </ul>
            <hr>
                <table id="table-data" class="table table-striped table-white table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>No KK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Gender</th>
                            <th>Surat Bidan/Dokter</th>
                            <th>KK</th>
                            <th>KTP</th>
                            <th>Pelapor</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($lahir as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{$row->kartuk->no_kk}}</td>
                                <td >{{ $row->nama }}</td>
                                <td >{{ $row->tempat_lahir }}, {{$row->tgl_lahir}}</td>
                                <td >{{ $row->gender }}</td>
                                <td>@if ($row->sbidan !== null)
                                        <img src="{{ asset('storage/sbidan/' . $row->sbidan) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td>@if ($row->kk !== null)
                                        <img src="{{ asset('storage/kk/' . $row->kk) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td> @if ($row->ktp !== null)
                                        <img src="{{ asset('storage/ktp/' . $row->ktp) }}" width="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td >{{ $row->pelapor }}</td>
                               
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Meninggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.lahir.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" class="form-control" name="no_kk" id="no_kk" required />
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
                        <div class="form-group">
                        <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="sbidan">Foto Surat Bidan/Dokter</label>
                            <input type="file" class="form-control" name="sbidan" id="sbidan" required />
                        </div>
                        <div class="form-group">
                            <label for="kk">Foto KK</label>
                            <input type="file" class="form-control" name="kk" id="kk" required />
                        </div>
                        <div class="form-group">
                            <label for="ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="ktp" required />
                        </div>
                        <div class="form-group">
                            <label for="pelapor">Pelapor</label>
                            <input type="text" class="form-control" name="pelapor" id="pelapor" required />
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Meninggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.lahir.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
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
                        <div class="form-group">
                        <label for="edit-gender">Gender</label>
                            <select name="gender" id="edit-gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-sbidan">Foto Surat Bidan/Dokter</label>
                            <input type="file" class="form-control" name="sbidan" id="edit-sbidan" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-kk">Foto KK</label>
                            <input type="file" class="form-control" name="kk" id="edit-kk" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="edit-ktp" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-pelapor">Pelapor</label>
                            <input type="text" class="form-control" name="pelapor" id="edit-pelapor" required />
                        </div>
                        
                        
                        </div>
                        </div>
                        </div>
                <div class="modal-footer">
                <input type="hidden" name="no_kk" id="edit-no_kk" />
                <input type="hidden" name="old_sbidan" id="edit-old_sbidan" />
                <input type="hidden" name="old_kk" id="edit-old_kk" />
                <input type="hidden" name="old_ktp" id="edit-old_ktp" />
                <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                    </form>
                </div>
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
                    url: "{{ url('/admin/ajaxadmin/dataLahir') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-no_kk').val(res.k_k_s_id);
                        $('#edit-nama').val(res.nama);
                        $('#edit-tempat_lahir').val(res.tempat_lahir);
                        $('#edit-tgl_lahir').val(res.tgl_lahir);
                        $('#edit-old_kk').val(res.kk);
                        $('#edit-old_ktp').val(res.ktp);
                        $('#edit-old_sbidan').val(res.old_sbidan);
                        $('#edit-gender').val(res.gender);
                        $('#edit-pelapor').val(res.pelapor);
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
                        url: "meninggal/delete/" + npm,
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