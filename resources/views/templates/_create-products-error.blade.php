@include('templates._products-list-for-create', ['products'=>$products]);

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-red-200 text-red-800 p-4 rounded">
        <div>Please fix the following:</div>
        <ul class="ms-2">
            @foreach ($errors as $err)
                <li class="list-disc">{{$err}}</li>
            @endforeach
        </ul>
    </div>
</div>
