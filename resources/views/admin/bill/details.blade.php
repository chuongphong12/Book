@extends('master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ url ('/')}}">Homepage</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="fa fa-th" aria-hidden="true"></i>
		<a href="{{ route('admin.products.getList')}}">Order List </a>
		<i class="icon-angle-right"></i>
	</li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header">
			<h2 id="txtName"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="break"></span>Order Detail
				Information</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<fieldset>
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>Customer name</th>
							<th>Order Date</th>
							<th>Total</th>
							<th>Payment</th>
							<th>Note</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<?php $cus = DB::table('customer')->where('id',$data['id_customer'])->first(); ?>
								@if(!empty ($cus->name))
								{{ $cus->name }}
								@endif
							</td>
							<td>{{$data['date_order']}}</td>
							<td>{{number_format($data['total'],0,',','.')}} VNĐ</td>
							<td>{{$data['payment']}}</td>
							<td>{{$data['note']}}</td>
							<td class="center">
								@if($data['status'] ==0)
								<span class="label label-warning">On going...</span>
								@elseif($data['status'] ==1)
								<span class="label label-success">Ready</span>
								@else
								<span class="label label-danger" style="background: red;">Canceled</span>
								@endif
							</td>
					</tbody>
				</table>
				<form action="" class="form-group">
					<fieldset>
						<legend style="font-size: 18px;"></legend>
						<legend style="width: 100%;font-size: 20px;text-align: center;">Order Detail</legend>
						<div class="control-group">

							<fieldset>
								<table class="table table-bordered table-striped table-condensed">
									<thead>
										<tr>
											<th>ISBN</th>
											<th>Book Name</th>
											<th>Quantity</th>
											<th>Price</th>
										</tr>
									</thead>
									@foreach($detail as $item)
									<tbody>
										<td>
											<?php $isbn = DB::table('books')->where('id',$item['id_book'])->first(); ?>
											@if(!empty ($isbn->isbn))
											{{ $isbn->isbn }}
											@endif
										</td>
										<td>
											<?php $pro = DB::table('books')->where('id',$item['id_book'])->first(); ?>
											@if(!empty ($pro->title))
											{{ $pro->title }}
											@endif
										</td>
										<td>{{$item['quantity']}}</td>
										<td>{{number_format($item['unit_price'],0,',','.')}} VNĐ</td>
									</tbody>
									@endforeach
								</table>
							</fieldset>
						</div>
					</fieldset>
				</form>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->
@endsection