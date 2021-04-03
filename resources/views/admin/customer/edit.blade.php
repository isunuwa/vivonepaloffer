
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sold customer edit form</h4>

              <form class="forms-sample"  enctype="multipart/form-data" method="post" action="{{ route('customer.update', $data['salescustomer']->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="full_name">Customer Name:</label>
                  <span class="text-small text-danger">{{ $errors->first('full_name') }}</span>
                  <input type="text" class="form-control" name="full_name" id="full_name" placeholder="customer full name" value="{{$data['salescustomer']->full_name}}">
                </div>
                <div class="form-group">
                  <label for="contact_no">Customer Contact Number:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('contact_no') }}</span>
                  <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="customer contact number" value="{{$data['salescustomer']->contact_no}}">
                  
                </div>
                <div class="form-group">
                  <label for="sold_area">Sold Location:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('sold_area') }}</span>
                  <input type="text" class="form-control" name="sold_area" id="sold_area" placeholder="product sold location" value="{{$data['salescustomer']->sold_area}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="shop_name">Sold Shop Name:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('shop_name') }}</span>
                  <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="product bought store name" value="{{$data['salescustomer']->shop_name}}">
                </div>
                <div class="form-group">
                  <label for="campaign_from">Campaign From:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('campaign_from_id') }}</span>
                  <select class="form-control" id="campaign_from" name="campaign_from_id">
                      <option value=""> -- Select One --</option>
                      @foreach ($data['campaign_from'] as $campaign)
                          <option value="{{ $campaign->id }}" {{ $data['salescustomer']->campaign_from_id == $campaign->id ? 'selected' : '' }}>{{ $campaign->campaign_from }}</option>
                      @endforeach 
                  </select>   
                </div>
                <div class="form-group">
                  <label for="phone_model">Phone Model:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('phone_model_id') }}</span>
                  <select class="form-control" id="phone_model" name="phone_model_id">
                      <option value=""> -- Select One --</option>
                      @foreach ($data['phone_model'] as $phone_model)
                          <option value="{{ $phone_model->id }}" {{ $data['salescustomer']->phone_model_id == $phone_model->id ? 'selected' : ''  }}>{{ $phone_model->model }}</option>
                      @endforeach 
                  </select>   
                </div>
                
                <div class="form-group">
                  <label for="imei" class="col-sm-3 col-form-label">Phone IMEI no:</label>
                  <span class="ml-4 text-small text-danger">{{ $errors->first('imei') }}</span>
                  <input type="text" class="form-control" name="imei" id="imei" placeholder="product imei no" value="{{$data['imei']}}">
                </div>

                <div class="row d-flex justify-content-around">
                  <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                  <a href="{{route('customer.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- main-panel ends -->
</div>
@stop