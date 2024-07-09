<!--Create Modal -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <form id="productForm" hx-post="/api/products"
                  hx-target="#products_list"
                  hx-swap="afterbegin"
                  hx-trigger="submit"
                  hx-on::after-request="this.reset()"
                  method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div id="name_error" class="text-danger"></div>
                    </div>
                    <div class="mb-1">
                        <label for="img" class="form-label">Image Link</label>
                        <textarea class="form-control" id="img" name="img"></textarea>
                        <div id="img_error" class="text-danger"></div>
                    </div>
                    <div class="mb-1">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                        <div id="description_error" class="text-danger"></div>
                    </div>
                    <div class="mb-1">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                        <div id="price_error" class="text-danger"></div>
                    </div>
                </div>
                <div id="addProductMessage"></div>
                    <div class="modal-footer">
                        <button type="button" id="closeModalButton" class="btn btn-danger" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>