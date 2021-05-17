
    <h4>Personal Info</h4>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {{Form::label('title', 'Title*')}}
            {{Form::text('title', old('title') ?? auth()->user()->profile->title, ['id' => 'title', 'class' => 'form-control' . ($errors->has('title') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-8 col-xs-12">
            {{Form::label('full_name', 'Full name *')}}
            {{Form::text('full_name', old('full_name') ?? auth()->user()->profile->full_name, ['id' => 'full_name', 'class' => 'form-control' . ($errors->has('full_name') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off', 'data-validate-length-range' => '6', 'required'])}}
            @error('full_name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            {{Form::label('birthday', 'Birthday *')}}
        
            {{Form::text('birthday', old('birthday') ?? auth()->user()->profile->birthday, ['id' => 'single_cal2', 'class' => 'form-control' . ($errors->has('birthday') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('birthday') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-3 col-xs-12">
            {{Form::label('gender', 'Gender')}}
            {{Form::select('gender',  ['Male' => 'Male', 'Female' => 'Female'], old('gender') ?? auth()->user()->profile->gender,['id' => 'gender', 'class' => 'form-control' . ($errors->has('gender') ? ' form-control is-invalid' : null), 'placeholder' => 'Select gender'])}} 
            @error('gender') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-6 col-xs-12">
            {{Form::label('mobile_number', 'Mobile Number *')}}
            {{Form::text('mobile_number', old('mobile_number') ?? auth()->user()->profile->mobile_number, ['id' => 'mobile_number', 'class' => 'form-control' . ($errors->has('mobile_number') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('mobile_number') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            {{Form::label('home_address', 'Home address *')}}
            {{Form::text('home_address', old('home_address') ?? auth()->user()->profile->home_address, ['id' => 'home_address', 'class' => 'form-control' . ($errors->has('home_address') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('home_address') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <br>
    <h4>Station Info</h4>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            {{Form::label('station', 'Select place of worship')}}
            {{Form::select('station', App\Models\Station::pluck('station_name', 'id'), '',['id' => 'station', 'class' => 'form-control', 'placeholder' => 'Select', 'tabindex' => '-1'])}}
            
            @error('station') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror 
        </div>

        <div class="col-md-6">
            <div class="form-group">
              <label>Select Groups</label>
              <select class="select2" multiple="multiple" data-placeholder="Select a State" name="groups[]" style="width: 100%;">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->group_title}}</option>
                @endforeach
              </select>
            </div>
        </div>

        
    </div>
    <hr>
    <h4>Baptism Info</h4>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {{Form::label('baptism_name', 'Baptism Name')}}
            {{Form::text('baptism_name', old('baptism_name') ?? auth()->user()->profile->baptism_name, ['id' => 'baptism_name', 'class' => 'form-control' . ($errors->has('baptism_name') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('baptism_name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('baptism_place', 'Baptism Place')}}
            {{Form::text('baptism_place', old('baptism_place') ?? auth()->user()->profile->baptism_place, ['id' => 'baptism_place', 'class' => 'form-control' . ($errors->has('baptism_place') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('baptism_place') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror   
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('baptism_date', 'Baptism Date')}}
            {{Form::text('baptism_date', old('baptism_date') ?? auth()->user()->profile->baptism_date, ['id' => 'baptism_date', 'class' => 'form-control' . ($errors->has('baptism_date') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('baptism_date') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('baptism_minister', 'Baptism Minister')}}
            {{Form::text('baptism_minister', old('baptism_minister') ?? auth()->user()->profile->baptism_minister, ['id' => 'baptism_minister', 'class' => 'form-control' . ($errors->has('baptism_minister') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('baptism_minister') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('baptism_number', 'Baptism Number')}}
            {{Form::text('baptism_number', old('baptism_number') ?? auth()->user()->profile->baptism_number, ['id' => 'baptism_number', 'class' => 'form-control' . ($errors->has('baptism_number') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('baptism_number') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <hr>
    <h4>Communion Info</h4>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {{Form::label('communion_place', 'Communion Place')}}
            {{Form::text('communion_place', old('communion_place') ?? auth()->user()->profile->communion_place, ['id' => 'communion_place', 'class' => 'form-control' . ($errors->has('communion_place') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('communion_place') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('communion_date', 'Communion Date')}}
            {{Form::text('communion_date', old('communion_date') ?? auth()->user()->profile->communion_date, ['id' => 'communion_date', 'class' => 'form-control' . ($errors->has('communion_date') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('communion_date') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('communion_minister', 'Communion Minister')}}
            {{Form::text('communion_minister', old('communion_minister') ?? auth()->user()->profile->communion_minister, ['id' => 'communion_minister', 'class' => 'form-control' . ($errors->has('communion_minister') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('communion_minister') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <hr>
    <h4>Confirmation Info</h4>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {{Form::label('confirmation_place', 'Confirmation Place')}}
            {{Form::text('confirmation_place', old('confirmation_place') ?? auth()->user()->profile->confirmation_place, ['id' => 'confirmation_place', 'class' => 'form-control' . ($errors->has('confirmation_place') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('confirmation_place') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('confirmation_date', 'Confirmation Date')}}
            {{Form::text('confirmation_date', old('confirmation_date') ?? auth()->user()->profile->confirmation_date, ['id' => 'confirmation_date', 'class' => 'form-control' . ($errors->has('confirmation_date') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('confirmation_date') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror   
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('confirmation_minister', 'Confirmation Minister')}}
            {{Form::text('confirmation_minister', old('confirmation_minister') ?? auth()->user()->profile->confirmation_minister, ['id' => 'confirmation_minister', 'class' => 'form-control' . ($errors->has('confirmation_minister') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('confirmation_minister') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <hr>
    <h4>Marriage Info</h4>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            {{Form::label('marriage_spouse', 'Marriage Spouse')}}
            {{Form::text('marriage_spouse', old('marriage_spouse') ?? auth()->user()->profile->marriage_spouse, ['id' => 'marriage_spouse', 'class' => 'form-control' . ($errors->has('marriage_spouse') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('marriage_spouse') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('marriage_place', 'Marriage Place')}}
            {{Form::text('marriage_place', old('marriage_place') ?? auth()->user()->profile->marriage_place, ['id' => 'marriage_place', 'class' => 'form-control' . ($errors->has('marriage_place') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('marriage_place') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror 
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('marriage_date', 'Marriage Date')}}
            {{Form::text('marriage_date', old('marriage_date') ?? auth()->user()->profile->marriage_date, ['id' => 'marriage_date', 'class' => 'form-control' . ($errors->has('marriage_date') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('marriage_date') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('marriage_minister', 'Marriage Minister')}}
            {{Form::text('marriage_minister', old('marriage_minister') ?? auth()->user()->profile->marriage_minister, ['id' => 'marriage_minister', 'class' => 'form-control' . ($errors->has('marriage_minister') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('marriage_minister') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-4 col-xs-12">
            {{Form::label('maiden_name', 'Maiden Name')}}
            {{Form::text('maiden_name', old('maiden_name') ?? auth()->user()->profile->maiden_name, ['id' => 'maiden_name', 'class' => 'form-control' . ($errors->has('maiden_name') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('maiden_name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <label for="exampleInputFile">Profile Image *</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
            @error('image') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
    </div>

