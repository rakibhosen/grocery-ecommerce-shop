<fieldset>
    <input type="hidden" value="{{ $product->id }}" name="product_id">
    <button type="submit" value="Add to cart" class="btn btn-primary" onclick="addToCart({{ $product->id }})">Add to cart</button>

</fieldset>