@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Crear fuente de noticias</div>

                <div class="panel-body">

                  {!! HTML::ul($errors->all()) !!}
                  
                  {!! Form::open(array('url' => 'admin/feeds')) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{{ $errors->has('feed_url') ? ' has-error' : '' }}">
                        {!! Form::label('feed_url', 'URL del feed') !!}
                        {!! Form::text('feed_url', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('feed_url', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{{ $errors->has('feed_url') ? ' has-error' : '' }}">
                        {!! Form::label('website', 'Sitio Web (opcional)') !!}
                        {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Descripción (opcional)') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                    {!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

