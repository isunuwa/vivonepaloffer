
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Campaign From edit form</h4>

                <form class="forms-sample"  enctype="multipart/form-data" method="post" action="{{ route('campaignfrom.update', $data['campaign_from']->id) }}">
                  @csrf
                  @method('PATCH')
                  {{-- <div class="form-group row">
                    <label for="campaign_from" class="col-sm-3 col-form-label">Campaign From:</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="campaign_from" id="campaign_from" placeholder="campaign from" value="{{$data['campaign_from']->campaign_from}}">
                    </div>
                  </div> --}}

                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a href="{{route('imei.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
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