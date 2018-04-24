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
      <a href="{{ route ('admin.products.getList')}}">Book List </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Book Editor</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="fProductDetail" >
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Book Information</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Category</label>
              <div class="controls">
                <select data-placeholder="Select category.."  data-rel="chosen" name="sltParent">
                  <?php
                    function cat_parent($data,$parent = 0,$str="--",$select=0){
                      foreach ($data as $value) {
                        $id=$value["id"];
                        $name=$value["name"];
                        if ($value['parent_id']==$parent) {
                          if ($select!=0 && $id==$select) {
                            echo "<option value='$id' selected = 'selected'>$str $name</option>";
                          }
                          else{
                            echo "<option value='$id'>$str $name</option>";
                          }
                          cat_parent($data,$id,"+" ,$select);
                        }
                      }
                    }
                  ?>
                  <!-- @foreach($cats as $type)
                    <option value="">
                      {{$type->name}}</option>
                  @endforeach -->
                  <option value=""></option>
                    <?php cat_parent($cats,0,"--",$product['id_type']) ?>
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">ISBN</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtIsbn" value="{{ old('txtIsbn',isset($product) ? $product['isbn'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Title</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtTitle" value="{{ old('txtTitle',isset($product) ? $product['title'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Auhor</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtAuthor" value="{{ old('txtAuthor',isset($product) ? $product['author'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Publisher</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPublisher" value="{{ old('txtPublisher',isset($product) ? $product['publisher'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Company Release</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtCompany" value="{{ old('txtCompany',isset($product) ? $product['company_release'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Description</label>
                <div class="controls" style="width: 55%;">
                  <textarea class="input-xlarge focused" id="txtDescription" type="text" name="txtDescription">{{ old('txtDescription',isset($product) ? $product['description'] : null )}}</textarea>
                  <script type="text/javascript"> CKEDITOR.replace('txtDescription'); </script>
                </div>
            </div>
            <!-- <div class="control-group">
                <label class="control-label" for="focusedInput">Mô tả</label>
                <div class="controls" style="width: 55%;">
                  @if (isset($product))
                  <textarea class="input-xlarge focused" id="focusedInput" type="text" name="txtDescription"><?php echo $product['description']; ?></textarea>
                  <script type="text/javascript">
                  config = {};
                  config.removePlugins = 'elementspath';
                  CKEDITOR.replace('txtDescription',config);
                  </script>
                  @endif

                </div>
            </div> -->
            <!-- <div class="control-group">
                <label class="control-label" for="focusedInput">Description</label>
                <div class="controls">
                  <textarea style="height: 200px" class="input-xlarge focused" id="focusedInput" name="txtDescription">{{ old('txtDescription',isset($product) ? $product['description'] : null)}}</textarea>
                </div>
            </div> -->
            <div class="control-group">
                <label class="control-label" for="focusedInput">Pages</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPage" value="{{ old('txtPage',isset($product) ? $product['page'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Release Date</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="date" name="txtRelease" value="{{ old('txtRelease',isset($product) ? $product['release_date'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Unit Price</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit_price" value="{{ old('txtUnit_price',isset($product) ? $product['unit_price'] :null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Promotion Price</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtPromotion_price" value="{{ old('txtPromotion_price',isset($product) ? $product['promotion_price'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Unit</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtUnit" value="{{ old('txtUnit',isset($product) ? $product['unit'] : null )}}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Loại</label>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoNew" id="optionsRadios1" value="1"
                @if($product['new'] == 1)
                  checked="checked"
                @endif>
                New Product
                </label>
              </div>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoNew" id="optionsRadios2" value="0"
                @if($product['new'] == 0)
                  checked="checked"
                @endif>
                Normal
                </label>
              </div>
              <div class="controls">
                <label class="radio" style="float: left;">
                  <input type="radio" name="rdoNew" id="optionsRadios3" value="2"
                  @if($product['new'] == 2)
                    checked="checked"
                  @endif>
                  Top Product
                </label>
              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Current Image </label>
              <div class="controls" style="width: 26%;">
                <img src="{{ asset('sources/image/product/'.$product['image'])}}">
                <input type="hidden" name="img_current" value="{{ $product['image']}}">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Book Image</label>
              <div class="controls">
                <input type="file" name="fImages[]" multiple>
              </div>
            </div>
          </fieldset>
          <hr>
          <fieldset>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <button class="btn" href="{{URL::route('admin.products.getList')">Cancel</button>
            </div>
          </fieldset>
        </form>
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection
