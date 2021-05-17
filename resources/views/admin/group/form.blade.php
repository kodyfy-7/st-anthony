        <div class="form-group">
            {{Form::label('title', 'Group Title')}}
            {{Form::text('title', old('title') ?? $group->group_title, ['id' => 'title', 'class' => 'form-control' . ($errors->has('title') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('type', 'Select type')}}
            @if (!empty($group->group_type))
                    @if ($group->group_type == 1)
                        {{Form::select('type',  ['1' => 'Organization', '2' => 'Society', '3' => 'Liturgy', '4' => 'Basic Christian Community'], '1',['id' => 'type', 'class' => 'form-control' . ($errors->has('type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select type'])}}  
                    @elseif($group->group_type == 2)
                        {{Form::select('type',  ['1' => 'Organization', '2' => 'Society', '3' => 'Liturgy', '4' => 'Basic Christian Community'], '2',['id' => 'type', 'class' => 'form-control' . ($errors->has('type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select type'])}} 
                    @elseif($group->group_type == 3)
                        {{Form::select('type',  ['1' => 'Organization', '2' => 'Society', '3' => 'Liturgy', '4' => 'Basic Christian Community'], '3',['id' => 'type', 'class' => 'form-control' . ($errors->has('type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select type'])}} 
                    @elseif($group->group_type == 4)
                        {{Form::select('type',  ['1' => 'Organization', '2' => 'Society', '3' => 'Liturgy', '4' => 'Basic Christian Community'], '4',['id' => 'type', 'class' => 'form-control' . ($errors->has('type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select type'])}} 
                    @endif  
                    @error('type') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                
            @else
                {{Form::select('type',  ['1' => 'Organization', '2' => 'Society', '3' => 'Liturgy', '4' => 'Basic Christian Community'], null,['id' => 'type', 'class' => 'form-control' . ($errors->has('type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select type'])}} 
                @error('type') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            @endif
        </div>

        <div class="form-group">
            {{Form::label('description', 'Group Description')}}
            {{Form::textarea('description', old('description') ?? $group->group_description, ['id' => 'description', 'class' => 'form-control' . ($errors->has('description') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('description') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('motto', 'Group Motto')}}
            {{Form::text('motto', old('motto') ?? $group->group_title, ['id' => 'motto', 'class' => 'form-control' . ($errors->has('motto') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('motto') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('time', 'Meeting Time')}}
            {{Form::text('time', old('time') ?? $group->group_time_meeting, ['id' => 'time', 'class' => 'form-control' . ($errors->has('time') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('time') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <!--<div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Multiple</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <select class="select2_multiple form-control" multiple="multiple">
                <option>Choose option</option>
                <option>Option one</option>
                <option>Option two</option>
                <option>Option three</option>
                <option>Option four</option>
                <option>Option five</option>
                <option>Option six</option>
              </select>
            </div>
          </div>-->

        <div class="form-group">
            {{Form::label('president', 'President')}}
            {{Form::select('president', App\Models\Profile::pluck('full_name', 'user_id'), '',['id' => 'president', 'class' => 'select2 form-control', 'placeholder' => 'Select President', 'tabindex' => '-1'])}}
            @error('president') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('image', 'Select Image')}}
            {{Form::file('image')}}
            @error('image') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

       