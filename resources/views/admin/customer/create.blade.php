
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
          
          <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create new campaign from form</h4>
                {{-- <p class="card-description">
                  Horizontal form layout
                </p> --}}
                {{-- @foreach ($errors->all() as $error)
                  <span class="text-danger">{{ $error }}</span>
                @endforeach --}}
                <form class="forms-sample" method="POST"  action="{{route('customer.store')}}">
                  @csrf
                  <div class="form-group">
                    <label for="full_name">Customer Name:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('full_name') }}</span>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="customer full name">
                  </div>
                  <div class="form-group">
                    <label for="contact_no">Contact Number:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('contact_no') }}</span>
                    <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="customer contact number">
                  </div>
                  <div class="form-group">
                    <label for="sold_area">Sold Location:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('sold_area') }}</span>
                    <input type="text" class="form-control" name="sold_area" id="sold_area" placeholder="product sold location" >
                  </div>
                  <div class="form-group">
                    <label for="shop_name">Sold Shop Name:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('shop_name') }}</span>
                    <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="product bought store name" >
                  </div>
                  <div class="form-group">
                    <label for="campaign_from_id">Campaign From:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('campaign_from_id') }}</span>
                    <select class="form-control" id="campaign_from_id" name="campaign_from_id">
                        <option value=""> -- Select One --</option>
                        @foreach ($data['campaign_from'] as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->campaign_from }}</option>
                        @endforeach 
                    </select>  
                  </div>
                  <div class="form-group">
                    <label for="phone_model_id">Phone Model:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('phone_model_id') }}</span>
                    <select class="form-control" id="phone_model_id" name="phone_model_id">
                        <option value=""> -- Select One --</option>
                        @foreach ($data['phone_model'] as $phone_model)
                            <option value="{{ $phone_model->id }}">{{ $phone_model->model }}</option>
                        @endforeach 
                    </select>   
                  </div>
                  <div class="form-group">
                    <label for="imei">Phone IMEI:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('imei') }}</span>
                    <input type="text" class="form-control" name="imei" id="imei" placeholder="product imei number" >
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