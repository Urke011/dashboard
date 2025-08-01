@include('head')
<div class="dashboard-link text-end text-white  m-3">
    <a href="{{ route('welcome') }}" class="text-decoration-none gold-font">Dashboard</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div style="background-color: #000;">
    <div class="container mt-5  p-4 rounded shadow-sm slideInLeftFade" style="background-color: #151c1d;">
        <h1 class="mb-4 text-center fw-bold gold-font">Select category</h1>
        <div style="margin: 0 auto; width: 85%;">
            <form method="POST" action="{{ route('receipt.store') }}">
                @csrf
                <receipts-category></receipts-category>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form
            >
        </div>
    </div>
</div>
@include('footer')
