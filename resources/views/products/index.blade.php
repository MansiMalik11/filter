<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark text-center text-white py-3">
        <h1 class="h3">Mansi Creating CRUD</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end mt-3 p-0">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-dangerk alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
            @endif
            <div class="card p-0 m-3">
                <div class="card-header bg-dark text-white">
                    <h3 class="h4">
                        Products
                    </h3>
                </div>
                <div class="card-bodyc shadow-lg p-4">
                    <table class="table table-striped">
                         <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th width="120" class="text-center">Action</th>
                         </tr>
                         </thead>
                         <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->size->name??null }}</td>
                                    <td>{{ $product->color->name??null }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-dark btn-sm">Edit</a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>