@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('demandes.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('demandes.demande.create') }}" class="btn btn-success" title="{{ trans('demandes.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($demandes) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('demandes.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('demandes.name') }}</th>
                            <th>{{ trans('demandes.email') }}</th>
                            <th>{{ trans('demandes.phone') }}</th>
                            <th>{{ trans('demandes.company') }}</th>
                            <th>{{ trans('demandes.type') }}</th>
                            <th>{{ trans('demandes.discription') }}</th>
                            <th>{{ trans('demandes.shop1') }}</th>
                            <th>{{ trans('demandes.shop2') }}</th>
                            <th>{{ trans('demandes.shop3') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($demandes as $demande)
                        <tr>
                            <td>{{ $demande->name }}</td>
                            <td>{{ $demande->email }}</td>
                            <td>{{ $demande->phone }}</td>
                            <td>{{ $demande->company }}</td>
                            <td>{{ $demande->type }}</td>
                            <td>{{ $demande->discription }}</td>
                            <td>{{ $demande->shop1 }}</td>
                            <td>{{ $demande->shop2 }}</td>
                            <td>{{ $demande->shop3 }}</td>

                            <td>

                                <form method="POST" action="{!! route('demandes.demande.destroy', $demande->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('demandes.demande.show', $demande->id ) }}" class="btn btn-info" title="{{ trans('demandes.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('demandes.demande.edit', $demande->id ) }}" class="btn btn-primary" title="{{ trans('demandes.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('demandes.delete') }}" onclick="return confirm(&quot;{{ trans('demandes.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $demandes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection