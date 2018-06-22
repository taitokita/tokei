@extends('layouts.app')

@section('content')
    <div class="cover3">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Bijoとの出会いのページ</h1>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="row">
            <div class="text-center">
                    {!! Form::model($bijo, ['route' => 'bijos.store', 'enctype'=>'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('status', 'Bijo名:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control input-lg', 'placeholder' => 'Bijo名を入力', 'size' => 40]) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', 'プロフィール:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control input-lg', 'placeholder' => 'profileを入力', 'size' => 40]) !!}
                </div>
                
                 <div class="form-group">
                    {!! Form::label('master', 'master名:') !!}
                    {!! Form::text('master', null, ['class' => 'form-control input-lg', 'placeholder' => 'master名を入力', 'size' => 40]) !!}
                </div>
                
                <div class="form-group">
                    <label for="photo">画像ファイル:</label>
                    {!! Form::file('photo') !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary lg']) !!}
        
            {!! Form::close() !!}
            </div>
        </div>
    </div>

  
@endsection