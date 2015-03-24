@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reporte de noticias creadas</div>

                <div class="panel-body">
                  @if (count($news) > 0)
                    @foreach ($news as $newsItem)
                        <div class="feed-item">
                            <div>
                              <strong>{{ $newsItem->getName() }}</strong>
                            </div>
                            <p>
                                {{ $newsItem->getIntro() }}
                            </p>
                            <p>
                              <a href="{{ $newsItem->getSource() }}">
                                {{ $newsItem->getSource() }}
                              </a>
                            </p>
                        </div>                    
                    @endforeach
                    <hr>
                    <p>
                      Total noticias nuevas: {{count($news)}}
                    </p>
                  @else
                    <div class="empty">
                      No se encontraron noticias nuevas.
                    </div>
                  @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
