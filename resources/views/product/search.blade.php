@if (count($product) > 0)
    <ul>
        @foreach ($product as $pro)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
@else
    <p>No products found.</p>
@endif
