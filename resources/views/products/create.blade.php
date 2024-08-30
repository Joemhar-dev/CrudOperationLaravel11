<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Create Product</title>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
</head>
<body>
    <section>
        <div class="container">
            <div class="mb-3 row">
            <h1>Create New Product</h1>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                   asadfdsfdsfdfddddsd
                </div>
              </div>
            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    <p>{{ session('success') }}</p>
                </div>
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
            <form class="form" action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="name">Product Name:</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="price">Price:</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" id="price" name="price" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="description">Description:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary mb-3">Save Product</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

