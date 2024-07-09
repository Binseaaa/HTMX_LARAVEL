@extends('templates.base')
@section('content')
@include('templates._create-product')
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div>
            <h1 class="text-3xl md:text-4xl">Product Page</h1>
        </div>
        <div class="flex flex-col md:flex-row flex-wrap gap-2 md:gap-3 mt-3 md:mt-0">
            <form hx-post="/api/products"
                  hx-trigger="submit"
                  hx-swap="innerHTML"
                  hx-target="#products_list"
                  hx-on="htmx:afterRequest: if(event.detail.successful) this.reset()"
                  method="POST"
                  class="flex-1 md:flex-none">
                <input type="text" name="filter" class="p-2 border border-gray-300 rounded w-full md:w-auto" autocomplete="off" placeholder="Search Products">
            </form>
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="reset()">
                Add
            </button>
        </div>
    </div>
    <div id="products_list" class="flex flex-wrap gap-2 mt-3 justify-start" hx-get="/api/products" hx-trigger="load" hx-swap="afterbegin">
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
