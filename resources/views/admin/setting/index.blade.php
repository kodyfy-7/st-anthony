@extends('layouts.panel')

@section('title')
  Church Settings
@endsection

@section('page_title')
  Church Settings
@endsection

@section('content')

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col md-6 col-sm-6 col-xs-12">
                {!! Form::open(['route' => ['settings.update', 1], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="col-xs-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#about" data-toggle="tab">About church</a>
                        </li>
                        <li><a href="#history" data-toggle="tab">Church history</a>
                        </li>
                        <li><a href="#timings" data-toggle="tab">Mass timings</a>
                        </li>
                        <li><a href="#stations" data-toggle="tab">Outstations</a>
                        </li>
                        <li><a href="#contact" data-toggle="tab">Contact info</a>
                        </li>
                        <li><a href="#events" data-toggle="tab">Church Events</a>
                        </li>
                    </ul>
                  </div>
                
                  <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                          <div class="tab-pane active" id="about">
                              <div class="form-group">
                                  {{Form::label('about', 'About')}}
                                  {{Form::textarea('about', old('about') ?? $setting->about, ['id' => 'about', 'class' => 'form-control' . ($errors->has('about') ? ' form-control is-invalid' : null), 'rows' => '6','placeholder' => '', 'autocomplete' => 'off'])}}
                                  @error('about') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                              </div>
                          </div>      
                  
                          <div class="tab-pane" id="history">
                            <div class="form-group">
                                {{Form::label('history', 'History')}}
                                {{Form::textarea('history', old('history') ?? $setting->history, ['id' => 'history', 'class' => 'form-control' . ($errors->has('history') ? ' form-control is-invalid' : null), 'rows' => '6','placeholder' => '', 'autocomplete' => 'off'])}}
                                @error('history') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>
                          </div>
                            
                          <div class="tab-pane" id="stations">
                            <table id="station_table" class="table">
                              <tr>
                                <th>Station</th>
                                <th>Address</th>
                                <th width="5%"><button type="button" name="add_station_row" id="add_station_row" class="btn btn-success btn-xs">+</button></th>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-group">
                                    <input type="text" name="station" id="station" class="form-control">    
                                  </div>                                           
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input type="text" name="address" id="address" class="form-control">    
                                  </div>  
                                </td>
                                <td></td>
                              </tr>
                            </table>
                          </div>
      
                          <div class="tab-pane" id="contact">
                              <div class="form-group">
                                  {{Form::label('email', 'Email address')}}
                                  {{Form::text('email', old('email') ?? $setting->email, ['id' => 'email', 'class' => 'form-control' . ($errors->has('email') ? ' form-control is-invalid' : null),'placeholder' => 'abc@email.com', 'autocomplete' => 'off'])}}
                                  @error('email') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                              </div>
      
                              <div class="form-group">
                                {{Form::label('number_1', 'Phone Numbers')}}
                                {{Form::text('number_1', old('number_1') ?? $setting->number_1, ['id' => 'number_1', 'class' => 'form-control' . ($errors->has('number_1') ? ' form-control is-invalid' : null),'placeholder' => '015628845', 'autocomplete' => 'off'])}}
                                @error('number_1') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                                {{Form::text('number_2', old('number_2') ?? $setting->number_2, ['id' => 'number_2', 'class' => 'form-control' . ($errors->has('number_2') ? ' form-control is-invalid' : null),'placeholder' => '025628845', 'autocomplete' => 'off'])}}
                                @error('number_2') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                                {{Form::text('number_3', old('number_3') ?? $setting->number_3, ['id' => 'number_3', 'class' => 'form-control' . ($errors->has('number_3') ? ' form-control is-invalid' : null),'placeholder' => '035628845', 'autocomplete' => 'off'])}}
                                @error('number_3') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>
                          </div>

                          <div class="tab-pane" id="events">
                            <div class="form-group">
                                {{Form::label('infant_baptism', 'Infant Baptism')}}
                                {{Form::text('infant_baptism', old('infant_baptism') ?? $setting->infant_baptism, ['id' => 'infant_baptism', 'class' => 'form-control' . ($errors->has('infant_baptism') ? ' form-control is-invalid' : null),'placeholder' => 'Infant Baptism', 'autocomplete' => 'off'])}}
                                @error('infant_baptism') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>

                            <div class="form-group">
                              {{Form::label('confession', 'Confession')}}
                              {{Form::text('confession', old('confession') ?? $setting->confession, ['id' => 'confession', 'class' => 'form-control' . ($errors->has('confession') ? ' form-control is-invalid' : null),'placeholder' => 'Confession', 'autocomplete' => 'off'])}}
                              @error('confession') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>

                            <div class="form-group">
                              {{Form::label('benediction', 'Benediction')}}
                              {{Form::text('benediction', old('benediction') ?? $setting->confession, ['id' => 'benediction', 'class' => 'form-control' . ($errors->has('benediction') ? ' form-control is-invalid' : null),'placeholder' => 'Benediction', 'autocomplete' => 'off'])}}
                              @error('benediction') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>

                            <div class="form-group">
                              {{Form::label('catechism', 'Catechism')}}
                              {{Form::text('catechism', old('catechism') ?? $setting->catechism, ['id' => 'catechism', 'class' => 'form-control' . ($errors->has('catechism') ? ' form-control is-invalid' : null),'placeholder' => 'Catechism', 'autocomplete' => 'off'])}}
                              @error('catechism') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                            </div>
    
                        </div>
                  
                      </div>
                  </div>
                  {{Form::hidden('_method', 'PUT')}}
                  {{Form::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-info btn-block'])}}
                {!! Form::close() !!}

              </div>

              <div class="col md-6 col-sm-6 col-xs-12">
                {!! Form::open(['route' => ['settings.update', 1], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

                  <div class="col-xs-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#about" data-toggle="tab">About church</a>
                        </li>
                        <li><a href="#history" data-toggle="tab">Church history</a>
                        </li>
                        <li><a href="#timings" data-toggle="tab">Mass timings</a>
                        </li>
                        <li><a href="#stations" data-toggle="tab">Outstations</a>
                        </li>
                        <li><a href="#contact" data-toggle="tab">Contact info</a>
                        </li>
                    </ul>
                  </div>
                
                  <div class="col-xs-9">
                      
                  </div>
                  {{Form::hidden('_method', 'PUT')}}
                  {{Form::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-info btn-block'])}}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('script')
  <script>
    var count = 1;         
    $(document).on('click', '#add_row', function(){
      count++;
      $('#total_item').val(count);
      var html_code = '';
      html_code += '<tr id="row_id_'+count+'">';      
      html_code += '<td><input type="text" name="day[]" id="day'+count+'" class="form-control"></td>';  
      html_code += '<td><input type="text" name="time[]" id="time'+count+'" class="form-control"></td>';  
         
      html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
      html_code += '</tr>';
        $('#time_table').append(html_code);
    });
                    
    $(document).on('click', '.remove_row', function(){
      var row_id = $(this).attr("id");
      $('#row_id_'+row_id).remove();
      count--;
      $('#total_item').val(count);
    });

    var countStation = 1;         
    $(document).on('click', '#add_station_row', function(){
      countStation++;
      $('#total_item_station').val(countStation);
      var html_station_code = '';
      html_station_code += '<tr id="row_id_'+countStation+'">';      
      html_station_code += '<td><input type="text" name="station[]" id="station'+countStation+'" class="form-control"></td>';  
      html_station_code += '<td><input type="text" name="address[]" id="address'+countStation+'" class="form-control"></td>';  
      html_station_code += '<td><button type="button" name="remove_station_row" id="'+countStation+'" class="btn btn-danger btn-xs remove_station_row">X</button></td>';
      html_station_code += '</tr>';
        $('#station_table').append(html_station_code);
    });
                    
    $(document).on('click', '.remove_station_row', function(){
      var row_station_id = $(this).attr("id");
      $('#row_station_id_'+row_station_id).remove();
      countStation--;
      $('#total_item_station').val(countStation);
    });
  </script>
@endsection