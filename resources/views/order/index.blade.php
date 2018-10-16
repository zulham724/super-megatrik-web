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
          
          </table>
        </div><!-- /.box-body -->

              </div>
  </div>
</div>
@endsection
@section('before_scripts')
<script type="text/javascript">
  // on ready function ES6
  $(()=>{
    init();

  });

  function init(){

    axios.get("{{ url('/api/orders') }}").then(res=>{

      console.log(res);
      // var orders = res.data;
      // console.log(order)
      var table = $('.customdatatable').DataTable({
       data:res.data,
        columns:[
        {data:'id',title:'ID'},
        {data:'technician.name',title:'ID Teknisi'},
        {data:'customer.name',title:'ID Kustomer'},
        {data:'order_start',title:'Order Start'},
        {data:'order_end',title:'Order End'},
        {data:null,title:'action',defaultContent: '<a href="" class="btn_edit btn btn-xs btn-default"><i class="fa fa-pencil-alt"></i> Edit</a>  <a href="" class="btn_delete btn btn-xs btn-default"><i class="fa fa-trash"></i> Delete</a>'},
        ]
      });

      // Edit record
      $('.customdatatable').on('click', 'a.btn_edit', function (e) {
          e.preventDefault();
   
          let data = table.row($(this).parents('tr')).data();
          window.location.href = "{{ url('orders') }}/"+data.id+"/edit";
      } );
   
      // Delete a record
      $('.customdatatable').on('click', 'a.btn_delete', function (e) {
          e.preventDefault();
          let data = table.row($(this).parents('tr')).data();
          destroy(data.id);
      });

    },err=>{
      alert("wadidaw");
    });
  }

  const destroy = (id)=>{
    alert(id);
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

                axios.post('/api/orders/'+id,access).then(res=>{
                  console.log(res);
                  swal({
                      title:"Okay!",
                      text:"You deleted product",
                      type:"success"
                  }).then(result=>{
                      window.location.reload();
                  });
                },err=>{
                  console.log(err);
                  swal("Oops","Something not right","error");   
                });
            }
        });
    }

</script>

@endsection