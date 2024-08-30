<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
</head>
<body>
<section>
    <div class="container">
        <h1 style="width: 100%; text-align:center;">Product List</h1>
         <!-- Button to trigger the Create Product modal -->
         <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal" style="float: right">Create New Product</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if($products->isEmpty())
                <tr>
                    <td colspan="3">No products found.</td> <!-- colspan="3" spans across all table columns -->
                </tr>
            @else
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                             <!-- Edit Button to Open Modal -->
                             <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $product->id }}">Edit</button>

                             <!-- Delete Form -->
                             <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                             </form>

                             <!-- Edit Modal -->
                             <div class="modal fade" id="editModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $product->id }}" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="editModalLabel-{{ $product->id }}">Edit Product</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <form action="{{ route('products.update', $product->id) }}" method="POST">
                                                 @csrf
                                                 @method('PUT')
                                                 <div class="mb-3">
                                                     <label for="name-{{ $product->id }}" class="form-label">Product Name:</label>
                                                     <input type="text" class="form-control" id="name-{{ $product->id }}" name="name" value="{{ old('name', $product->name) }}" required>
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="price-{{ $product->id }}" class="form-label">Price:</label>
                                                     <input type="text" class="form-control" id="price-{{ $product->id }}" name="price" value="{{ old('price', $product->price) }}" required>
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="description-{{ $product->id }}" class="form-label">Description:</label>
                                                     <textarea class="form-control" id="description-{{ $product->id }}" name="description" required>{{ old('description', $product->description) }}</textarea>
                                                 </div>
                                                 <button type="submit" class="btn btn-primary">Update Product</button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- End of Edit Modal -->
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @if(session('success'))
                 <div class="alert alert-success d-flex align-items-center" role="alert">
                     <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                     {{ session('success') }}
                   </div>
                 @endif

                 @if ($errors->any())
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>

        @endif
    </div>
</section>
<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Create Modal -->
</body>
</html>

