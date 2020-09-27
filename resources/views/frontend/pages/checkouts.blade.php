@extends('frontend.layouts.master')

@section('title')
	Checkouts ! Laravel Ecommarce Project
@endsection

@section('content')

	<div class="container">
		<div class="row mt-3 main_content" style="">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h1>Confirm Items</h1>
						<div class="row">
							<div class="col-md-7">
								@foreach(App\models\Card::totalCarts() as $card)
									<strong>
										<p>
											{{ $card->product->title }} - {{ $card->product->price }} Taka - {{ $card->product_quantity }} items
										</p>
									</strong>

								@endforeach
								<a href="{{ route('carts') }}" class="btn btn-outline-info">Change Card Item</a>
							</div>
							<div class="col-md-5">
								@php $total_price = 0 @endphp
								@foreach(App\models\Card::totalCarts() as $card)
									@php 
										$total_price += $card->product->price * $card->product_quantity;
									@endphp
								@endforeach
								<p> Total Price - <strong>{{ $total_price }} Taka</strong></p>
								<p>
									Total Price of Shipping Cast - <strong> {{ $total_price + App\models\Setting::first()->shipping_cast }} </strong>
								</p>
							</div>
						</div>

						
					</div>
				</div>
				<!-- card end -------->
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="card">
							@include('frontend.partials.noti_message')
							<div class="card-body">
								<h2>Shipping Address</h2>
								
								<div class="card card-body">
			 <form method="POST" action="{{ route('checkouts.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reveived Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->firstname.' '.Auth::user()->lastname : '' }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

               
                   

                        <div class="form-group row">
                            <label for="phone_no " class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no " type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}"  autocomplete="phone_no " autofocus>

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

               


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}"  autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                               
                                <textarea name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" id=""  rows="4">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (Optional) ') }}</label>

                            <div class="col-md-6">
                               
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" id=""  rows="4"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_method_id" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
          

                                 <select class="form-control  @error('payment_method_id') is-invalid @enderror" name="payment_method_id" id="payment_method">
                                 	<option value="">Please Select any payment method</option>
                                 	@foreach($payments as $payment)
                                 		<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                 	@endforeach		     
							    </select>

							    <style>
							    	.hidden{
							    		display: none;
							    	}
							    </style>

		 @foreach($payments as $payment)
        	@if($payment->short_name == 'cash_id')
        		<div class="row hidden payment_class alert alert-success text-center" id="payment_{{ $payment->short_name }}">
	        		<div class="col-md-12">
	        			<div class="card alert alert-success">
	        				<div class="card-body">
	        					<h1>For Cash In there is nothing necessary. Just click and finish order</h1>
	        					<p>You will get your product is two and three buinsess days</p>
	        				</div>
	        			</div>
	        		</div>
	        	</div>

	        @elseif($payment->short_name == 'bikash' OR $payment->short_name == 'dbbl')
	        	<div class="row hidden payment_class alert alert-success text-center" id="payment_{{ $payment->short_name }}">
	        		<div class="col-md-12">
	        			<div class="card alert alert-success">
	        				<div class="card-body">
	        					<h1>{{ ucfirst($payment->short_name) }} Payment</h1>
	        					<p>
	        						<strong>{{ ucfirst($payment->short_name) }} No : {{ $payment->no }} </strong>
	        					</p>
	        					<p>
	        						<strong>Account Type: {{ $payment->type }}</strong>
	        					</p>
	        					<div class="">
	        						Please send the above money to this {{   ucfirst($payment->short_name) }} No and write your transiction code below there
	        					</div>

	        					<div id="transection_div_{{ $payment->short_name }}">
	        						<input type="text" class="form-control mt-3 trensecion_input_clss" id="{{ $payment->short_name }}_id" name="transiction_id">
	        					</div>
	        					
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        	@endif
        	

        @endforeach


                                @error('payment_method_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Order Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>


@endsection

@section('scripts')
	<script>
		$(document).on('change','#payment_method',function(e){
			e.preventDefault();

			var payment_method = $(this).val();

			if(payment_method == 'cash_id' || payment_method == 'bikash' || payment_method == 'dbbl')
			{
				$('.payment_class').each(function(){
					$(this).addClass('hidden');
				});

				// *** When section change then transection input remove for all payment method except selecte payment method
				$('.trensecion_input_clss').each(function(){
					$(this).remove();
				});
				$('#transection_div_'+payment_method).append('<input type="text" class="form-control mt-3 trensecion_input_clss"  name="transiction_id">');
				// **********************

				$('#payment_'+payment_method).removeClass('hidden');


			}
			else{
				$('.payment_class').each(function(){
					$(this).addClass('hidden');
				});
			}
			

			// alert(payment_method);
		});
	</script>
@endsection