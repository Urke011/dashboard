@include('head')
<body>
<div id="app">
    <div>
    @if(session('success'))
        <p><success-alert message="{{ session('success') }}"></success-alert></p>
    @endif
    </div>
    <div class="dashboard-container">
        <div class="container">
            <h1 class="text-white">Deploy </h1>
            <div class="dashboard-background-color">
                <div class="grid-1 text-white p-2 rounded">
                    <div class="m-2 tabs-background-color rounded">
                        <div class="text-end d-flex justify-content-between align-items-center p-2 m-2 rounded">
                            <div>
                                <h4 class="blue-font mb-0"><strong>Stocks</strong></h4>
                            </div>
                            <div>
                                <img src="{{ url('images/stock_icon.png') }}" style="width: 2rem;" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class=" m-2 p-2 tabs-background-color rounded">
                        @if(isset($stocks[0]))
                            <p><span class="blue-font">Symbol:</span> {{ $stocks[0]->stockSymbol }}</p>
                            <p><span class="blue-font">Update:</span> {{ $stocks[0]->LastRefreshed }}</p>
                            <p><span class="blue-font">Price:</span> {{ $stocks[0]->high }}$</p>
                            <p><span class="blue-font">Volume:</span> {{ $stocks[0]->volume }}</p>
                        @endif
                    </div>
                    <div class="m-2 p-2 tabs-background-color rounded">
                        @if(isset($stocks[0]))
                            <p><span class="blue-font">Symbol:</span> {{ $stocks[0]->stockSymbol }}</p>
                            <p><span class="blue-font">Update:</span> {{ $stocks[0]->LastRefreshed }}</p>
                            <p><span class="blue-font">Price:</span> {{ $stocks[0]->high }}$</p>
                            <p><span class="blue-font">Volume:</span> {{ $stocks[0]->volume }}</p>
                        @endif
                    </div>
                </div>

                <div class="grid-2 m-2">
                    <div class="tabs-background-color p-2 m-2 rounded d-flex justify-content-between">
                        <h4 class="blue-font"><strong>Tudo</strong></h4>
                        <a href="{{ route('todo.create') }}"><span class="text-white blue-font"><x-ri-todo-line/></span></a>
                    </div>
                    @foreach($allTodoTasks as $allTodoTask)
                    <div class="todo-card tabs-background-color  p-2 m-2 rounded">

                            <h5 class="text-white">{{$allTodoTask['title']}}</h5>
                            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                                <div>
                                    <h6 class="text-white">{{$allTodoTask['description']}} </h6>
                                </div>
                                <div class="text-white">
                                    <span class="p-1"><x-tabler-pencil/></span><span class="p-1"><x-sui-trash/></span><span class="p-1"><x-bi-check-circle-fill/></span>
                                </div>
                            </div>

                    </div>
                    @endforeach
                </div>
                <div class="tabs-background-color m-3 grid-3 rounded">
                    <div class="col text-white p-2 tabs-background-color text-center fit-content rounded" style="width: 100%; overflow-wrap: break-word;">
                        <p class="grau-font fs-6">{{$date}}</p>
                        <p class="gold-font">
                            <time-display></time-display>
                        </p>
                        <p>Daily Weather :</p>
                        <div class="text-start d-flex justify-content-between">
                            @foreach($weatherRecords as $index => $weatherRecord)
                                <div class="weather-card d-flex border-gray">
                                <span class="grau-font">
                                     {{ $weatherRecord['town']}}&nbsp;
                                </span>
                                <span class="grau-font">
                                 {{ $weatherRecord['weather']}}&deg;
                                 </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="grid-4 m-2">
                    <div class="tabs-background-color p-2 m-2 rounded" >
                        <p class="text-white text-center">Music</p>
                    </div>
                </div>
                <div class="grid-5">
                    <div class="tabs-background-color p-2 m-2 rounded">
                        <p class="text-white">"Developer Quotes"</p>
                    </div>
                    <div class="tabs-background-color p-2 m-2 rounded">
                        <p class="text-white">"German Quotes"</p>
                    </div>
                    <div class="tabs-background-color p-3 m-2 rounded">
                        <p class="text-white">"Neki citat"</p>
                    </div>
                </div>
                <div class="grid-6">
                    <div class="tabs-background-color p-2 m-2 rounded">
                        <p class="text-white">something for future ideas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@include('footer')
