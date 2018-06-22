@if (Auth::user()->is_likeing($bijo->id))
    {!! Form::open(['route' => 'bijo_user.dont_like', 'method' => 'delete']) !!}
        {!! Form::hidden('bijoId', $bijo->id) !!}
        {!! Form::submit('Like', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'bijo_user.like']) !!}
        {!! Form::hidden('bijoId', $bijo->id) !!}
        {!! Form::submit('Like it', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endif