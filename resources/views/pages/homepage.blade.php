@extends('home')
@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach ($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="sources/image/slide/{{$sl->image}}" data-src="sources/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('sources/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
						        @endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Found {{count($new_product)}} books</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<div class="owl-carousel owl-theme">
								@foreach($new_product as $new)
								<div class="col-sm-12">
									<div class="single-item" style="height: 350px">
										<div class="single-item-header">
											<a href="{{route('sanpham',$new->id)}}"><img src="sources/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->title}}</p>
										</div>
									</div>
									<div class="single-item-price">
												@if($new->promotion_price==0)
													<span class="flash-sale">{{number_format($new->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($new->unit_price)}} VND</span>
													<span class="flash-sale">{{number_format($new->promotion_price)}} VND</span>
												@endif
									</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary pull-right" href="{{route('sanpham',$new->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
								</div>
								@endforeach
								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top View</h4>
							<div class="beta-products-details">
								<p class="pull-left">Found {{count($view)}} books</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="owl-carousel owl-theme">
								@foreach($view as $top)
								<div class="col-sm-12">
									<div class="single-item" style="height: 350px">
										<div class="single-item-header">
											<a href="{{route('sanpham',$top->id)}}">
												<img src="sources/image/product/{{$top->image}}" alt="" height="250px">
											</a>
										</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$top->title}}</p>
											</div>
										</div>
										<div class="single-item-price">
											@if($top->promotion_price==0)
												<span class="flash-sale">{{number_format($top->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($top->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($top->promotion_price)}} VND</span>
											@endif
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$top->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary pull-right" href="{{route('sanpham',$top->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
								</div>
								@endforeach
								</div>
							</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Best Seller</h4>
							<div class="beta-products-details">
								<p class="pull-left">Found {{count($top_product)}} books</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="owl-carousel owl-theme">
								@foreach($top_product as $top)
								<div class="col-sm-12">
									<div class="single-item" style="height: 350px">
										<div class="single-item-header">
											<a href="{{route('sanpham',$top->id)}}">
												<img src="sources/image/product/{{$top->image}}" alt="" height="250px">
											</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$top->title}}</p>
										</div>
										</div>
											<div class="single-item-price">
												@if($top->promotion_price==0)
													<span class="flash-sale">{{number_format($top->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($top->promotion_price)}} VND</span>
													<span class="flash-sale">{{number_format($top->unit_price)}} VND</span>
												@endif
											</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$top->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary pull-right" href="{{route('sanpham',$top->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection
