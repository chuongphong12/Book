@extends('home')

@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Products</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Home</a> / <span>{{$ten_sp->name}}</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loai_sp as $loai)
						<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>{{$ten_sp->title}}</h4>
						<div class="beta-products-details">
							<p class="pull-left">Found {{count($sp_theoloai)}} products</p>
							<div class="clearfix"></div>
						</div>

						<div class="row" id="load">
							@foreach($sp_theoloai as $loai)
							<div class="col-sm-4" style="padding-bottom: 30px">
								<div class="single-item" style="height: 350px">
									@if($loai->promotion_price!=0)
									<div class="ribbon-wrapper">
										<div class="ribbon sale">Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="{{route('sanpham',$loai->id)}}"><img
												src="sources/image/product/{{$loai->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$loai->title}}</p>
									</div>
								</div>
								<div class="single-item-price" style="padding-bottom: 10px">
									@if($loai->promotion_price==0)
									<span class="flash-sale">{{number_format($loai->unit_price)}}đ</span>
									@else
									<span class="flash-del">{{number_format($loai->unit_price)}}đ</span>
									<span class="flash-sale">{{number_format($loai->promotion_price)}}đ</span>
									@endif
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="shopping_cart.html"><i
											class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary pull-right" href="{{route('sanpham',$loai->id)}}">Details
										<i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div>
			<div class="space50">&nbsp;</div>

			<!-- end section with sidebar and main content -->
			<div class="beta-products-list">
				<h4>Related</h4>
				<div class="beta-products-details">
					<p class="pull-left">Found {{count($sp_khac)}} products</p>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="owl-carousel owl-theme">
						@foreach($sp_khac as $spk)
						<div class="col-sm-12">
							<div class="single-item" style="height: 350px">
								<div class="single-item-header">
									<a href="{{route('sanpham',$spk->id)}}"><img
											src="sources/image/product/{{$spk->image}}" alt="" height="250px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$spk->title}}</p>
								</div>
							</div>
							<div class="single-item-price">
								@if($spk->promotion_price==0)
								<span class="flash-sale">{{number_format($spk->unit_price)}}đ</span>
								@else
								<span class="flash-del">{{number_format($spk->unit_price)}}đ</span>
								<span class="flash-sale">{{number_format($spk->promotion_price)}}đ</span>
								@endif
							</div>
							<div class="single-item-caption">
								<a class="add-to-cart pull-left" href="shopping_cart.html"><i
										class="fa fa-shopping-cart"></i></a>
								<a class="beta-btn primary pull-right" href="{{route('sanpham',$spk->id)}}">Details <i
										class="fa fa-chevron-right"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div> <!-- .beta-products-list -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection