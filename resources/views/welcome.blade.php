@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>The Clock tells you the wonderful time...</h1>
                @if (!Auth::check())
                <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">Bijo Clockを始める</a>
                @else
                <a href="{{ route('bijos.index') }}" class="btn btn-success btn-lg">Bijo Clock</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('bijos.bijos')
    {!! $bijos->render() !!}
@endsection