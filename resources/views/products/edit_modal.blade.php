<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <div class="mb-3">
                        <label for="modal-product-name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" id="modal-product-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-product-price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="modal-product-price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="modal-product-description" class="form-label">Description:</label>
                        <textarea class="form-control" id="modal-product-description" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Edit Modal -->
