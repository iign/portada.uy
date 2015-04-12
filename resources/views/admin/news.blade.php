@extends('admin/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Noticias indexadas (Total: <?php echo $news->total() ?>)</div>

                <div class="panel-body">
                    <ul>
                        <?php foreach ($news as $n): ?>
                            <li>
                                <small>{{ $n->date }}</small> · 
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
