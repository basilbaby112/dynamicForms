<!DOCTYPE html>
<html>
<head>
    <title>New Form Created</title>
</head>
<body>
    <h1>A new form has been created</h1>
    <p>Form Title: {{ $form->title }}</p>
    <p>You can view the form <a href="{{ route('forms.show', $form->id) }}">here</a>.</p>
</body>
</html>