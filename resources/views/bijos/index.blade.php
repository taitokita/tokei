@extends('layouts.app')

@section('content')
    <div class="cover2">
        <div class="cover-inner">
            <div class="cover-contents">
                 <h1>Bijo Clock</h1>
            </div>
        </div>
    </div>
    @if (count($bijos) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Bijos name</th>
                    <th>masters name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bijos as $bijo)
                    <tr>
                        <td>{!! link_to_route('bijos.show', $bijo->id, ['id' => $bijo->id]) !!}</td>
                        <td>{{ $bijo->status }}</td>
                        <td>{{ $bijo->master }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    @endif
    {!! link_to_route('bijos.create', '出会いに行く', null, ['class' => 'btn btn-primary']) !!}
@endsection
