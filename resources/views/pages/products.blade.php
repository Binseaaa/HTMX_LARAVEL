@extends('templates.base')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div>
            <h1 class="text-3xl md:text-4xl">Product Page</h1>
        </div>
        <div class="flex flex-col md:flex-row flex-wrap gap-2 md:gap-3 mt-3 md:mt-0">
            <form hx-get="/api/products"
                  hx-trigger="submit"
                  hx-target="#products_list"
                  hx-on="htmx:afterRequest: if(event.detail.successful) this.reset();"
                  class="flex-1 md:flex-none">
                <input type="text" name="filter" class="p-2 border border-gray-300 rounded w-full md:w-auto" autocomplete="off" placeholder="Search Products">
            </form>
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reset()">
                Add
            </button>
        </div>
    </div>
    <div id="products_list" class="flex flex-wrap gap-2 mt-3 justify-start" hx-get="/api/products" hx-trigger="load delay:500ms" hx-swap="innerHTML">

    </div>

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
                  hx-swap="innerHTML"
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
    <script>
        function closeModal() {
            document.getElementById('addProductMessage').innerHTML = '';
            document.getElementById('name_error').innerHTML = '';
            document.getElementById('img_error').innerHTML = '';
            document.getElementById('price_error').innerHTML = '';
            document.getElementById('description_error').innerHTML = '';
        }

        function reset() {
           document.getElementById('productForm').reset();
            document.getElementById('name_error').innerHTML = '';
            document.getElementById('img_error').innerHTML = '';
            document.getElementById('price_error').innerHTML = '';
            document.getElementById('description_error').innerHTML = '';
            document.getElementById('addProductMessage').classList.toggle('hidden')
        }
    </script>
@endsection
