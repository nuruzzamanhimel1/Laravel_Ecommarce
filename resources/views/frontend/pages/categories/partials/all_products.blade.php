
@foreach($products as $product)
							
							<div class="col-md-4">
								<div class="card text-center">
									@php $i = 0 @endphp
									@foreach($product->product_images as $image)
										@if($i <= 0)
										<a href="{{ route('products.shows',$product->slug) }}">
											<img src="{{ asset('images/products/'.$image->image) }}" class="card-img-top img-fluid image_size" alt="{{ $product->title }}" width="150">
										</a>
											

											@php $i++ @endphp
										@endif
										
									@endforeach
								  
								  <div class="card-body">
								    <h5 class="card-title">
										<a href="{{ route('products.shows',$product->slug) }}">{{ $product->title }}</a>
								    </h5>
								    <p class="card-text">Taka - {{ $product->price }}</p>
								    <a href="#" class="btn btn-primary">Add to card</a>
								  </div>
								</div>
							</div>

						@endforeach

						