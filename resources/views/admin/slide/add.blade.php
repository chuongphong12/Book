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
      <a href="{{route('admin.slide.getList')}}">Slide </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Add new Slide</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="{{ route('admin.slide.getAdd')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Slide</legend>
            <div class="control-group">
              <label class="control-label">Slide Image</label>
              <div class="controls">
                <input type="file" name="SImages" value="{!! old('SImages') !!}">
                <div style="color: red">*Notice* The size for image is 1920x530</div>
              </div>
            </div>
          </fieldset>

          <hr>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add new slide</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection