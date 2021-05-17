{!! Form::open(['url' => '/seed', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                            <div class="col-md-12">
                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                            </div> 
            
                            <div class="clearfix"></div>
                        {!! Form::close() !!}