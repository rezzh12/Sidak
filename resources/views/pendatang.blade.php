@extends('layouts.master')
@section('title', 'Data Surat')
@section('judul', 'Data Surat')
@section('content')
<main id="main">
    <section id="Pendidikan" class="services section-bg">
        <div class="container" data-aos="fade-up">

<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Surat Kependudukan') }}</div>
            <div class="card-body">
                    <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('pendatang/'.$nik)}}">Pendatang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('pindah/'.$nik)}}">Pindah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('lahir/'.$nik)}}">Lahir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('meninggal/'.$nik)}}">Meninggal</a>
            </li>
            </ul>
            
                    <hr />
                    <table id="table-data" class="table table-striped table-white table-responsive-lg">
                    <thead>
                        <tr >
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Gender</th>
                          
                            <th>Tanggal Datang</th>
                            <th>Approve</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($pendatang as $row)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $row->nik }}</td>
                                <td >{{ $row->nama }}</td>
                                <td >{{ $row->gender }}</td>

                                <td >{{ $row->tgl_datang }}</td>
                               
                                <td > 
                                @if($row->approve == 0)
                                Sedang di proses
                                @elseif($row->approve == 1)
                                Disetujui
                                @elseif($row->approve == 2)
                                Ditolak
                                    @else
                                    @endif
                                </td>
                                <td >
                                @if($row->approve == 0)
                                            @elseif($row->approve == 1)
                                            <a class="btn  btn-warning" href="{{ url('pendatang/print/'.$row->id)}}"><i class="fa fa-print"></i></a>
                                            @else
                                            @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    </section>
    <!-- Akhir pendidikan -->
    </main>
   @stop