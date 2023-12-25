
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('shops.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($shop)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('shops.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reserved') ? 'has-error' : '' }}">
    <label for="reserved" class="col-md-2 control-label">{{ trans('shops.reserved') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="reserved" type="text" id="reserved" value="{{ old('reserved', optional($shop)->reserved) }}" minlength="1" placeholder="{{ trans('shops.reserved__placeholder') }}">
        {!! $errors->first('reserved', '<p class="help-block">:message</p>') !!}
    </div>
</div>

