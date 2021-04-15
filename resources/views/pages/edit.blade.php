@extends('home')
@section('content')
<div class="container">
	<div id="content">
		<form action="" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}
					@endforeach
				</div>
				@endif
				@if(Session::has('thongbao'))
				<div class="alert alert-success">{{Session::get('thongbao')}}</div>
				@endif
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h4>Edit</h4>
					<div class="space20">&nbsp;</div>


					<div class="form-block">
						<label for="email">Email address*</label>
						<input type="email" id="email" name="email"
							value="{{ old('email',isset($user) ? $user['email'] : null )}}">
					</div>

					<div class="form-block">
						<label for="your_last_name">Fullname*</label>
						<input type="text" id="your_last_name" name="fullname"
							value="{{ old('fullname',isset($user) ? $user['full_name'] : null )}}" required>
					</div>

					<div class="form-block">
						<label for="adress">Address*</label>
						<input type="text" id="adress" name="address"
							value="{{ old('address',isset($user) ? $user['address'] : null )}}" required>
					</div>

					<div class="form-block">
						<label for="phone">Phone*</label>
						<input type="text" id="phone" name="phone"
							value="{{ old('phone',isset($user) ? $user['phone'] : null )}}" required>
					</div>
					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" value="">
					</div>
					<div class="form-block">
						<label for="re_password">Re password*</label>
						<input type="password" id="re_password" name="re_password" value="">
					</div>
					<fieldset>
						<div class="form-action">
							<button type="submit" class="btn btn-primary">Save</button>
							<button class="btn btn-danger" href="{{URL::route('trang-chu')}}">Hủy</button>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection