<div class="card shadow-sm">
    <div class="card-body">
    <div style="max-width:100%;">
    <img src="
    @isset($product->photo) 
    {{ Storage::url($product->photo) }} 
    @else
    {{ asset('no-photo.png') }}
    @endisset
    " alt="{{ $product->title }}" style="max-width:100%; padding: 0 40px">

    </div>

        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->category->title }}</p>
        <p class="card-text">Price: {{ $product->price }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('product', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                <a href="{{ route('cart.add', $product) }}" class="btn btn-sm btn-outline-secondary"
                    style="display:inline-block">
                    Add <i class='bx bxs-cart-add'></i>
                </a>
            </div>
        </div>
    </div>
</div>