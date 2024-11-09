@extends('layouts.master')
@section('title', 'Data Pengguna')
@section('judul', 'Data Pengguna')
@section('content')

<main id="main">
    <section id="Pendidikan" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu Pelayanan</h2>
                <p>Pelayanan</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="small-box bg-danger">
                    <div class="icon-box">
                        <div class="icon"><img src="{{asset('asset_user/img/4x/pendatang.png')}}" alt=""></div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPendatangModal"><i class="fa fa-plus"></i>
                    Surat Pendatang</button>
                        <p class="description" style="color:black">Klik Untuk Membuat Surat Keterangan Pendatang</p>
                    </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                
                <div class="small-box bg-danger">
                    <div class="icon-box">
                        <div class="icon"><img src="{{asset('asset_user/img/4x/pindah.png')}}" alt=""></div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPindahModal"><i class="fa fa-plus"></i>
                        Surat Pindah</button>
                        <p class="description" style="color:black">Klik Untuk Membuat Surat Keterangan Pindah</p>
                        
                    </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="small-box bg-danger">
                    <div class="icon-box">
                        <div class="icon"><img src="{{asset('asset_user/img/4x/lahir.png')}}" alt=""></div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahLahirModal"><i class="fa fa-plus"></i>
                        Surat Lahir</button>
                        <p class="description" style="color:black">Klik Untuk Membuat Surat Keterangan Lahir</p>
                    </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="small-box bg-danger">
                    <div class="icon-box">
                        <div class="icon"><img src="{{asset('asset_user/img/4x/meninggal.png')}}" alt=""></div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahMeninggalModal"><i class="fa fa-plus"></i>
                        Surat Meninggal</button>
                        <p class="description" style="color:black">Klik Untuk Membuat Surat Keterangan Meninggal</p>
                    </div>
                </div>
                </div>   
    </section>
    <!-- Akhir pendidikan -->
    </main>

    <div class="modal fade" id="tambahPendatangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pendatang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('pendatang.submit') }}" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" name="nik" id="nik" required />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required />
                        </div>
                        
                        <div class="form-group">
                        <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pengantar">Foto Pengantar RT/RW</label>
                            <input type="file" class="form-control" name="pengantar" id="pengantar" required />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="kk">Foto KK</label>
                            <input type="file" class="form-control" name="kk" id="kk" required />
                        </div>
                        <div class="form-group">
                            <label for="ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="ktp" required />
                        </div>
                        <div class="form-group">
                            <label for="tgl_datang">Tanggal Datang</label>
                            <input type="date" class="form-control" name="tgl_datang" id="tgl_datang" required />
                        </div>
                        </div>
                        </div>
                        </div>
                <div class="modal-footer">
                <input type="hidden" name="niks" id="edit-nik" value="{{$nik}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPindahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pindah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('pindah.submit') }}" enctype="multipart/form-data">
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
                       
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="ktp">Foto KTP</label>
                            <input type="file" class="form-control" name="ktp" id="ktp" required />
                        </div>
                        <div class="form-group">
                            <label for="tgl_pindah">Tanggal Pindah</label>
                            <input type="date" class="form-control" name="tgl_pindah" id="tgl_pindah" required />
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <input type="text" class="form-control" name="alasan" id="alasan" required />
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        
                <div class="modal-footer">
                <input type="hidden" name="niks" id="edit-nik" value="{{$nik}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahLahirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lahir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('lahir.submit') }}" enctype="multipart/form-data">
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
                        
                        </div>
                        </div>
                        </div>
                        
                        
                <div class="modal-footer">
                <input type="hidden" name="niks" id="edit-nik" value="{{$nik}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="tambahMeninggalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Meninggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('meninggal.submit') }}" enctype="multipart/form-data">
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
                            <label for="sk_kematian">Foto SK Kematian</label>
                            <input type="file" class="form-control" name="sk_kematian" id="sk_kematian" required />
                        </div>
                        <div class="form-group">
                            <label for="tgl_meninggal">Tanggal Meninggal</label>
                            <input type="date" class="form-control" name="tgl_meninggal" id="tgl_meninggal" required />
                        </div>
                        <div class="form-group">
                            <label for="ktp_pelapor">Foto KTP Pelapor</label>
                            <input type="file" class="form-control" name="ktp_pelapor" id="ktp_pelapor" required />
                        </div>
                        <div class="form-group">
                            <label for="sebab">Sebab</label>
                            <input type="text" class="form-control" name="sebab" id="sebab" required />
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        
                <div class="modal-footer">
                <input type="hidden" name="niks" id="edit-nik" value="{{$nik}}" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




   @stop