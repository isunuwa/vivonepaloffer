
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title border-bottom pb-3">Create new prize winner form</h4>
                <form class="forms-sample" method="POST"  action="{{route('awardedprize.store')}}">
                  @csrf
                  <span class="text-primary text-uppercase text-center">Customer Detail</span>
                  <div class="form-group px-2">
                    <label for="full_name">Customer Name:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('full_name') }}</span>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="customer full name">
                  </div>
                  <div class="form-group px-2">
                    <label for="contact_no">Contact Number:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('contact_no') }}</span>
                    <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="customer contact number">
                  </div>
                  <div class="form-group px-2">
                    <label for="sold_area">Sold Location:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('sold_area') }}</span>
                    <input type="text" class="form-control" name="sold_area" id="sold_area" placeholder="product sold location" >
                  </div>
                  <div class="form-group px-2">
                    <label for="shop_name">Sold Shop Name:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('shop_name') }}</span>
                    <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="product bought store name">
                  </div>
                  <div class="form-group px-2 border-bottom pb-3">
                    <label for="campaign_from">Campaign From:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('campaign_from_id') }}</span>
                    <select class="form-control" id="campaign_from" name="campaign_from_id">
                        <option value=""> -- Select One --</option>
                        @foreach ($data['campaign_from'] as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->campaign_from }}</option>
                        @endforeach 
                    </select>  
                  </div>
                  
                  <span class="text-primary text-uppercase text-center ">Phone Details</span>    
                  <div class="form-group px-2">
                    <label for="phone_model">Phone Model:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('phone_model_id') }}</span>
                    <select class="form-control" id="phone_model" name="phone_model_id">
                        <option value=""> -- Select One --</option>
                        @foreach ($data['phone_model'] as $phone_model)
                            <option value="{{ $phone_model->id }}">{{ $phone_model->model }}</option>
                        @endforeach 
                    </select>   
                  </div>
                  <div class="form-group px-2 border-bottom pb-3">
                    <label for="imei">Phone IMEI:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('imei') }}</span>
                    <input type="text" class="form-control" name="imei" id="imei" placeholder="product imei number">
                  </div>
                  
                  <span class="text-primary text-uppercase text-center ">Prize Won Details</span>
                  <div class="form-group px-2">
                    <label for="prize_title">Prize Name:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('prize_title') }}</span>
                    <select class="form-control" id="prize_title" name="prize_title">
                        <option value=""> -- Select One --</option>
                        @foreach ($data['prize_title'] as $prize_title)
                            <option value="{{ $prize_title->id }}">{{ $prize_title->prize }}</option>
                        @endforeach 
                    </select> 
                  </div>
                  <div class="form-group px-2 pb-2">
                    <label for="date">Prize Won Date:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('date') }}</span>
                    <input type="date" class="form-control" name="date" id="date" placeholder="enter prize won date">
                  </div>

                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a class="btn btn-secondary col-md-5 my-2 text-white" onclick="{{route('awardedprize.index')}}">Cancel</a>
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