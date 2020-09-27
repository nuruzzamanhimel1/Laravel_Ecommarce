<form action="{{ route('cart.store') }}" class="form-inline text-center d-block" method="POST">
	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<button type="submit" class="btn btn-primary">Add to Card</button>
</form>