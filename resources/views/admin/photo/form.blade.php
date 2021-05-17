       
        <div class="form-group">
            {{Form::label('caption', 'Caption')}}
            {{Form::text('caption', old('caption') ?? $photo->caption, ['id' => 'caption', 'class' => 'form-control' . ($errors->has('caption') ? ' form-control is-invalid' : null), 'placeholder' => '', 'autocomplete' => 'off'])}}
            @error('caption') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>

        <div class="form-group">
            {{Form::label('image', 'Select Image')}}
            {{Form::file('image')}}
            @error('image') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>


       
        

        

       