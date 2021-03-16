<div class="card shadow-sm">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img"
        aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>{{ $product->title }}</title>
        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
            dy=".3em">Thumbnail</text>
    </svg>

    <div class="card-body">
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->category->title }}</p>
        <p class="card-text">Price: {{ $product->price }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('product', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                <a href="{{ route('cart.add', $product) }}" class="btn btn-sm btn-outline-secondary" style="display:inline-block">
                    Add <i class='bx bxs-cart-add'></i>
                </a>
            </div>
        </div>
    </div>
</div>