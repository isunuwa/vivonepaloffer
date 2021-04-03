
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
          
          <div class="col-lg-10 grid-margin  stretch-card">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-8">
                        <h4 class="card-title">Phone IMEI Table</h4>
                        <p class="card-description">
                        Table phone IMEI
                        </p>
                    </div>
                    <div class="col-md-6 col-4">
                      <a href="{{route('imei.create')}}" class="btn btn-primary btn-rounded btn-fw float-right ">Create New</a>
                    </div>
                </div>
                <div class="table-responsive align-self-center">
                  <table class="table table-hover">
                    <thead>
                      <tr class="">
                        <th>id</th>
                        <th>Phone IMEI</th>
                        <th>Phone Model</th>
                        <th>Customer Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $sn = 0; ?>
                      @foreach ($data['imeis'] as $imei)
                        <tr>
                          <td>{{++$sn}}</td>
                          <td>{{$imei->imei}}</td>
                          <td>{{$imei->salesCustomer->phone_model_id}}</td>
                          <td>{{$imei->salesCustomer->full_name}}</td>
                          <td class="">
                            <div class="row">
                              <div class="col-sm-5 col-4">
                                <a href="{{route('imei.edit', $imei->id)}}" class="btn btn-light btn-sm">
                                  <i class="ti-eye text-primary"></i> 
                                </a>
                              </div>
                              <div class="col-sm-5 col-4">
                                <form action="{{ route('imei.destroy', $imei->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-light btn-sm text-danger" type="submit"> <i class="ti-trash"></i></button>
                                </form>
                              </div>
                            </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- main-panel ends -->
  </div>
@stop