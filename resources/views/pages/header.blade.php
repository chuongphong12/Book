<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('contact')}}"><i class="fa fa-home"></i> 142 Phạm Phú Thứ, Phường 3, Quận 6</a></li>
						<li><a href="{{route('contact')}}"><i class="fa fa-phone"></i> 0122 2714 016</a></li>
					</ul>
				</div>

				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							@if(Auth::user()->level == 1)
							<li><a href="{{route('admin.users.getList')}}"><i class="fa fa-user"></i>Welcome {{Auth::user()->full_name}}</a></li>
							@else
							<li><a href="{{route('edit',Auth::user()->id)}}"><i class="fa fa-user"></i>Welcome {{Auth::user()->full_name}}</a></li>
							@endif
							<li><a href="{{route('logout')}}">Log out</a></li>
						@else
							<li><a type="button" data-toggle="modal" data-target="#signup">Register</a></li>
							<li><a type="button" data-toggle="modal" data-target="#login">Login</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
			<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form action="{{route('login')}}" method="post" class="beta-form-checkout">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-block">
				<label for="email">Email address*</label>
				<input type="email" id="email" name="email" required>
			</div>
			<div class="form-block">
				<label for="password">Password*</label>
				<input type="password" id="password" name="password" required>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- Modal Signup -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form action="{{route('signup')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signup">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" name="fullname" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name="address" required>
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="password" name="re_password" required>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
</form>
  </div>
</div>
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="sources/assets/dest/images/logo-book.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space30">&nbsp;</div>
					<!-- <div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div> -->

					<div class="beta-comp">

						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (@if(Session::has('cart'))
								{{Session('cart')->totalQty}}
								@else Empty @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('deletecart',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="sources/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['title']}}</span>
											<span class="cart-item-amount">{{$product['qty']}} * <span>
											@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} đ @else {{number_format($product['item']['promotion_price'])}} đ @endif</span></span>
										</div>
									</div>
								</div>
								@endforeach

								<div class="cart-caption">
									<div class="cart-total text-right">Total: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										@if(Auth::check())
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Order <i class="fa fa-chevron-right"></i></a>
										@else
										<a data-toggle="modal" data-target="#login" class="beta-btn primary text-center">Order <i class="fa fa-chevron-right"></i></a>
										@endif
									</div>
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Homepage</a></li>
						<li><a>Product</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('about')}}">About</a></li>
						<li><a href="{{route('contact')}}">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>
