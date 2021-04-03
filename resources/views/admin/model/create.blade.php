
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create new phone model</h4>

                <form class="forms-sample" method="POST"  action="{{route('phonemodel.store')}}">
                  @csrf
                  <div class="form-group">
                    <label for="model">Phone model</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('model') }}</span>
                    <input type="text" class="form-control" name="model" id="model" placeholder="vivo phone model">
                  </div>

                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a href="{{route('phonemodel.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
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