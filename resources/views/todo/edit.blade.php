@include('head')
    <div class="dashboard-link text-end text-white  m-3">
        <a href="{{ route('welcome') }}" class="text-decoration-none gold-font">Dashboard</a>
    </div>
<div class="container mt-5 rounded">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card p-3">
                <div class="card-header ">
                    <h3>Edit Todo Task</h3>
                </div>
                <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $todo->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description', $todo->description) }}</textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_complete" id="is_complete" class="form-check-input" value="1" {{ $todo->is_complete ? 'checked' : '' }}>
                        <label for="is_complete" class="form-check-label">Mark as Complete</label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Update Todo</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')

