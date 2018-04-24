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
      <a href="{{ route ('admin.bills.getList')}}">Order List </a>
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>Order Editting</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="fProductDetail" >
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Order Information</legend>
            <div class="control-group">
              <label class="control-label" for="typeahead">Customer Name</label> 
              <div class="controls">
                <?php $cus = DB::table('customer')->where('id',$bills['id_customer'])->first(); ?>
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtCustomerName" value="{{ old('txtCustomerName',isset($cus) ? $cus->name : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Order Date</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtDate" value="{{ old('txtDate',isset($bills) ? $bills['date_order'] : null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Total</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtTotal" value="{{number_format(old('txtTotal',isset($bills) ? $bills['total'] :null ),0,',','.')}} VNĐ">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Payment</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" disabled="true" name="txtPayment" value="{{ old('txtPayment',isset($bills) ? $bills['payment'] :null )}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Note</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtNote" value="{{ old('txtCost',isset($bills) ? $bills['note'] :null )}}">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoStatus" id="optionsRadios1" value="1"
                @if($bills['status'] == 1)
                  checked="checked"
                @endif> 
                Ready
                </label>
              </div>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoStatus" id="optionsRadios2" value="0"
                @if($bills['status'] == 0)
                  checked="checked"
                @endif> 
                On going..
                </label>
              </div>
              <div class="controls">
                <label class="radio" style="float: left;">
                  <input type="radio" name="rdoStatus" id="optionsRadios3" value="2"
                  @if($bills['status'] == 2)
                    checked="checked"
                  @endif>
                  Canceled
                </label>
              </div>
            </div>
          </fieldset>
          <hr>
          <fieldset>
            <legend style="font-size: 18px;">Order Detail Information</legend>
               <form action="" class="form-group" >
                <fieldset>
      <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ISBN</th>
              <th>Book Name</th>
              <th>Quantity</th>
              <th>Price</th>                                           
            </tr>
          </thead>
          @foreach($bill_details as $item)   
          <tbody>
              <td>
              <?php $isbn = DB::table('books')->where('id',$item['id_book'])->first(); ?>
                @if(!empty ($isbn->isbn))
                  {{ $isbn->isbn }}
              @endif
            </td>
            <td>
              <?php $pro = DB::table('books')->where('id',$item['id_book'])->first(); ?>
                @if(!empty ($pro->title))
                  {{ $pro->title }}
              @endif
            </td>
            <td>{{$item['quantity']}}</td>
            <td>{{number_format($item['unit_price'],0,',','.')}} VNĐ</td>                       
              </tbody>
                   @endforeach
              <td></td>
              <td></td>
              <th>Tổng giá:</th>
              <td>{{number_format($bills['total'],0,',','.')}} VNĐ</td>
              </table>
                </fieldset>
              </form>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <button href="{{route('admin.bills.getList')}}" class="btn">Cancel</button>
            </div>
          </fieldset>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection