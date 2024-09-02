{{-- call the main layout  --}}
@extends('layout')
{{-- for the titile of the page  --}}
@section('title') Product Listing @parent @endsection
{{-- additional style here intended for this blade  --}}
@section('styles')
@endsection
{{-- for the content of the page  --}}
@section('content')
<div class="page-wrapper">
    {{-- @include('site.layouts.component.clinic_sidebar') --}}
    <h1 class="text-center pt-2 pb-2">Product List</h1>
    <button class="btn btn-primary mb-3 float-end me-2" data-bs-toggle="modal" data-bs-target="#createModal">Create New Product</button>

    {{-- table using DataTbales  --}}
    <div class="ms-2 me-2">
        <table id="table">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Discription</td>
                    <td>Date_Added</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    @include('products.create_modal')
    @include('products.edit_modal')

</div>
@endsection

@section('scripts')
<script>
    let productTable = $('#table').DataTable();
    $(document).ready(function() {
        getProduct();

        $('#createProduct').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            createProduct($(this));
        });

        $(document).on('click', '[data-bs-toggle="modal"]', function() {
            // Get data attributes from the clicked button
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = $(this).data('price');
            const description = $(this).data('description');

            // Set modal form action URL and fields
            $('#editProductForm').data('id', id);
            $('#modal-product-name').val(name);
            $('#modal-product-price').val(price);
            $('#modal-product-description').val(description);
        });

        $('#editProductForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            updateProduct($(this));
        });

        $(document).on('click', '.deleteProduct', function() {
            deleteProduct($(this));
        });
    });

    function getProduct() {
        $.ajax({
            url: "{{ url('/product/list') }}",
            type: 'GET',
        }).then(function (response) {
            productTable.clear().draw();
            response.data.forEach(function (item) {
                let createdAt = new Date(item.created_at).toLocaleDateString('en-US');
                productTable.row.add([
                    item.name,
                    item.price,
                    item.description,
                    createdAt,
                    `
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-description="${item.description}" data-bs-target="#editModal">Edit</button>
                        <button class="btn btn-sm btn-danger deleteProduct" data-id="${item.id}">Delete</button>
                    `
                ]).draw(false);
            });
        });
    }

    function createProduct() {
        const data = {
            name: $('#product-name').val(),
            price: $('#product-price').val(),
            description: $('#product-description').val(),
            _token: '{{ csrf_token() }}'
        };
        $.ajax({
            url: '/product/add', // Create URL
            type: 'POST',
            data: data,
        }).then(function(response) {
            if (response.productName) {
                Swal.fire({
                    title: 'Create Successful',
                    text: `"${response.productName}" has been successfully added.`,
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
            }
            getProduct(); // Refresh the product list
            $('#createModal').modal('hide'); // Hide the modal
        });
    }

    function updateProduct(byVal) {
        const id = byVal.data('id'); // Retrieve the stored product ID
        const data = {
            name: $('#modal-product-name').val(),
            price: $('#modal-product-price').val(),
            description: $('#modal-product-description').val(),
            _token: '{{ csrf_token() }}'
        };
        console.log(id)
        $.ajax({
            url: `/products/update/${id}`, // Update URL based on the ID
            type: 'PUT',
            data: data,
        }).then(function(response) {
            if (response.productName) {
                Swal.fire({
                    title: 'Update Successful',
                    text: `Product "${response.productName}" has been successfully updated.`,
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
                getProduct(); // Refresh the product list
                $('#editModal').modal('hide'); // Hide the modal
            }
            if (response.error) {
                Swal.fire({
                    title: 'Error',
                    text: response.error,
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            }
        });
    }

    function deleteProduct(byVal) {
    const id = byVal.data('id'); // Retrieve the stored product ID
    const data = {
        _token: '{{ csrf_token() }}'
    };

    // First, show a confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to delete this product? This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        // If the user confirmed the deletion
        if (result.isConfirmed) {
            // Proceed with the AJAX request
            $.ajax({
                url: `/products/delete/${id}`, // Delete URL based on the ID
                type: 'DELETE',
                data: data,
            }).then(function(response) {
                if (response.productName) {
                    Swal.fire({
                        title: 'Remove Successful',
                        text: `"${response.productName}" has been successfully removed.`,
                        icon: 'success',
                        confirmButtonText: 'Close'
                    });
                    getProduct(); // Refresh the product list
                }
                if (response.error) {
                    Swal.fire({
                        title: 'Error',
                        text: response.error,
                        icon: 'error',
                        confirmButtonText: 'Close'
                    });
                }
            });
        }
    });
}

</script>
@endsection

