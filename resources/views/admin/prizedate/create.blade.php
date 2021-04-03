
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create new prize date</h4>
                {{-- <p class="card-description">
                  Horizontal form layout
                </p> --}}
                <form class="forms-sample" method="POST"  action="{{route('prizedate.store')}}">
                  @csrf
                  <div class="form-group">
                    <label for="date">Date</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('date') }}</span>
                    <input type="date" class="form-control" name="date" id="date" placeholder="enter prize title">
                  </div>
                  <div class="form-group">
                    <label for="total_qty">Total Prize Quantity</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('total_qty') }}</span>
                    <input type="number" class="form-control" name="total_qty" id="total_qty" placeholder="total prize quantity">
                  </div>
                  <div class="form-group">
                    <label for="balance_qty">Balance Quantity</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('balance_qty') }}</span>
                    <input type="number" class="form-control" name="balance_qty" id="balance_qty" placeholder="balance qty">
                  </div>

                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a href="{{route('prizedate.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
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