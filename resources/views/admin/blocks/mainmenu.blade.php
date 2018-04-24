<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a href="{{ route('admin.pages.survey')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>		
			<li><a href="{{route('admin.users.getList')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="hidden-tablet"> Member Management</span></a></li>
			<li>
				<a class="dropmenu" href="#"><i class="fa fa-refresh fa-5x" aria-hidden="true"></i>
				<span class="hidden-tablet"> Book Management</span></a>
				<ul>
					<li><a class="submenu" href="{{route('admin.cats.getList')}}"><i class="fa fa-braille" aria-hidden="true" ></i><span class="hidden-tablet"> Category</span></a></li>
					<li><a class="submenu" href="{{ route('admin.products.getList')}}"><i class="fa fa-product-hunt" aria-hidden="true"></i><span class="hidden-tablet"> Book</span></a></li>
				</ul>	
			</li>
			<li><a href="{{route('admin.bills.getList')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="hidden-tablet"> Order</span></a></li>
			<li><a href="{{route('admin.slide.getList')}}"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="hidden-tablet"> Slide</span></a></li>
			<li><a href="{!! route('admin.pages.calendar') !!}"><i class="icon-calendar"></i><span class="hidden-tablet"> Lịch</span></a></li>
		</ul>
	</div>

</div>
<!-- end: Main Menu -->