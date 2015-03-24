@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                    <h2>Últimas noticias subidas</h2>
                    <ul>
                        @foreach ($news as $n)
                            <li>
                                <small>{{ date("d/m/Y H:i", strtotime( $n->date )) }}</small> · 
                                <a href="{{ $n->permalink }}">{{ $n->title }}</a> · 
                                <small>({{ $n->feed->title }})</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
