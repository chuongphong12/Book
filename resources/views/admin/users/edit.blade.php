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
  </li>
</ul>
<div class="row-fluid sortable">
<div class="box span12">
    @include('admin.blocks.errors')
    <div class="box-header" data-original-title>
        <h2><i class="icon-plus-sign-alt"></i> <span class="break"></span>User Information</h2>
        <div class="box-icon">
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <fieldset>
          <legend style="font-size: 18px;">Account Information</legend>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Email</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="txtEmail" value="{{ old ('txtEmail',isset($user) ? $user['email'] : null)}}" disabled="">
                </div>
            </div>
            <div class="control-group">
                @if(Auth::user()->id == $id)
                <label class="control-label" for="focusedInput">Password</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="password" name="txtPass" value="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="focusedInput">Password Confirm</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="password" name="txtRePass" value="">
                </div>
                @endif
            </div>
            <div class="control-group">
            @if(Auth::user()->id != $id)
              <label class="control-label">Level</label>
              <div class="controls" >
                <label class="radio" style="float: left;" >
                <input type="radio" name="rdoLevel" id="optionsRadios1" value="1" checked=""
                @if($user['level'] ==1)
                  checked="checked"
                @endif> 
                Admin
                </label>
              </div>
              <div class="controls">
                <label class="radio" style="float: left;">
                  <input type="radio" name="rdoLevel" id="optionsRadios2" value="2"
                  @if($user['level'] ==2)
                    checked="checked"
                  @endif
                  >
                  Member
                </label>
              </div>
            </div>
            <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls" >
              <label class="radio" style="float: left;" >
              <input type="radio" name="rdoStatus" id="optionsRadios1" value="1" checked=""
              @if($user['status'] ==1)
                checked="checked"
              @endif
              > Active
              </label>
            </div>
            <div class="controls">
              <label class="radio" style="float: left;">
                <input type="radio" name="rdoStatus" id="optionsRadios2" value="2"
                @if($user['status'] ==2)
                  checked="checked"
                @endif
                >
                Locked
              </label>
            </div>
          </div>
          @endif
          </fieldset>
          <hr>
          @if($user['level'] == 1 && $user['id']==Auth::user()->id)
            <fieldset>
              <legend style="font-size: 18px;">Detail Information</legend>
              <div class="control-group">
                  <label class="control-label" for="focusedInput">Full name</label>
                  <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" name="txtName" value="{{ old ('txtName',isset($user) ? $user['full_name'] : null)}}">
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="focusedInput">Phone</label>
                  <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" name="txtTel" value="{{ old ('txtTel',isset($user) ? $user['phone'] : null)}}">
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="focusedInput">Address</label>
                  <div class="controls">
                    <input class="input-xlarge focused" id="focusedInput" type="text" name="txtAddress" value="{{ old ('txtAddress',isset($user) ? $user['address'] : null)}}">
                  </div>
              </div>
            </fieldset>
          @endif
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn">Cancle</button>
          </div>
        </form>  
    </div>
</div><!--/span-->
</div><!--/row-->
@endsection