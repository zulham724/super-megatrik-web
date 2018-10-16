@extends('backpack::layout')

@section('after_styles')
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
<div class="row">
  <div class="col-md-12">
    <div class="box">
        <div class="box-header hidden-print with-border">
          <a href="{{ route('orders.create') }}" class="btn btn-primary"><i class=" fa fa-plus"></i> Add order</a>
        </div>
        
        <div class="box-body overflow-hidden">
          <table class="table table-bordered table-striped customdatatable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Teknisi</td>
                    <td>Nama Kustomer</td>
                    <td>Tanggal Mulai</td>
                    <td>Tanggal Selesai</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
               @foreach ($orders as $ord => $order)
                <tr>
                    <td>{{ $ord+1 }}</td>
                    <td>{{ $orders->order_start }}</td>
                    <td>{{ $orders->order_end }}</td>
                      <td>
                         <center>
                            <a href="{{ route('orders.edit',$orders->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="destroy({{$orders->id}})"><i class="fa fa-trash"></i> Delete</button>
                        </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
          
          </table>
        </div><!-- /.box-body -->

              </div>
  </div>
</div>
@endsection
@section('before_scripts')
<script type="text/javascript">
    const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Yes, delete it!",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("{{ url('umkms') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Okay!",
                        text:"You deleted product",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('umkms') }}";
                    });
                })
                .fail(err=>{
                    // console.log(err);
                    swal("Oops","Something not right","error");
                });
            }
        });
    }

</script>

<script type="text/javascript">
    
</script>
@endsection