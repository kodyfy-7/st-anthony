        
<div class="form-group">
            {{Form::label('member', 'Member')}}
            {{Form::select('member', App\Models\Profile::pluck('full_name', 'user_id'), '',['id' => 'member', 'class' => 'select2 form-control', 'placeholder' => 'Select Member', 'tabindex' => '-1'])}}
            @error('member') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        
        
        <div class="form-group">
            {{Form::label('role', 'Council Role')}}
            {{Form::text('role', old('role') ?? $council->council_role, ['id' => 'role', 'class' => 'form-control' . ($errors->has('role') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('role') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        
        
        <div class="form-group">
            {{Form::label('status', 'Select Status')}}
            {{Form::select('status',  ['1' => 'Current', '2' => 'Past'], null,['id' => 'status', 'class' => 'form-control' . ($errors->has('status') ? ' form-control is-invalid' : null), 'placeholder' => 'Select status'])}} 
                @error('status') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>


       