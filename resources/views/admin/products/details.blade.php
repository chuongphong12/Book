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
		<a href="{{ route('admin.products.getList')}}">Book List </a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-plus-sign"></i>
		<a href="{{URL::route('admin.products.getAdd')}}">Add new book </a>
	</li>
</ul>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header">
			<h2 id="txtName"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="break"></span>Book Detail
				Information : {{ old('txtTitle',isset($data) ? $data['title'] : null)}}</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<fieldset>
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>ISBN</th>
							<th>Book Name</th>
							<th>Price</th>
							<th>Promotion Price</th>
							<th>Unit</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="txtIsbn">{{ old('txtIsbn',isset($data) ? $data['isbn'] : null)}}</td>
							<td id="txtTitle">{{ old('txtTitle',isset($data) ? $data['title'] : null)}}</td>
							<!-- <td class="center" id="txtDescription">{{ old('txtDescription',isset($data) ? $data['description'] : null)}}</td> -->
							<td class="center" id="txtUnit_price">
								{{ number_format(old('txtUnit_price',isset($data) ? $data['unit_price'] : null),0,',','.')}}
							</td>
							<td class="center" id="txtPromotion_price">
								{{ number_format(old('txtPromotion_price',isset($data) ? $data['promotion_price'] : null),0,',','.')}}
							</td>
							<td id="txtUnit">{{ old('txtUnit',isset($data) ? $data['unit'] : null)}}</td>
					</tbody>
				</table>
				<div class="space50">&nbsp;</div>
				<div class="space50">&nbsp;</div>
				<table id="chi-tiet" cellspacing="0" class="table table-bordered table-detail table-striped">
					<tbody>
						<tr>
							<th style="width: 25%">Author</th>
							<td class="last">{{ old('txtAuthor',isset($data) ? $data['author'] : null)}}</td>
						</tr>
						<tr>
							<th>Publisher</th>
							<td class="last">{{ old('txtPublisher',isset($data) ? $data['publisher'] : null)}}</td>
						</tr>
						<tr>
							<th>Company Release</th>
							<td class="last">{{ old('txtCompany',isset($data) ? $data['company_release'] : null)}}</td>
						</tr>
						<tr>
							<th>Page</th>
							<td class="last">{{ old('txtPage',isset($data) ? $data['page'] : null)}}</td>
						</tr>
						<tr>
							<th>Release Date</th>
							<td class="last">{{ old('txtRelease',isset($data) ? $data['release_date'] : null)}}</td>
						</tr>
					</tbody>
				</table>
				<div class="space50">&nbsp;</div>
				<form action="" class="form-group">
					<fieldset>
						<legend style="font-size: 18px;"></legend>
						<legend style="width: 35%;font-size: 14px;text-align: center;">Book Image</legend>
						<div class="controls" style="width: 26%;margin-top: 5px;">
							<img src="{{ asset('sources/image/product/'.$data['image'])}}">
						</div>
					</fieldset>
				</form>
				<div class="space50">&nbsp;</div>
				<table id="chi-tiet" cellspacing="0" class="table table-bordered table-detail table-striped">
					<tbody>
						<tr>
							<th style="width: 10%">Description</th>
							<td class="center" id="txtDescription" style="width: 60%">
								@if (isset($data))
								<?php echo $data['description']; ?>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>

		</div>
	</div>
	<!--/span-->
</div>
<!--/row-->
@endsection