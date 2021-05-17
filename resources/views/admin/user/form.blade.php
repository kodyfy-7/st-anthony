        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', old('name') ?? $admin->name, ['id' => 'name', 'class' => 'form-control' . ($errors->has('name') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="form-group">
            {{Form::label('number', 'Phone Number')}}
            {{Form::text('number', old('number') ?? $admin->admin_number, ['id' => 'number', 'class' => 'form-control' . ($errors->has('number') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('number') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('email', 'Email Address')}}
            {{Form::text('email', old('email') ?? $admin->email, ['id' => 'email', 'class' => 'form-control' . ($errors->has('email') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('email') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('role', 'Role')}}
            @if (!empty($admin->super_admin))
                    @if ($admin->super_admin > 0)
                        {{Form::select('role',  ['1' => 'Super Admin', '2' => 'Sub Admin'], '1',['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}}  
                    @else
                        {{Form::select('role',  ['1' => 'Super Admin', '2' => 'Sub Admin'], '2',['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}} 
                    @endif  
                    @error('role') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                
            @else
                {{Form::select('role',  ['1' => 'Super Admin', '2' => 'Sub Admin'], null,['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => 'Select role'])}} 
                @error('role') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            @endif
        </div>

       
        