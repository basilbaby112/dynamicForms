@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1>{{ $form->title }}</h1>
    <a href="{{ route('admin.forms.edit', $form->id) }}" class="btn btn-info">Edit Form</a>
    <form action="{{ route('admin.formFields.store') }}" method="POST">
        @csrf
        <input type="hidden" name="form_id" value="{{ $form->id }}">
        <label for="label" class="form-label">Label</label>
        <input type="text" class="form-control" name="label" id="label" required>
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type" id="type" onchange="toggleOptions(this)">
            <option value="text">Text</option>
            <option value="number">Number</option>
            <option value="select">Select</option>
        </select>
        <div id="options-container" style="display: none;">
            <label for="options">Options</label>
            <input type="text" name="options[]" placeholder="Option 1">
            <input type="text" name="options[]" placeholder="Option 2">
            <button type="button" onclick="addOption()">Add Another Option</button>
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Add Field</button>
    </form>
    <ul>
        @foreach ($form->formFields as $field)
            <li>
                {{ $field->label }} ({{ $field->type }})
                <form action="{{ route('admin.formFields.destroy', $field->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

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

@endsection
