@if (Auth::user()->is_favoriteing($bijo->id))
        {!! Form::open(['route' => ['user.unfavorite', $bijo->id], 'method' => 'delete']) !!}
            {!! Form::submit('UnLike', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['user.favorite', $bijo->id]]) !!}
            {!! Form::submit('Like', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
@endif
