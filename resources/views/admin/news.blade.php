@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('flash_message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Noticias indexadas (Total: <?php echo $news->total() ?>)</div>

                <div class="panel-body">
                    <ul class="news-list">
                        <?php foreach ($news as $n): ?>
                            <li class="news-list__item list-unstyled">
                                <small>{{ $n->date }}</small>
                                 · 
                                 {!! Form::open(['action' => ['NewsItemController@destroy', $n->id], 'method' => 'delete']) !!}
                                   {!! Form::submit('Eliminar', ['class'=>'btn btn-warning btn-xs']) !!}
                                 {!! Form::close() !!}
                                 · 
                                <a href="{{ $n->permalink }}">{{ $n->title }}</a> · 
                                <small>({{ $n->feed->title }})</small>

                            </li>
                        <?php endforeach ?>
                    </ul>
                    <div>
                        <?php echo $news->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
