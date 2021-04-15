@extends('master')
@section('content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{ url ('/')}}">Homepage</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-plus-sign"></i>
		<a href="{{URL::route('admin.products.getAdd')}}">Add new book </a>
	</li>
</ul>
@include('admin.blocks.alerts')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-th-list"></i><span class="break"></span>Book List</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th style="text-align: center;">No.</th>
						<th style="width: 25%">Book Name</th>
						<th>Book category</th>
						<th>Price</th>
						<th>Promotion Price</th>
						<th>Unit</th>
						<th>Time</th>
						<th>View</th>
						<th style="text-align: center;">Detail / Edit / Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0;?>
					@foreach($data as $item)
					<?php $stt = $stt + 1;?>
					<tr>
						<td class="center" style="text-align: center;">{{ $stt }}</td>
						<td>{{$item['title']}}</td>
						<td>
							<?php $cat = DB::table('type_books')->where('id',$item['id_type'])->first(); ?>
							@if(!empty ($cat->name))
							{{ $cat->name }}
							@endif
						</td>
						<td>{{number_format($item['unit_price'],0,',','.')}} VNĐ</td>
						<td>{{number_format($item['promotion_price'],0,',','.')}} VNĐ</td>
						<td>{{$item['unit']}}</td>
						<td>
							<?php
						echo \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()
					?>
						</td>
						<td>{{$item['view']}}</td>
						<td class="center" style="text-align: center;">
							<a class="btn btn-success" href="{{URL::route('admin.products.getDetail',$item['id'])}}">
								<i class="halflings-icon white zoom-in"></i>
							</a>
							<a class="btn btn-info" href="{{URL::route('admin.products.getEdit',$item['id'])}}">
								<i class="halflings-icon white edit"></i>
							</a>
							<a onclick="return xacnhanxoa('Do you really want to delete ?')" class="btn btn-danger"
								href="{{URL::route('admin.products.getDelete',$item['id'])}}">
								<i class="halflings-icon white trash"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->
@endsection