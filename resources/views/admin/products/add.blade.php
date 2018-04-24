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
      <a href="{{route('admin.products.getList')}}">Book List </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Add new book</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="{{ route('admin.products.getAdd')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Book Information</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Category</label> 
              <div class="controls">
                <select data-placeholder="Select category"  data-rel="chosen" name="sltParent">
                  @foreach($cats as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>            
                  @endforeach
                </select>
              </div>  
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">ISBN</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtIsbn" value="{!! old('txtIsbn') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Title</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtTitle" value="{!! old('txtTitle') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Author</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtAuthor" value="{!! old('txtAuthor') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Publisher</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPublisher" value="{!! old('txtPublisher') !!}">  
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Company Release</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtCompany" value="{!! old('txtCompany') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Description</label>
                <div class="controls" style="width: 55%;">
                  <textarea class="input-xlarge focused" id="txtDescription" type="text" name="txtDescription" value="{!! old('txtDescription') !!}"></textarea>
                  <script type="text/javascript"> CKEDITOR.replace('txtDescription'); </script>  
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Pages</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPage" value="{!! old('txtPage') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Release Date</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="date" name="txtRelease" value="{!! old('txtRelease') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Unit Price</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit_price" value="{!! old('txtUnit_price') !!}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Promotion Price</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPromotion_price" value="{!! old('txtPromotion_price') !!}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image</label>
              <div class="controls">
                <input type="file" name="fImages" value="{!! old('fImages') !!}">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Unit</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit" value="{!! old('txtUnit') !!}">
                </div>
            </div>
          </fieldset>
          <hr>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add new book</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection