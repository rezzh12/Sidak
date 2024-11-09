@extends('kepala.layouts.master')
@section('title','Riwayat Pindah')
@section('judul','Riwayat Pindah')

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Riwayat Pindah') }}</div>
            <div class="card-body">
            <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kades.pendatang') }}">Pendatang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('kades.pindah') }}">Pindah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kades.lahir') }}">Lahir</a>
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Pengantar</th>
                            <th>KK</th>
                            <th>KTP</th>
                            <th>Tanggal Pindah</th>
                            <th>Alasan</th>
                            <th>Pelapor</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($pindah as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $row->penduduk->nik }}</td>
                                <td >{{ $row->penduduk->nama }}</td>
                                <td >{{ $row->penduduk->gender }}</td>
                                <td>@if ($row->pengantar !== null)
                                        <img src="{{ asset('storage/pengantar/' . $row->pengantar) }}" width="100px" />
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

                                <td >{{ $row->tgl_pindah }}</td>
                                <td >{{ $row->alasan }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pindah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pindah.submit') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">

                       
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" name="nik" id="nik" required />
                        </div>
                        <div class="form-group">
                            <label for="pengantar">Foto Pengantar RT/RW</label>
                            <input type="file" class="form-control" name="pengantar" id="pengantar" required />
                        </div>
                        <div class="form-group">
                            <label for="kk">Foto KK</label>
                            <input type="file" class="form-control" name="kk" id="kk" required />
                        </div>
                        <div class="form-group">
                            <label for="ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="ktp" required />
                        </div>
                        </div>
                        <div class="col-md-6">
                       
                        <div class="form-group">
                            <label for="tgl_pindah">Tanggal Pindah</label>
                            <input type="date" class="form-control" name="tgl_pindah" id="tgl_pindah" required />
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <input type="text" class="form-control" name="alasan" id="alasan" required />
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pindah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pindah.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-pengantar">Foto Pengantar RT/RW</label>
                            <input type="file" class="form-control" name="pengantar" id="edit-pengantar" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-kk">Foto KK</label>
                            <input type="file" class="form-control" name="kk" id="edit-kk" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="edit-ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="edit-ktp" required />
                        </div>
                        </div>
                        <div class="col-md-6">
                      
                        
                        <div class="form-group">
                            <label for="edit-tgl_pindah">Tanggal Pindah</label>
                            <input type="date" class="form-control" name="tgl_pindah" id="edit-tgl_pindah" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-alasan">Alasan</label>
                            <input type="text" class="form-control" name="alasan" id="edit-alasan" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-pelapor">Pelapor</label>
                            <input type="text" class="form-control" name="pelapor" id="edit-pelapor" required />
                        </div>
                        </div>
                        </div>
                <div class="modal-footer">
                <input type="hidden" name="nik" id="edit-nik" />
                <input type="hidden" name="old_pengantar" id="edit-old_pengantar" />
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
                    url: "{{ url('/admin/ajaxadmin/dataPindah') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-nik').val(res.penduduk_id);
                        $('#edit-nama').val(res.nama);
                        $('#edit-tgl_pindah').val(res.tgl_pindah);
                        $('#edit-old_pengantar').val(res.pengantar);
                        $('#edit-old_kk').val(res.kk);
                        $('#edit-old_ktp').val(res.ktp);
                        $('#edit-alasan').val(res.alasan);
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
                        url: "pindah/delete/" + npm,
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