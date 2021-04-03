
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create new campaign from form</h4>
                <form class="forms-sample" method="POST"  action="{{route('campaignfrom.store')}}">
                  @csrf
                  <div class="form-group">
                    <label for="campaign_from" class="mr-4">Campaign From</label>
                    <span class="text-small text-danger">{{ $errors->first('campaign_from') }}</span>
                    <input type="text" class="form-control" name="campaign_from" id="campaign_from" placeholder="campaign from">
                  </div>
                  
                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a href="{{route('campaignfrom.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
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