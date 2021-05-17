@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a>
                                </li>
                                <li><a href="#">B</a>
                                </li>
                                <li><a href="#">C</a>
                                </li>
                                <li><a href="#">D</a>
                                </li>
                                <li><a href="#">E</a>
                                </li>
                                <li>...</li>
                                <li><a href="#">W</a>
                                </li>
                                <li><a href="#">X</a>
                                </li>
                                <li><a href="#">Y</a>
                                </li>
                                <li><a href="#">Z</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        @forelse ($users as $user)
                            <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <div class="left col-xs-7">
                                            <h2>{{ $user->profile->first_name }} {{ $user->profile->last_name }}</h2>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-phone"></i> Phone: {{ $user->profile->mobile_number }}</li>
                                                <li><i class="fa fa-map"></i> Address: {{ $user->profile->home_address }}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-xs-5 text-center">
                                            <img src="{{asset('backend/images/user.png')}}" alt="" class="img-circle img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <a href="/sysAdmin/users/{{$user->profile->profile_slug}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-user">
                                            </i> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <a href="/sysAdmin/users/{{$user->id}}" class="btn btn-success btn-xs"><i class="fa fa-user">
                                            </i> <i class="fa fa-eye"></i> View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Datatables-->
    <script src="{{asset('backend/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/js/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/datatables/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        });

        $('#data_form').on('submit', function(event){
                event.preventDefault();
                
                $(document).on('click', '.edit', function(){
                    var id = $(this).attr('id');
                    $('#form_result').html('');
                    $.ajax({
                        url:"/sysAdmin/laity_council/"+id+"/edit",
                        dataType:"json",
                        success:function(html){
                            $('#user_member').val(html.data.user_id);
                            $('#role').val(html.data.role);
                            $('#hidden_id').val(html.data.id);
                            $('.modal-title').text("Edit Employee Details");
                            $('#action_button').val("Update");
                            $('#action').val("Edit");
                            $('#editModal').modal('show');
                        }
                    })
                });
                
                var data_id;
                
                $(document).on('click', '.delete', function(){
                    data_id = $(this).attr('id');
                    $('#confirmModal').modal('show');
                });
                
                $('#ok_button').click(function(){
                    $.ajax({
                    url:"employees/destroy/"+data_id,
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#datatable').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });
    </script>
@endsection