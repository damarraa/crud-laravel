<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h3 class="text-center my-4">All Books</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('books.create') }}" class="btn btn-md btn-success mb-3">Add Book</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Cover</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Publish Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col" style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('storage/' . $book->cover) }}" alt="Book Cover" style="height: auto; width: 250px"></td>
                                        <td class="text-center">{{ $book->title }}</td>
                                        <td class="text-center">{{ $book->description }}</td>
                                        <td class="text-center">{{ $book->publish_date }}</td>
                                        <td class="text-center">{{ $book->price }}</td>
                                        <td class="text-center">{{ $book->stock }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                <a href="{{ route('books.show', $book->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Books is Empty.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "SUCCESS!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "ERROR!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
