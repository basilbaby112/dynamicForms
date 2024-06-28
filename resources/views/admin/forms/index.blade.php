<!-- resources/views/admin/forms/index.blade.php -->
@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.forms.create') }}" class="btn btn-primary mt-2">Create New Form</a>
    </div>
    <div class="row">
        <h2>Form Lists</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">From Title</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td><a href="{{ route('admin.forms.show', $form->id) }}">{{ $form->title }}</a></td>
                <td>
                    <a href="{{ route('admin.forms.edit', $form->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.forms.destroy', $form->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>          
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
