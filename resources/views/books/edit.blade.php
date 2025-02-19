<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center my-4">
                    <h3>Edit Book</h3>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('books.update', $books->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Display Old Cover Image -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Current Cover</label>
                                <br>
                                @if ($books->cover)
                                    <img src="{{ asset('storage/' . $books->cover) }}" alt="Book Cover" width="150" class="mb-3">
                                @else
                                    <p class="text-muted">No Cover Image Available</p>
                                @endif
                            </div>

                            <!-- Upload New Cover -->
                            <div class="form-group mb-3">
                                <label for="cover" class="font-weight-bold">Upload New Cover</label>
                                <input type="file" name="cover" id="cover"
                                    class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="title" class="font-weight-bold">Book Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $books->title) }}" placeholder="Enter Book Title">
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="font-weight-bold">Book Description</label>
                                <textarea name="description" id="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter Book Description">{{ old('description', $books->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="publish_date" class="font-weight-bold">Publish Date</label>
                                <input type="date" name="publish_date" id="publish_date"
                                    class="form-control @error('publish_date') is-invalid @enderror"
                                    value="{{ old('publish_date', $books->publish_date) }}">
                                @error('publish_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="price" class="font-weight-bold">Price</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $books->price) }}" placeholder="Enter Book Price">
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="stock" class="font-weight-bold">Stock</label>
                                <input type="number" name="stock" id="stock"
                                    class="form-control @error('stock') is-invalid @enderror"
                                    value="{{ old('stock', $books->stock) }}" placeholder="Enter Book Stock">
                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary me-3">BACK</a>
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

</body>

</html>
