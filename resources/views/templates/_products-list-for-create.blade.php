@foreach ($products->get() as $prod)
<div class='p-4 rounded bg-blue-200 min-w-[15rem]'>
    <h3 class='text-2xl mb-3'>{{$prod->name}}</h3>

    <img src={{$prod->img}} class='h-[10em] w-[100%] rounded'>
    <div class='italic text-gray-500'>
        {{$prod->description}}
    </div>
    <div class='text-4xl text-right text-green-500'>${{$prod->price}}</div>
</div>
@endforeach

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-200 text-green-800 p-2 rounded" >
        The product has been added successfully!
    </div>
</div>
