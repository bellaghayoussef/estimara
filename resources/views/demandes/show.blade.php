@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($demande->name) ? $demande->name : 'Demande' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('demandes.demande.destroy', $demande->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('demandes.demande.index') }}" class="btn btn-primary" title="{{ trans('demandes.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('demandes.demande.create') }}" class="btn btn-success" title="{{ trans('demandes.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('demandes.demande.edit', $demande->id ) }}" class="btn btn-primary" title="{{ trans('demandes.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('demandes.delete') }}" onclick="return confirm(&quot;{{ trans('demandes.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('demandes.name') }}</dt>
            <dd>{{ $demande->name }}</dd>
            <dt>{{ trans('demandes.email') }}</dt>
            <dd>{{ $demande->email }}</dd>
            <dt>{{ trans('demandes.phone') }}</dt>
            <dd>{{ $demande->phone }}</dd>
            <dt>{{ trans('demandes.company') }}</dt>
            <dd>{{ $demande->company }}</dd>
            <dt>{{ trans('demandes.type') }}</dt>
            <dd>{{ $demande->type }}</dd>
            <dt>{{ trans('demandes.discription') }}</dt>
            <dd>{{ $demande->discription }}</dd>
            <dt>{{ trans('demandes.file') }}</dt>
            <dd>{{ asset('storage/' . $demande->file) }}</dd>
            <dt>{{ trans('demandes.shop1') }}</dt>
            <dd>{{ $demande->shop1 }}</dd>
            <dt>{{ trans('demandes.shop2') }}</dt>
            <dd>{{ $demande->shop2 }}</dd>
            <dt>{{ trans('demandes.shop3') }}</dt>
            <dd>{{ $demande->shop3 }}</dd>

        </dl>

    </div>
</div>

@endsection