@extends('layouts.app')

@section('content')
    <div class="cover4">
        <div class="cover-inner">
            <div class="cover-contents">
                 <h1>{{ $bijo->status }} のプロフィール編集</h1>
            </div>
        </div>
    </div>

    <div class="row">
         <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($bijo, ['route' => ['bijos.update', $bijo->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('status', '女の子名:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content', 'プロフィール:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('master', 'master名:') !!}
                    {!! Form::text('master', null, ['class' => 'form-control']) !!}
                </div>
                
                
                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
                
    
            {!! Form::close() !!}
        </div>
    </div>

@endsection
