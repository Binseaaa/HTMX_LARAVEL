@extends('templates.base')

@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl">Product Page</h1>
        </div>
        <div>
            <form hx-get="/api/products"
                    hx-trigger="submit"
                    hx-target="#products_list">
                <input type="text" name="filter" class="p-2 border border-gray-300 rounded" autocomplete="off" placeholder="Search Products">
            </form>
        </div>
    </div>
    <div id="products_list" class="flex flex-wrap gap-3 justify-between mt-3" hx-get="/api/products" hx-trigger="load delay:500ms" hx-swap="innerHTML">

    </div>
@endsection
