@if ($bijos)
    <div class="row">
        @foreach ($bijos as $bijo)
            <div class="bijo">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div id=images class="panel-heading text-center">
                            <img src="{{asset('item/'.$bijo->path)}}">
                        </div>
                        <div class="panel-body">
                            <h3 id="name" class="bijo-title">{!! link_to_route('bijos.show', $bijo->status, ['status' => $bijo->id]) !!}</h3>
                            <div id="botton" class="buttons text-center">
                                @if (Auth::check())
                                    @include('bijos.like_button', ['bijo' => $bijo])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif