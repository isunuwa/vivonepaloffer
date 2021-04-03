
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Prize edit form</h4>

                <form class="forms-sample"  enctype="multipart/form-data" method="post" action="{{ route('prize.update', $data['prize']->id) }}">
                  @csrf
                  @method('PATCH')
                  <div class="form-group">
                    <label for="prize">Prize Title:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('prize') }}</span>
                    <input type="text" class="form-control" name="prize" id="prize" placeholder="prize" value="{{$data['prize']->prize}}">
                  </div>
                  <div class="form-group">
                    <label for="prize_description">Prize Description:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('prize_description') }}</span>
                    <input type="text" class="form-control" name="prize_description" id="prize_description" placeholder="prize description" value="{{$data['prize']->prize_description}}">
                  </div>
                  <div class="form-group">
                    <label for="total_qty">Total Prize Quantity:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('total_qty') }}</span>
                    <input type="number" class="form-control" name="total_qty" id="total_qty" placeholder="total prize qunatity" value="{{$data['prize']->total_qty}}">
                  </div>
                  <div class="form-group">
                    <label for="balance_qty">Balance Quantity:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('balance_qty') }}</span>
                    <input type="number" class="form-control" name="balance_qty" id="balance_qty" placeholder="balance prize quantity" value="{{$data['prize']->balance_qty}}">
                  </div>

                  <div class="row d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary col-md-5 my-2">Submit</button>
                    <a href="{{route('prize.index')}}" class="btn btn-light col-md-5 my-2">Cancel</a>
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