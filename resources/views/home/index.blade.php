@extends('layouts.master')
@section('main-content')
<div class="container">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <h3 class="text-center">Vivo Bumper Prize</h3>
    {{-- @foreach ($errors->all() as $error)
    <span class="text-danger">{{ $error }}</span>
  @endforeach  --}}
    <a href="{{route('get.home')}}">admin home</a>
    <div class="form-group">
        <label for="full_name">Customer Name</label> <span class="text-danger">{{ $errors->first('full_name') }}</span>
        <input type="text" class="form-control" id="full_name" placeholder="enter your full name" name="full_name" value="{{old('full_name')}}">
    </div>
    <div class="form-group">
        <label for="contact_no">Phone Number</label> <span class="text-danger">{{ $errors->first('contact_no') }}</span>
        <input type="text" class="form-control" id="contact_no" placeholder="contact number" name="contact_no" value="{{old('contact_no')}}">
    </div>
    <div class="form-group">
        <label for="shop_name">Shop Name</label> <span class="text-danger">{{ $errors->first('shop_name') }}</span>
        <input type="text" class="form-control" id="shop_name" placeholder="shop you bought the phone from" name="shop_name" value="{{old('shop_name')}}">
    </div>
    <div class="form-group">
        <label for="imei_no">IMEI</label> <span class="text-danger">{{ $errors->first('imei_no') }} </span>
        <input type="text" class="form-control" id="imei_no" placeholder="enter your phone imei no" name="imei_no" value="{{old('imei_no')}}">
    </div>

    <div class="form-group">
        <label for="phone_model_id">Model Name</label> <span class="text-danger"> {{ $errors->first('phone_model_id') }}</span>
        <select class="form-control" id="phone_model_id" name="phone_model_id">
        <option> -- Select your phone model --</option>
            @foreach ($data['phone_model'] as $phone_model)
                <option value="{{ $phone_model->id }}" {{ old('phone_model_id') == $phone_model->id ? 'selected' : ''  }}>{{ $phone_model->model }}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group">
        <label for="sold_area">Sold area address</label><span class="text-danger"> {{ $errors->first('sold_area') }} </span>
        <input type="text" class="form-control" id="sold_area" placeholder="enter the address you bought from" name="sold_area" value="{{old('sold_area')}}">
    </div>

    <div class="form-group">
        <label for="campaign_from_id">How did you find out about this campaign?</label> <span class="text-danger"> {{ $errors->first('campaign_from_id') }} </span>
        <select class="form-control" id="campaign_from_id" name="campaign_from_id">
            <option> -- Select One --</option>
            @foreach ($data['campaign_from'] as $campaign)
                <option value="{{ $campaign->id }}" {{ old('campaign_from_id') == $campaign->id ? 'selected' : ''  }}>{{ $campaign->campaign_from }}</option>
            @endforeach 
        </select>    
    </div>
        
    
    <button type="submit" class="btn btn-primary form-control" >Submit</button>
    </form>

</div>
@stop