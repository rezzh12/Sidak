@extends('kepala.layouts.master')
@section('title','Dashboard')
@section('judul','Dashboard')

@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$pendatang}}</h3>

                <h5>Pendatang</h5>
              </div>
              <div class="icon">
              <i class="fa fa-user"></i>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pindah->count()}}</h3>

                <h5>Pindah</h5>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$lahir->count()}}</h3>

                <h5>Lahir</h5>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$meninggal->count()}}</h3>

                <h5>Meninggal</h5>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('') }}</div>
            <div class="card-body">
    <h2 class="text-center">Selamat Datang,  {{ Auth::user()->name }}</h2>
    <p class="text-center">Di Website SIDAK DESA SALAMNUNGGAL </p>
    </div>
    </div>
 @endsection      
 