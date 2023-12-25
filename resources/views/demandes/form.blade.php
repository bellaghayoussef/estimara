
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('demandes.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($demande)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('demandes.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('demandes.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($demande)->email) }}" placeholder="{{ trans('demandes.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('demandes.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($demande)->phone) }}" minlength="1" placeholder="{{ trans('demandes.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
    <label for="company" class="col-md-2 control-label">{{ trans('demandes.company') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="company" type="text" id="company" value="{{ old('company', optional($demande)->company) }}" minlength="1" placeholder="{{ trans('demandes.company__placeholder') }}">
        {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">{{ trans('demandes.type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($demande)->type) }}" minlength="1" placeholder="{{ trans('demandes.type__placeholder') }}">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discription') ? 'has-error' : '' }}">
    <label for="discription" class="col-md-2 control-label">{{ trans('demandes.discription') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="discription" type="text" id="discription" value="{{ old('discription', optional($demande)->discription) }}" minlength="1" placeholder="{{ trans('demandes.discription__placeholder') }}">
        {!! $errors->first('discription', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
    <label for="file" class="col-md-2 control-label">{{ trans('demandes.file') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="file" id="file" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($demande->file) && !empty($demande->file))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_file" class="custom-delete-file" value="1" {{ old('custom_delete_file', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $demande->file }}
                </span>
            </div>
        @endif
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shop1') ? 'has-error' : '' }}">
    <label for="shop1" class="col-md-2 control-label">{{ trans('demandes.shop1') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="shop1" type="text" id="shop1" value="{{ old('shop1', optional($demande)->shop1) }}" minlength="1" placeholder="{{ trans('demandes.shop1__placeholder') }}">
        {!! $errors->first('shop1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shop2') ? 'has-error' : '' }}">
    <label for="shop2" class="col-md-2 control-label">{{ trans('demandes.shop2') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="shop2" type="text" id="shop2" value="{{ old('shop2', optional($demande)->shop2) }}" minlength="1" placeholder="{{ trans('demandes.shop2__placeholder') }}">
        {!! $errors->first('shop2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shop3') ? 'has-error' : '' }}">
    <label for="shop3" class="col-md-2 control-label">{{ trans('demandes.shop3') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="shop3" type="text" id="shop3" value="{{ old('shop3', optional($demande)->shop3) }}" minlength="1" placeholder="{{ trans('demandes.shop3__placeholder') }}">
        {!! $errors->first('shop3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

