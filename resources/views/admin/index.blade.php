@php
if ( Config::get('app.locale') == 'ar'){
    $master = 'admin.master.masterar';
}else {
    $master = 'admin.master.master';
}
@endphp
@extends('admin.master.masterar')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $jops->count() }}</h3>

            <p> الوظائف</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.jop.index') }}" class="small-box-footer">كل الوظائف الجديدة <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $new->count() }}</h3>

            <p> الطلبات الجديدة</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.clerk.index.new') }}" class="small-box-footer">كل الطلبات الجديدة <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $pending->count() }}</h3>

            <p>  طلبات تحت المراجعة</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.clerk.index.pending') }}" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $accepted->count() }}</h3>

            <p>  طلبات  مقبولة</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.clerk.index.accepted') }}" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $rejected->count() }}</h3>

            <p>  طلبات  مرفوضة</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.clerk.index.rejected') }}" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->


  @endsection
