@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">

                @can ('user_management_access')
                  <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                          <div class="inner">
                            <h3>150</h3>

                            <p>Total Koleksi</p>
                          </div>
                          <div class="icon">
                            <i class="glyphicon glyphicon-book"></i>
                          </div>
                          <a href="/admin/products" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Total Pinjaman</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="/admin/peminjamen" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>44</h3>

                            <p>Pengguna Terdaftar</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="/admin/users" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>65</h3>

                            <p>Kategori</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-folder"></i>
                          </div>
                          <a href="/admin/product_categories" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>

                @endcan
                <div class="jumbotron jumbotron-fluid rounded" style="color:#ffffff;background-image: url('https://mdbootstrap.com/img/Photos/Others/gradient1.jpg');">
                  <div class="container">
                    <h2 class="display-4">Selamat datang di L I B R O S</h2>
                    <p class="lead"><i>My library, my lifeline...</i> </p>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
