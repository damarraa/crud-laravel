<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Authors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h3 class="text-center my-4">Add New Authors</h3>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('authors.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="font-weight-bold">Authors Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Type Authors Name">
                                {{-- Error message for Authors Name --}}
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="bio" class="font-weight-bold">Authors Bio</label>
                                <textarea name="bio" id="bio" rows="5" class="form-control @error('bio') is-invalid @enderror"
                                    placeholder="Type Authors Bio">{{ old('bio') }}</textarea>
                                {{-- Error message for Authors Bio --}}
                                @error('bio')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="birth_date" class="font-weight-bold">Authors Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date"
                                    class="form-control @error('birth_date') is-invalid @enderror"
                                    value="{{ old('birth_date') }}" placeholder="Authors Birth Date">
                                {{-- Error message for Authors Birth Date --}}
                                @error('birth_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <a href="{{ route('authors.index') }}" class="btn btn-md btn-secondary me-3">BACK</a>
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
        CKEDITOR.replace('bio');
    </script>

</body>

</html>
