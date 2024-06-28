@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2>Add Forms</h2>
    <div class="row">
        <form action="{{ route('admin.forms.store') }}" method="POST">
            @csrf
            <div class="col-md-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Create Form</button>
        </form>
    </div>
</div>
@endsection
