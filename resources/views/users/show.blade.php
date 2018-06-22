@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <body>
        <div class="status text-center">
            <ul>
                
                <li>
                    <div class="status-label">LIKE</div>
                    <div id="post_count" class="status-value">
                        ...
                    </div>
                </li>
                <li>
                    <div class="status-label">POST</div>
                    <div id="like_count" class="status-value">
                        {{ $count_like }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
    @include('bijos.bijos')
    {!! $bijos->render() !!}
@endsection

