<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ab-datepicker@latest/css/datepicker.css" type="text/css" />
    <title>Add photo</title>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Add photo</span>
    </nav>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form enctype="multipart/form-data" action="{{ route('store.photo') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload photo</label>
            <input class="form-control" name="photo" type="file" id="formFile">
            <button class="btn btn-primary mt-2" type="submit">Upload</button>
        </div>
    </form>

    @foreach($photos as $photo)
    <a href="/public/photos/{{ $photo->url }}"><img src="/public/photos/{{ $photo->url }}" alt=""></a>
    @endforeach

</div>
</body>
</html>