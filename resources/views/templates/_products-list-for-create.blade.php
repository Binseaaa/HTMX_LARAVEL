@foreach ($products->get() as $prod)
    @include('templates._single-product', ['products' => $prod])
@endforeach

<div id="name_error" hx-swap-oob="true"></div>
<div id="img_error" hx-swap-oob="true"></div>
<div id="description_error" hx-swap-oob="true"></div>
<div id="price_error" hx-swap-oob="true"></div>

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-200 text-green-800 p-2 rounded">
        The product has been added successfully!
    </div>
</div>

{{-- <!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true" hx-trigger="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" hx-swap="innerHTML" hx-target="#confirmDeleteModal .modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button id="confirmDeleteButton" type="button" class="btn btn-danger" hx-delete="/api/products/{prod_id}/delete" hx-swap="none" hx-target="this" hx-trigger="click" hx-on="htmx:afterRequest: window.location.reload()">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div> --}}
