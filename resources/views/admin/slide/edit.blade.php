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
      <a href="{{ route ('admin.slide.getList')}}">Slide List </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Slide Editor</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="fProductDetail" >
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Slide Information</legend>
            <div class="control-group" >
              <label class="control-label">Current Image </label>
              <div class="controls" style="width: 26%;">
                <img src="{{ asset('sources/image/slide/'.$slide['image'])}}">
                <input type="hidden" name="img_current" value="{{$slide['image']}}">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Slide Image</label>
              <div class="controls">
                <input type="file" name="SImages">
              </div>
            </div>
          </fieldset>
          <hr>
          <fieldset>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <button class="btn" href="{{URL::route('admin.slide.getList')">Cancel</button>
            </div>
          </fieldset>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection