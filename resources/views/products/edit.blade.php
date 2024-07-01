<div class="mt-5">
    <div class="row justify-content-center m-auto align-items-center">
        <div class="w-[30vw] col-10 col-md-8 col-lg-6">
            <h3>Update</h3>
            <form class="mt-6" hx-put="/api/products/{{$product->id}}"
                hx-trigger="submit"
                hx-target="#products_list"
                hx-swap="innerHTML"
                method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="img">img</label>
                    <textarea class="form-control" id="img" name="img" rows="3">{{ $product->img }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                <button type="submit" class="btn btn-success mt-3">Update products</button>
                <a href="/products" class="btn btn-primary text-white mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
