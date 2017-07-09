<meta name="csrf-token" content="{{ csrf_token() }}">
<a href="{{ route('admin.products.edit', $product->id) }}" class="btn bg-orange margin ">Edit</a>
<a href="{{ route('admin.products.destroy', $product->id) }}" data-method="POST" data-laravel-method="delete" class="btn bg-red confirm-delete">Delete</a>
@if($product->active == '1')
    <a href="{{ route('admin.products.disable', $product->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red confirm-disable">Disable</a>
@else
    <a href="{{ route('admin.products.activate', $product->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green confirm-activate">Activate</a>
@endif