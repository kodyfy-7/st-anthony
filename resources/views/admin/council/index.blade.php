@extends('layouts.panel')

@section('title')
  Parish Council
@endsection

@section('page_title')
  Parish Council | <a href="/sysAdmin/councils/create"  class="btn btn-default btn-sm"><i class="fa fa-plus"></i></a>
@endsection

@section('breadcrumb')
  Parish Council
@endsection


@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('panel/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">

@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Members of  council</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Full name</th>
                      <th>Role</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($councils as $council)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$council->user->profile->full_name}}</td>
                          <td>{{$council->council_role}}</td>
                          <td>
                            <div class="form-group">
                            <a href="/sysAdmin/councils/{{$council->council_slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 

                                  <!--<a href="{{URL::to('/sysAdmin/councils/destroy/'.$council->group_slug)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->

                                  {!!Form::open(['route' => ['councils.destroy', $council->id], 'method' => 'POST'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-sm'])}}
                                {!!Form::close()!!}
                          </div></td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
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

<script src="{{asset('panel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('panel/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<!--
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('panel/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('panel/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('panel/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>-->

<!-- Toastr -->
<script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
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