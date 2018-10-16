@extends('backpack::layout')

@section('after_styles')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('header')
    <section class="content-header">
      <h1>
        Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection

@section('content')
<form method="post" action="{{ route('orders.store') }}">
  @csrf


<div class="row">
  <div id="app">
  </div>
  <div class="col-md-8 col-md-offset-2">
    <a href="{{ route('orders.index') }}" ><i class="fa fa-angle-double-left"></i> Back to order</a>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Add a new order</h3>
      </div>
      
      <div class="box-body row display-flex-wrap" >
        <div class="form-group col-xs-12">
          <label>Technicians id</label>
          <select name="orders[technician_id]" class="form-control" required>
            @foreach ($technicians as $technician)
            <option value="{{$technician->id}}">{{$technician->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-xs-12">
          <label>Customer id</label>
          <select name="orders[customer_id]" class="form-control" required>
            @foreach ($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-xs-12">
        <!-- Date -->
          <label>Date Start:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="date" name="orders[order_start]" class="form-control pull-right" required>
          </div>
        <!-- /.form group -->

        <!-- Date range -->
        </div>
        <div class="form-group col-xs-12">
        <!-- Date -->
          <label>Date End:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="date" name="orders[order_end]" class="form-control pull-right" required>
          </div>
        <!-- /.form group -->
      <!-- /.body box -->
      <div class="box-footer">
        <div class="form-group">
          <button type="submit" class="btn btn-success">
            <span class="fa fa-save" ></span> Save and Back
          </button>
          <a href="{{ route('orders.index') }}" class="btn btn-default">
            <span class="fa fa-ban"></span> Cancel
          </a>
        </div>
      </div>
      <!-- /.footer box -->
    </div>
   {{-- /.box --}}
  </div>
</div>
<div class="row">
  <service-component></service-component>
  <material-component></material-component>
</div>
</form>
@endsection