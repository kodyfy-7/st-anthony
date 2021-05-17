        <div class="form-group">
            {{Form::label('name', 'Priest Name')}}
            {{Form::text('name', old('name') ?? $priest->priest_name, ['id' => 'name', 'class' => 'form-control' . ($errors->has('name') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="form-group">
            {{Form::label('number', 'Phone Number')}}
            {{Form::text('number', old('number') ?? $priest->priest_number, ['id' => 'number', 'class' => 'form-control' . ($errors->has('number') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('number') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('email', 'Email Address')}}
            {{Form::text('email', old('email') ?? $priest->priest_email, ['id' => 'email', 'class' => 'form-control' . ($errors->has('email') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('email') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('role', 'Role')}}
            @if (!empty($priest->priest_role))
                    @if ($priest->priest_role > 1)
                        {{Form::select('role',  ['1' => 'Parish Priest', '2' => 'Asst. Parish Priest'], '2',['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}}  
                    @else
                        {{Form::select('role',  ['1' => 'Parish Priest', '2' => 'Asst. Parish Priest'], '1',['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}} 
                    @endif  
                    @error('role') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                
            @else
                {{Form::select('role',  ['1' => 'Parish Priest', '2' => 'Asst. Parish Priest'], null,['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}} 
                @error('role') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            @endif
        </div>

        <div class="form-group">
            {{Form::label('status', 'Select Status')}}
            @if (!empty($priest->priest_status))
                    @if ($priest->priest_status > 1)
                        {{Form::select('status',  ['1' => 'Current', '2' => 'Past'], '2',['id' => 'status', 'class' => 'form-control' . ($errors->has('status') ? ' form-control is-invalid' : null), 'placeholder' => 'Select status'])}}  
                    @else
                        {{Form::select('status',  ['1' => 'Current', '2' => 'Past'], '1',['id' => 'status', 'class' => 'form-control' . ($errors->has('status') ? ' form-control is-invalid' : null), 'placeholder' => 'Select status'])}} 
                    @endif  
                    @error('status') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                
            @else
                {{Form::select('status',  ['1' => 'Current', '2' => 'Past'], null,['id' => 'status', 'class' => 'form-control' . ($errors->has('status') ? ' form-control is-invalid' : null), 'placeholder' => 'Select status'])}} 
                @error('status') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            @endif
        </div>

        <div class="form-group">
            {{Form::label('image', 'Select Image')}}
            {{Form::file('image')}}
            @error('image') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

       
        