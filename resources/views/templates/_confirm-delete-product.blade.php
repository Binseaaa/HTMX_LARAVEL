<div class="modal fade" id="deleteProduct{{$prod->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProduct{{$prod->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProduct{{$prod->id}}Label">Create Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div>Delete Product</div>
            <div class="mt-2">
                <div>You are about to delete this product?
                    {{$prod->name}} - {{$prod->description}}
                </div>
                <div class="flex justify-between">
                    <button class="py-2 px-3 rounded bg-gray-200 border border-gray-400 text-gray-800" onclick="document.getElementById('deleteProduct{{$prod->id}}').classList.add('hidden')">
                        Cancel
                    </button>
                    <button class="py-2 px-3 rounded bg-red-200 border border-red-400 text-red-800" hx-delete="/api/products/{{$prod->id}}" hx-target="#product{{$prod->id}}" hx-swap="outerHTML swap:1.0s" data-bs-dismiss="modal">
                        Delete
                    </button>
                </div>
            </div>
            </div>
        </div>
    </div>
