@extends('layouts.panel')

@section('title')
  Priests
@endsection

@section('page_title')
  Priests | <a href="/sysAdmin/priests"  class="btn btn-default"><i class="fa fa-reply"></i></a>
@endsection

@section('breadcrumb')
  Priests
@endsection


@section('style')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('panel/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit {{$priest->priest_name}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                {!! Form::open(['route' => 'priests.store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                  @include('admin.priest.form')
                  <div class="col-md-12">
                    {{Form::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-info btn-block'])}}
                  </div> 
                {!! Form::close() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
@endsection

@section('script')

<!-- Select2 -->
<script src="{{asset('panel/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>


<script>
  @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
@endsection