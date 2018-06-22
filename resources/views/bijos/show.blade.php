<link rel="stylesheet" href="<link rel="stylesheet"">
<?php
    date_default_timezone_set('Asia/Tokyo');
    $now_hour =  (int)date("H");
    $now_minute =  (int)date("i");

    function greeting($hour) {
        $result = "";
        
        if (6 <= $hour && $hour < 12) {
            $result = "おはようございます、";
        }
        elseif (12 <= $hour && $hour < 14) {
            $result = "お腹が空いてきちゃいましたね、、";
        }
        elseif (14 <= $hour && $hour < 16) {
            $result = "お昼ご飯はいかがでしたか？";
        }
        elseif (16 <= $hour && $hour < 18) {
            $result = "お腹がいっぱいで眠くなってきちゃいましたね、、";
        }
        elseif (21 <= $hour && $hour < 24) {
            $result = "もう眠くなってきちゃいました、、";
        }
         elseif (24 <= $hour && $hour < 6) {
            $result = "まだ起きてるんですか～？";
        }
        else {
            $result = "おかえりなさい、";
        }
        
        return $result;
    }
    
    function greeting2($hour) {
        $result = "";
        
        if (6 <= $hour && $hour < 9) {
            $result = "今日もお仕事頑張ってね！";
        }
        elseif (9 <= $hour && $hour < 12) {
            $result = "今日も一日頑張りましょう‼";
        }
        elseif (12 <= $hour && $hour < 16) {
            $result = "午後も頑張ってくださいね！";
        }
        elseif (16 <= $hour && $hour < 18) {
            $result = "ちょっと疲れてきた頃ですよね...?　無理はしないでください!";
        }
        elseif (21<= $hour && $hour < 24) {
            $result = "そろそろお休みになる頃ですか？";
        }
        elseif (24<= $hour && $hour < 6) {
            $result = "明日のお仕事に響いちゃいますよ？";
        }
        else {
            $result = "今日もお疲れさまでした！";
        }
        
        return $result;
    }
    
      function coment($hour) {
        $result2 = "";
        if (6 <= $hour && $hour < 9) {
            $result2 = "お弁当！忘れずに持ちましたか？";
        }
       elseif (9 <= $hour && $hour < 12) {
            $result2 = "眠いからって、コーヒー飲みすぎちゃダメですよ？";
        }
        elseif (12 <= $hour && $hour < 16) {
            $result2 = "あと一息です‼";
        }
        elseif (16 <= $hour && $hour < 18) {
            $result2 = "今日は何時に帰ってきますか...？";
        }
        elseif (21 <= $hour && $hour < 24) {
            $result2 = "明日もお仕事頑張ってくださいね！";
        }
        elseif (24 <= $hour && $hour < 6) {
            $result2 = "早くお休みになるんですよ";
        }
        else {
            $result2 = "ご飯にしますか？お風呂に行きます？それとも...";
        }
        return $result2;
    }
?>

@extends('layouts.app')

@section('content')
    <div class="cover1">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>{{ $bijo->status }}'s page</h1>
                <font size="7"><?php print $now_hour; ?>:<?php print $now_minute; ?></font>
            </div>
        </div>
    </div>
    
<body>
    <div id="main1">
        <h4>{{ $bijo->status }}です！</h4>
        <h4><?php print greeting($now_hour); ?>{{ $bijo->master }}さん!</h4>
        <h4><?php print greeting2($now_hour); ?></h4>
        <h4>あ、今は<?php print $now_hour; ?>時<?php print $now_minute; ?>分ですよ!</h4>
        <h4><?php print coment($now_hour); ?></h4>
    </div>
    

    <p id=imageshow><img src="{{asset('item/'.$bijo->path) }}"></p>
    
    <table id="main2" class="table table-bordered col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        <tr>
            <th>id</th>
            <td>{{ $bijo->id }}</td>
        </tr>
        <tr>
            <th>女の子名</th>
            <td>{{ $bijo->status }}</td>
        </tr>
        <tr>
            <th>プロフィール</th>
            <td>{{ $bijo->content }}</td>
        </tr>
         <tr>
            <th>master名</th>
            <td>{{ $bijo->master }}</td>
        </tr>
        
    </table>
    
    <div>
    {!! link_to_route('bijos.edit', 'このBijoを編集', ['id' => $bijo->id], ['class' => 'btn btn-default']) !!}

　　{!! Form::model($bijo, ['route' => ['bijos.destroy', $bijo->id], 'method' => 'delete']) !!}
        {!! Form::submit('バイバイする', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
    
</body>

@endsection

