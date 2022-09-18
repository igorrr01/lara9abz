<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Users Table</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Users Table</span>
    </nav>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">City</th>
        <th scope="col">Email</th>
        <th scope="col">Birthday</th>
        </tr>
    </thead>
    <tbody id="users">
    </tbody>
    </table>
    <a class="btn btn-dark" href="{{ route('create') }}" role="button">Add user</a>
    <a class="btn btn-outline-primary" href="{{ route('add.photo') }}" role="button">Add photo</a>
    <div class="text-center m-3">
        <button class="btn btn-primary" id="load-more" data-paginate="2">Show more</button>
        <p class="invisible">
        <a class="btn btn-primary" href="{{ route('seeder') }}" role="button">Seed 45 users</a>
        </p>
    </div>
</div>

<script type="text/javascript">
var paginate = 1;
loadMoreData(paginate);

$('#load-more').click(function() {
    var page = $(this).data('paginate');
    loadMoreData(page);
    $(this).data('paginate', page+1);
});

function loadMoreData(paginate) {
    $.ajax({
        url: '?page=' + paginate,
        type: 'get',
        datatype: 'html',
        beforeSend: function() {
            $('#load-more').text('Loading...');
        }
    })
    .done(function(data) {
        if(data.length == 0) {
            $('.invisible').removeClass('invisible');
            $('#load-more').hide();
            return;
        } else {
            $('#load-more').text('Load more...');
            $('#users').append(data);
        }
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        alert('Something went wrong.');
    });
}
</script>

</body>
</html>