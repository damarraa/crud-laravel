<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h3 class="text-center my-4">Data Books</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $books->cover) }}" alt="Book Cover" style="height: auto; width: 250px">
                        <h3>{{ $books->title }}</h3>
                        <p>Publish date: {{ $books->publish_date }}</p>
                        <hr />
                        <code>
                            <p>{!! $books->description !!}</p>
                        </code>
                        <hr />
                        <p>Price: {{ $books->price }}</p>
                        <p>Stock: {{ $books->stock }}</p>
                        <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary me-3">BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
