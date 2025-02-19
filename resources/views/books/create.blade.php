<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h3 class="text-center my-4">Add New Books</h3>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="cover" class="font-weight-bold">Cover</label>
                                <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror">
                                {{-- Error message for Cover Image --}}
                                @error('cover')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="title" class="font-weight-bold">Books Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    placeholder="Type Books Title">
                                {{-- Error message for Books Title --}}
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="font-weight-bold">Books Bio</label>
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Type Books Bio">{{ old('description') }}</textarea>
                                {{-- Error message for Books Bio --}}
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
                                    value="{{ old('publish_date') }}" placeholder="Publish Date">
                                {{-- Error message for Publish Date --}}
                                @error('publish_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="price" class="font-weight-bold">Price</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    placeholder="Type Books Price">
                                {{-- Error message for Books Price --}}
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="stock" class="font-weight-bold">Stock</label>
                                <input type="number" name="stock" id="stock"
                                    class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}"
                                    placeholder="Type Books Stock">
                                {{-- Error message for Books Stock --}}
                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary me-3">BACK</a>
                            <button type="submit" class="btn btn-md btn-primary">SAVE</button>
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
