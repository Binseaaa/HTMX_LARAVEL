@foreach ($products->get() as $prod)

<div class='p-4 rounded bg-blue-200 w-[20vw]'>
    <div class='flex justify-end'>
        <button data-bs-toggle="modal"
                data-bs-target="#confirmDeleteModal"
                hx-delete="/api/products/{{$prod->id}}/delete">
            <svg class='h-5 w-5 text-red-500 hover:text-red-900'  width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>  <path stroke='none' d='M0 0h24v24H0z'/>  <line x1='4' y1='7' x2='20' y2='7' />  <line x1='10' y1='11' x2='10' y2='17' />  <line x1='14' y1='11' x2='14' y2='17' />  <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' />  <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' /></svg>
        </button>
        <button hx-get='/products/{{$prod->id}}'
            hx-target="body"
            hx-swap="innerHTML">
            <svg class='h-5 w-5 text-gray-900 hover:text-gray-500'  viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>  <path stroke='none' d='M0 0h24v24H0z'/>  <path d='M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' />  <path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' />  <line x1='16' y1='5' x2='19' y2='8' /></svg>
        </button>
    </div>
    <h3 class='text-2xl mb-3'>{{$prod->name}}</h3>
    <img src='{{$prod->img}}' class='h-[10em] w-[100%] rounded'>
    <div class='italic text-gray-500'>
        {{$prod->description}}
    </div>
    <div class='text-4xl text-right text-green-500'>${{$prod->price}}</div>
</div>
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

<!-- Modal -->
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
</div>
