@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($shop->name) ? $shop->name : 'Shop' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('shops.shop.destroy', $shop->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('shops.shop.index') }}" class="btn btn-primary" title="{{ trans('shops.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('shops.shop.create') }}" class="btn btn-success" title="{{ trans('shops.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('shops.shop.edit', $shop->id ) }}" class="btn btn-primary" title="{{ trans('shops.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('shops.delete') }}" onclick="return confirm(&quot;{{ trans('shops.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('shops.name') }}</dt>
            <dd>{{ $shop->name }}</dd>
            <dt>{{ trans('shops.reserved') }}</dt>
            <dd>{{ $shop->reserved }}</dd>

        </dl>

    </div>
</div>

@endsection