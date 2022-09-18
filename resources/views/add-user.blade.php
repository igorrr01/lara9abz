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
    <title>Users Table</title>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Add user</span>
    </nav>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" >
            @error('first_name') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" name="last_name" value="{{ old('first_name') }}" class="form-control @error('last_name') is-invalid @enderror" >
            @error('last_name') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" >
            @error('city') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" >
            @error('birthday') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
            @error('password') <div class="alert alert-danger mt-1">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</body>
</html>