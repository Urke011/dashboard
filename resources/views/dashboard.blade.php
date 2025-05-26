@include('head')
<body>
<div id="app">
    <div>
        @if(session('success'))
            <p>
                <success-alert message="{{ session('success') }}"></success-alert>
            </p>
        @endif
    </div>
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
    <div class="dashboard-container">
        <div class="container">
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
                    @if (!empty($stocks))
                    <div class="stock-scroll-bar" style="">
                        @foreach ($stocks as $stock)
                            <div class="m-2 p-1 tabs-background-color rounded">
                                <div class="p-1 border-b border-gray-300">
                                    <p><span class="blue-font">Symbol:</span> {{ $stock->stockSymbol }}</p>
                                    <p><span class="blue-font">Update:</span> {{ $stock->LastRefreshed }}</p>
                                    <p><span class="blue-font">Price:</span> {{ $stock->high }}$</p>
                                    <p><span class="blue-font">Volume:</span> {{ $stock->volume }}</p>
                                </div>
                            </div>
                        @endforeach     
                    </div>
                    @else
                        <p class="text-gray-500">No stock data available.</p>
                    @endif
                </div>
                <div class="grid-2 m-2">
                    <div class="tabs-background-color p-2 m-2 rounded d-flex justify-content-between">
                        <h4 class="blue-font"><strong>Tudo</strong></h4>
                        <a href="{{ route('todo.create') }}" title="Create new Task"><span class="text-white blue-font"><x-ri-todo-line/></span></a>
                    </div>
                    @if(!empty($allTodoTasks))
                    @foreach($allTodoTasks as $allTodoTask)
                        <div class="todo-card tabs-background-color p-2 m-2 rounded">
                            <h5 class="grau-font">{{$allTodoTask['title']}}</h5>
                            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                                <div>
                                    <p class="grau-font" style="font-size: small;">{{$allTodoTask['description']}} </p>
                                </div>
                                <div class="d-flex text-white todo-tasks">
                                    <div>
                                        <a href="{{ route('todo.edit', $allTodoTask['id']) }}">
                                            <span class="p-1 todo-icon white-img-color"><x-tabler-pencil/></span>
                                        </a>
                                    </div>
                                    <div>
                                        <span class="p-1 todo-icon"><delete-task
                                                :task-id="{{json_encode($allTodoTask['id'])}}"></delete-task></span>
                                    </div>
                                    <div>
                                        <span class="p-1 cheked-icon"><x-bi-check-circle-fill/></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="tabs-background-color m-3 grid-3 rounded">
                    <div class="col text-white p-2 tabs-background-color text-center fit-content rounded"
                         style="width: 100%; overflow-wrap: break-word;">
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
                    <div class="tabs-background-color p-2 m-2 rounded"
                         style=" background-image: url('{{asset('images/mp3Background/posters-brazil-background-seamless-pattern.jpg.jpg')}}');">
                        <mp3-player></mp3-player>
                    </div>
                </div>
                <div class="grid-5">
                    <div class="tabs-background-color p-3 m-2 rounded">
                        <p class="text-white center">“It’s harder to read code than to write it”</p>
                    </div>
                    <div class="tabs-background-color p-3 m-2 rounded">
                        <p class="text-white center">“Nothing is as permanent as a temporary solution that works”</p>
                    </div>
                    <div class="tabs-background-color p-3 m-2 rounded">
                        <p class="text-white center">“The best code is no code at all. Because then there are no bugs.”</p>
                    </div>
                </div>
                <div class="grid-6">

                </div>
            </div>
        </div>
    </div>
    <div class="hover-container m-1">
        <div class="text-end">
            <form action="{{ route('reset.cache') }}" method="POST">
                @csrf
                <button type="submit">Reset</button>
            </form>
            <p class="text-white" style="font-size: x-small;">Number of calls today:
                <strong>{{ $callCount }}</strong><br><span>Left calls: {{ $maxCalls - $callCount }}</span></p>
        </div>
    </div>
</div>
</body>
@include('footer')
