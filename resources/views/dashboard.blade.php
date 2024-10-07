<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<h1 class="text-3xl font-bold">
    Dashboard
</h1>
<div class="grid grid-cols-4 gap-4">
    <div>01</div>
    <div>02</div>
    <div>03</div>
    <div class="">@if(isset($stocks))
            @foreach($stocks as $stock)
                <h2>Title: {{ $stock->title }} <span><b>({{$stock->symbol}})</b></span></h2>
                <p>Latest Price: {{ $stock->{'latest-price'} }}$</p>
                <p>Latest Time: {{  $stock->latestTime }}</p>
                <p>Latest Data: {{ json_encode($stock->{'latest-data'}) }}</p>
                <hr>
            @endforeach
        @else
            <p>No stock data available.</p>
        @endif

        @if(isset($error))
            <p>Error: {{ $error }}</p>
        @endif</div>
</div>

</body>
</html>


