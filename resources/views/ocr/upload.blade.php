@include('head')
<div class="dashboard-link text-end text-white  m-3">
    <a href="{{ route('welcome') }}" class="text-decoration-none gold-font">Dashboard</a>
</div>
<div style="background-color: #000;">
    <div class="container mt-5  p-4 rounded shadow-sm " style="background-color: #151c1d;">
        <h1 class="mb-4 text-center fw-bold gold-font">Upload Image for OCR</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div style="">
            <form method="POST" action="{{ route('ocr.process') }}" enctype="multipart/form-data" class="mb-5">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold blue-font">Select Image</label>
                    <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-lg w-100 text-white" style="background-color: #42869e;">Upload and Process</button>
            </form>
        </div>
        @isset($numbers)
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    @foreach ($numbers as $num)
                        <div class="col-3">
                            <div class="card text-center p-3 shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title mb-0 fw-semibold">{{ $num }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted text-center fst-italic">No numbers detected.</p>
        @endisset
    </div>
</div>


@include('footer')
