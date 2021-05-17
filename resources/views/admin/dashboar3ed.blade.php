@extends('layouts.panelui')

@section('content')
<br />
    <div class="">

        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                <div class="icon"><i class="fa fa-group"></i>
                </div>
                <div class="count">{{$usersCount}}</div>

                <h3>User(s)</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                
            </div>
        
        </div>
    </div>
    <br>
@endsection