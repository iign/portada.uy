@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Fuentes de noticias</div>

                <div class="panel-body">

                  @if (Session::has('message'))
                      <div class="alert alert-info">{{ Session::get('message') }}</div>
                  @endif

                  @foreach ($feeds as $feed)
                      <div class="feed-item">
                          <h2>{{ $feed->title }}</h2>
                          <p>
                              {{ $feed->description }}
                          </p>
                          <ul>
                              <li>
                                  <label>URL de Feed:</label>
                                  <a href="{{ $feed->feed_url }}">{{ $feed->feed_url }}</a>
                              </li>
                              <li>
                                  <label>Sitio web:</label>
                                  <a href="{{ $feed->website }}">{{ $feed->website }}</a>
                              </li>
                          </ul>
                          <div>
                              <a href="{{ URL::to('nerds/' . $feed->id . '/edit') }}" type="button" class="btn btn-primary btn-sm">
                              <span class="glyphicon glyphicon-pencil" 
                                    aria-hidden="true"></span>
                                Editar
                              </a>
                              <a href="#" type="button" class="btn btn-warning btn-sm">
                              <span class="glyphicon glyphicon-ban-circle" 
                                    aria-hidden="true"></span>
                                Deshabilitar
                              </a>
                          </div>
                      </div>
                  @endforeach
                    <hr>
                  <div>
                      <a href="{{ URL::route('admin.feeds.create') }}" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-plus-sign" 
                              aria-hidden="true"></span>
                        Crear Fuente
                      </a>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
