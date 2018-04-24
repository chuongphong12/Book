@extends('home')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Book Detail Information</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a>  / <span><a href="{{route('loaisanpham',$cats->id)}}">{{$cats->name}}</a></span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-5">
							<img src="sources/image/product/{{$product->image}}" alt="" style="height: 350px">
						</div>
						<div class="col-sm-7">
							<div class="single-item-body">
								<p class="single-item-title"><h3>{{$product->title}}</h3></p>
								<div class="space40">&nbsp;</div>
								<p class="single-item-title"><strong>ISBN</strong>: {{$product->isbn}}</p>
								<p class="single-item-title"><strong>Author</strong>: {{$product->author}}</p>
								<div class="space40">&nbsp;</div>
								<p class="single-item-price">
									@if($product->promotion_price==0)
									<p>Market price: </p>
										<h6 class="flash-sale">{{number_format($product->unit_price)}}đ</h6>
									@else
									<p>Market price: </p>										<h6 class="flash-del">{{number_format($product->unit_price)}}đ</h6>
									<p>Promotion Price: </p>
										<h6 class="flash-sale">{{number_format($product->promotion_price)}}đ</h6>
									<p>You Save: </p>
										<h6 class="flash-save">
											<?php
											echo round(100-(($product->promotion_price/$product->unit_price))*100,0);
											echo "%";
											?>
											(<?php 
												echo number_format($product->unit_price-$product->promotion_price);
												echo "đ";
											?>)
										</h6>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space30">&nbsp;</div>

							<div class="single-item-options">	
								<a class="add-to-cart" href="{{route('addcart',$product->id)}}"><i class="fa fa-shopping-cart"> Add to cart</i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space30">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><h6>Description</h6></a></li>
						</ul>

						<div class="panel" id="tab-description">
							<?php  
								echo html_entity_decode($product->description);
							?>
						</div>
							
					</div>
					<div class="space50">&nbsp;</div>
					<div class="woocommerce-tabs">
					<ul class="tabs">
							<li><a href="#tab-description"><h6>Detail</h6></a></li>
						</ul>
						
						<table id="chi-tiet" cellspacing="0" class="table table-bordered table-detail table-striped">
							<tbody>
						<tr>
							<td style="width: 25%"><strong>Author</strong></td>
							<td class="last">{{$product->author}}</td>
						</tr>
						<tr>
							<td><strong>Publisher</strong></td>
							<td class="last">{{$product->publisher}}</td>
						</tr>
						<tr>
							<td><strong>Company Release</strong></td>
							<td class="last">{{$product->company_release}}</td>
						</tr>
						<tr>
							<td><strong>Page</strong></td>
							<td class="last">{{$product->page}}</td>
						</tr>
						<tr>
							<td><strong>Release Date</strong></td>
							<td class="last">{{$product->release_date}}</td>
						</tr>
							</tbody>
						</table>	
					</div>
					<div class="space50">&nbsp;</div>
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="owl-carousel2 owl-theme">
								@foreach($top_product as $top)
									<div class="media beta-sales-item">
										<div style="height: 300px">
											<a class="pull-left" href="{{route('sanpham',$top->id)}}"><img src="sources/image/product/{{$top->image}}" alt=""></a>
											<div class="single-item-body">
												<p class="single-item-title">{{$top->title}}</p>
											</div>
										</div>
										<div class="single-item-price">
										@if($top->promotion_price==0)
										<span class="flash-sale">{{number_format($top->unit_price)}}đ</span>
									@else
										<span class="flash-del">{{number_format($top->unit_price)}}đ</span>
										<span class="flash-sale">{{number_format($top->promotion_price)}}đ</span>
									@endif
										</div>
									</div>
								@endforeach
							</div>
							</div><!-- best sellers widget -->
						</div><!-- widget-body -->
					</div> <!-- widget -->
					<div class="space50">&nbsp;</div>
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="owl-carousel2 owl-theme">
								@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<div style="height: 300px">
										<a class="pull-left" href="{{route('sanpham',$new->id)}}"><img src="sources/image/product/{{$new->image}}" alt=""></a>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->title}}</p>
										</div>
									</div>
										<div class="single-item-price">
									@if($new->promotion_price==0)
										<span class="flash-sale">{{number_format($new->unit_price)}}đ</span>
									@else
										<span class="flash-del">{{number_format($new->unit_price)}}đ</span>
										<span class="flash-sale">{{number_format($new->promotion_price)}}đ</span>
									@endif
									</div>
								</div>
								@endforeach
							</div>
							</div><!-- best sellers widget -->
						</div><!-- widget-body -->
					</div><!-- widget -->
				</div>
			</div><!-- row -->
		<div class="beta-products-list">
						<h4>Related Products</h4>
					<div class="space30">&nbsp;</div>
						<div class="row">
							<div class="owl-carousel1 owl-theme">
							@foreach($related as $re)
							<div class="col-sm-12">
								<div class="single-item" style="height: 350px">
									<div class="single-item-header">
										<a href="{{route('sanpham',$re->id)}}"><img src="sources/image/product/{{$re->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$re->title}}</p>
									</div>
								</div>
								<div class="single-item-price">
											@if($re->promotion_price==0)
									<span class="flash-sale">{{number_format($re->unit_price)}}đ</span>
									@else
									<span class="flash-del">{{number_format($re->unit_price)}}đ</span>
									<span class="flash-sale">{{number_format($re->promotion_price)}}đ</span>
									@endif
								</div>
									<div class="single-item-caption">
										<a class="beta-btn primary" href="{{route('sanpham',$re->id)}}">Details <i class="fa fa-chevron-right pull-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							@endforeach
						</div>
						</div>
					</div> <!-- .beta-products-list -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection