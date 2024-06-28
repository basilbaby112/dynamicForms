<!-- resources/views/admin/forms/edit.blade.php -->
@extends('layouts.layouts')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Form</h1>

        <!-- Form for editing the form title -->
        <form action="{{ route('admin.forms.update', $form->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $form->title }}" required>
            <button type="submit" class="mt-3 btn btn-primary">Update Form</button>
        </form>
    
        <!-- Section for managing form fields -->
        <h2>Manage Fields</h2>
        <form action="{{ route('admin.formFields.store') }}" method="POST">
            @csrf
            <input type="hidden" name="form_id" value="{{ $form->id }}">
            <label for="label" class="form-label">Label</label>
            <input type="text" class="form-control" name="label" id="label" required>
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-select" id="type" onchange="toggleOptions(this)">
                <option value="text">Text</option>
                <option value="number">Number</option>
                <option value="select">Select</option>
            </select>
            <div id="options-container" style="display: none;">
                <label for="options" class="form-label">Options</label>
                <input type="text" class="form-control" name="options[]" placeholder="Option 1">
                <input type="text" class="form-control" name="options[]" placeholder="Option 2">
                <button type="button" class="mt-3 btn btn-primary" onclick="addOption()">Add Another Option</button>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Add Field</button>
        </form>
    
        <!-- List of existing fields with edit and delete options -->
        <ul>
            @foreach ($form->formFields as $field)
                <li>
                    <form action="{{ route('admin.formFields.update', $field->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <label for="label-{{ $field->id }}" class="form-label">Label</label>
                        <input type="text" class="form-control" name="label" id="label-{{ $field->id }}" value="{{ $field->label }}" required>
                        <label for="type-{{ $field->id }}" class="form-label">Type</label>
                        <select name="type" class="form-select" id="type-{{ $field->id }}" onchange="toggleOptions(this, '{{ $field->id }}')">
                            <option value="text" @if($field->type == 'text') selected @endif>Text</option>
                            <option value="number" @if($field->type == 'number') selected @endif>Number</option>
                            <option value="select" @if($field->type == 'select') selected @endif>Select</option>
                        </select>
                        <div id="options-container-{{ $field->id }}" style="display: {{ $field->type == 'select' ? 'block' : 'none' }};">
                            <label for="options-{{ $field->id }}" class="form-label">Options</label>
                            @if($field->options)
                            @php
                                $options = json_decode($field->options, true);
                            @endphp
                                @foreach ($options as $option)
                                    <input type="text" class="form-control" name="options[]" value="{{ $option }}">
                                @endforeach
                            @endif
                            <button type="button" class="mt-3 btn btn-primary" onclick="addOption('{{ $field->id }}')">Add Another Option</button>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">Update</button>
                    </form>
                    <form action="{{ route('admin.formFields.destroy', $field->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-3 btn btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    
        <!-- Back link to forms index -->
        <a href="{{ route('admin.forms.index') }}">Back to Forms</a>
    
        <script>
            function toggleOptions(selectElement, fieldId = null) {
                const type = selectElement.value;
                const optionsContainer = fieldId ? document.getElementById(`options-container-${fieldId}`) : document.getElementById('options-container');
                if (type === 'select') {
                    optionsContainer.style.display = 'block';
                } else {
                    optionsContainer.style.display = 'none';
                }
            }
    
            function addOption(fieldId = null) {
                const optionsContainer = fieldId ? document.getElementById(`options-container-${fieldId}`) : document.getElementById('options-container');
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'options[]';
                optionsContainer.appendChild(input);
            }
        </script>
    </div>
</div>
@endsection
