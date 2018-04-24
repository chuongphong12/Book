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
	<a href="{{URL::route('admin.cats.getAdd')}}">Add new category </a>
</li>
</ul>
@include('admin.blocks.alerts')
<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="icon-th-list"></i><span class="break"></span>Category</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th style="text-align: center;">No.</th>
				  <th>Category Name</th>
				  <th style="text-align: center;"> Edit / Delete </th>
			  </tr>
		  </thead>   
		  <tbody>
		  	<?php $stt = 0;?>
		  	@foreach($data as $item)
		  	<?php $stt = $stt + 1;?>
			<tr>
				<td class="center" style="text-align: center;">{{ $stt }}</td>
				<td >{{$item['name']}}</td>
				<td class="center" style="text-align: center;">
					<a class="btn btn-info" href="{{ URL::route('admin.cats.getEdit',$item['id']) }}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a onclick="return xacnhanxoa('Do you really want to delete ?')" class="btn btn-danger" href="{{ URL::route('admin.cats.getDelete',$item['id']) }}">
						<i class="halflings-icon white trash"></i> 
					</a>
				</td>
			</tr>	
			@endforeach
		  </tbody>
	  </table>            
	</div>
</div><!--/span-->

</div><!--/row-->
@endsection