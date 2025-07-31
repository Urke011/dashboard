@include('head')
<div class="dashboard-link text-end text-white  m-3">
    <a href="{{ route('welcome') }}" class="text-decoration-none gold-font">Dashboard</a>
</div>
<form action="{{ route('todo.store') }}" method="POST">
    @csrf
    <div class="container mt-5 slideDownFadeIn">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Todo Task</h3>
                    </div>
                    <div class="card-body">
                        <!-- Todo Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <!-- Todo Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Task</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('footer')
