<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">FormS</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                  </li>
                </ul>
            </div>
            <a href="{{route('admin')}}" class="btn btn-outline-success">Admin</a>
            
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            @if (session('message'))
                <p class="alert alert-info">{{session('message')}}</p>
            @endif
            <h1>{{ $form->title }}</h1>
            <form action="{{ route('forms.store') }}" method="POST">
                @csrf
                <input type="hidden" name="form_id" value="{{ $form->id }}">
                @foreach ($form->formFields as $field)
                    <div>
                        <label for="field-{{ $field->id }}" class="form-label">{{ $field->label }}</label>
                        @if ($field->type == 'text')
                            <input type="text" class="form-control" name="field_{{ $field->id }}" id="field-{{ $field->id }}">
                        @elseif ($field->type == 'number')
                            <input type="text" class="form-control" name="field_{{ $field->id }}" id="field-{{ $field->id }}">
                        @elseif ($field->type == 'select')
                            <select class="form-select" name="field_{{ $field->id }}" id="field-{{ $field->id }}">
                            @php
                                $options = json_decode($field->options, true);
                            @endphp
                                @foreach ($options as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @endforeach
                <button class="mt-3 btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
        
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


