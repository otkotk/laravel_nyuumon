<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello/Index ~ bladeだよ</title>
    <style>
        body{
            font-size: 16pt;
            color: #999;
        }
        h1{
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0 -30px 0;
            letter-spacing: -4pt;
        }
    </style>
</head>
<body>
    <!-- <h1>Blade/Index</h1>
    @isset($msg)
    <p>こんにちは、{{$msg}}さん。</p>
    @else
    <p>なんか書いてよぉ～</p>
    @endisset
    <form action="/hello" method="post">
        @csrf
        <input type="text" name="message" id="">
        <input type="submit" value="submit">
    </form> -->

    <!-- <h1>Blade/Index(foreach)</h1>
    <p>$#064;foreachディレクティブの例</p>
    <ol>
        @foreach($data as $item)
        <li>{{$item}}</li>
        @endforeach
    </ol> -->

    <!-- <h1>Blade/Index(for...break)</h1>
    <p>&#064;forディレクティブの例</p>
    <ol>
        @for($i=1; $i<100; $i++)
        @if($i % 2 == 1)
            @continue
        @elseif($i <= 10)
        <li>No, {{$i}}</li>
        @else
            @break
        @endif
        @endfor
    </ol> -->

    <!-- <h1>Blade/Index(loop)</h1>
    <p>&#064;forディレクティブの例</p>
    @foreach($data as $item)
    @if($loop->first)
    <p>※データ一覧</p>
    <ul>
    @endif
        <li>No, {{$loop->iteration}} . {{$item}}</li>
    @if($loop->last)
    </ul>
    <p>---ここまで</p>
    @endif
    @endforeach -->

    <h1>Blade/Index</h1>
    <p>&#064;whileディレクティブの例</p>
    <ol>
    @php
    $counter = 0;
    @endphp
    @while($counter < count($data))
        <li>{{$data[$counter]}}</li>
        @php
        $counter++;
        @endphp
    @endwhile
    </ol>
</body>
</html>