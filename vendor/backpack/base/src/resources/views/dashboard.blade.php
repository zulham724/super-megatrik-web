@extends('backpack::layout')

@section('after_styles')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('welcome') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection

@section('content')
{{-- header --}}
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-dollar-sign"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pemasukan Bulan ini</span>
        <span class="info-box-number"><small>Rp </small>4.983.934</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-child"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pelanggan</span>
        <span class="info-box-number">5.387</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Servis Terselesaikan</span>
        <span class="info-box-number">760</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-user-cog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Teknisi</span>
        <span class="info-box-number">389</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>

{{-- chart --}}
<div class="row">
  <div class="col-md-12">
    <!-- BAR CHART -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Data Tahunan</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <chart-component></chart-component>
        </div>
        <table class="table table-bordered table-striped datatable">
          <thead>
            <tr>
              <td>No</td>
              <td>Service</td>
              <td>Action</td>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
@section('before_scripts')
<script type="text/javascript">
      // on ready function ES6
      $(()=>{
        $('.datatable').DataTable();
        
      });
      
</script>
@endsection