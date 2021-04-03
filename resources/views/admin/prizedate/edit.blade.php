
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
                @foreach ($errors->all() as $error)
                  <span class="text-danger">{{ $error }}</span>
                @endforeach
                <form class="forms-sample"  enctype="multipart/form-data" method="post" action="{{ route('prizedate.update', $data['prizedate']->id) }}">
                  @csrf
                  @method('PATCH')
                  <div class="form-group">
                    <label for="date">Prize Date:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('date') }}</span>
                    <input type="date" class="form-control" name="date" id="date" placeholder="date" value="{{$data['prizedate']->date}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="total_qty">Prize Total Quantity:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('total_qty') }}</span>
                    <input type="number" class="form-control" name="total_qty" id="total_qty" placeholder="total prize qunatity" value="{{$data['prizedate']->total_qty}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="balance_qty">Prize Balance Quantity:</label>
                    <span class="ml-4 text-small text-danger">{{ $errors->first('balance_qty') }}</span>
                    <input type="number" class="form-control" name="balance_qty" id="balance_qty" placeholder="balance prize quantity" value="{{$data['prizedate']->balance_qty}}">
                    </div>
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