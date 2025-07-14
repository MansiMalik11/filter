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
            <div class="card p-0 mt-3">
                <div class="card-header bg-dark text-white">
                    <h3 class="h4">
                        Products
                    </h3>
                </div>
                <div class="card-bodyc shadow-lg">
                    <table class="table table-striped">
                         <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th width="120">Status</th>
                            <th width="120" class="text-center">Action</th>
                         </tr>
                         </thead>
                         <tbody>
                            <tr>
                            <td>1</td>
                            <td>Mansi</td>
                            <td>Image</td>
                            <td>SKU-22</td>
                            <td>$100</td>
                            <td>Active</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-dark btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                         </tr>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>