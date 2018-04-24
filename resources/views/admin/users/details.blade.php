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
  <a href="{{ route('admin.users.getList')}}">Account List </a>
  <i class="icon-angle-right"></i>
</li>
<li>
	<i class="icon-plus-sign"></i>
	<a href="{{URL::route('admin.users.getAdd')}}">Add new user </a>
</li>
</ul>
<div class="row-fluid sortable">	
<div class="box span12">
	<div class="box-header">
		<h2 id="txtName"><i class="fa fa-info-circle" aria-hidden="true"></i><span class="break"></span>User Detail Information : {{ old('txtName',isset($data) ? $data['full_name'] : null)}}</h2>
		<div class="box-icon">
			<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
		</div>
	</div>
	<div class="box-content">
		<fieldset>
			<table class="table table-bordered table-striped table-condensed">
				  <thead>
					  <tr>
						  <th>Email</th>
						  <th style="text-align: center;">Level</th>
						  <th style="text-align: center;">Status</th>                                              
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td class="center" id="txtEmail">
							{{ old('txtEmail',isset($data) ? $data['email'] : null)}}
						</td>
						<td class="center" id="rdoLevel" style="text-align: center;">
							@if( ($data['level'] == 1) && ($data['id'] ==1) )
								<span class="label label-warning">SuperAdmin</span>
							@elseif($data['level'] == 1)
								<span class="label label-info">Admin</span>
							@else
								Member
							@endif
						</td>
						<td class="center" id="rdoStatus" style="text-align: center;">
							@if($data['status'] == 1)
								<span class="label label-success">Active</span>
							@else 
								<span class="label label-danger" style="background: red;">Locked</span>
							@endif
						</td>          
				  </tbody>
			 </table>  
		 	<form action="" class="form-group" >
            <fieldset>
	            <legend  style="width: 25%;font-size: 16px;text-align: center;">Detail Information </legend>
	            <div class="control-group" >
                  <div class="controls"  >
                     <table class="table table-bordered table-striped table-condensed">
					  <thead>
						  <tr>
							  <th>Full name</th>
							  <th style="text-align: center;">Phone</th>
							  <th>Address</th>                                         
						  </tr>
					  </thead>   
					  <tbody>
						<tr>
							<td id="txtName">
								{{ old('txtName',isset($data) ? $data['full_name'] : null)}}
							</td>
							<td class="center" id="txtPhone" style="text-align: center;">
								{{ old('txtPhone',isset($data) ? $data['phone'] : null)}}
							</td>
							<td class="center" id="txtAddress" >
								{{ old('txtAddress',isset($data) ? $data['address'] : null)}}
							</td>             
						</tr>
					  </tbody>
				 </table>  
                  </div>
	            </div>
            </fieldset>
          </form>
		</fieldset>

	</div>
</div><!--/span-->
</div><!--/row-->
@endsection