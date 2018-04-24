@extends('home')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Order</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Homepage</a> / <span>Order</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(Session::has('thongbao'))
						<div class="alert alert-success">{{Session::get('thongbao')}}</div>
				@endif
			<div class="row">
				<div class="col-sm-6">
					<h4>Order</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Fullname*</label>
						<input type="text" name="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label>Gender </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Male</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Female</span>
									
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Address*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Phone*</label>
						<input type="text" id="phone" name="phone" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Note</label>
						<textarea id="notes" name="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Your Order</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="sources/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['title']}}</p>
											<span class="color-gray your-order-info">Price: {{number_format($cart['price'])}} đồng</span>
											<span class="color-gray your-order-info">Quantity: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Total:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Payment Method</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Cash on delivery </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Store will send books to your address, please check your books and then pay the delivery staff.
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Tranfer </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Tranfer to this bank account:
										<br>- Account number: 123 456 789
										<br>- Owner: Nguyễn A
										<br>- Citi Bank,HCM
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Check Out <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection