@extends('layouts.panel')

@section('title')
  Profile
@endsection

@section('page_title')
  Profile
@endsection

@section('content')

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Fill in your profile details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::open(['route' => 'save.profile', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                            @include('user.profile_form')
                            <div class="col-md-12">
                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                            </div> 
            
                            <div class="clearfix"></div>
                        {!! Form::close() !!}
                        
                        
                    </div>
                </div>
            </div>
        </div>
    

@endsection

@section('script')
    
@endsection