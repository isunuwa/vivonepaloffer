
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
          
          <div class="col-lg-12 grid-margin  stretch-card">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-8">
                        <h4 class="card-title">Prize Table</h4>
                        <p class="card-description">
                        Table of the prizes
                        </p>
                    </div>
                    <div class="col-md-6 col-4">
                      <a href="{{route('prize.create')}}" class="btn btn-primary btn-rounded btn-fw float-right ">Create New</a>
                    </div>
                </div>
                <div class="table-responsive align-self-center">
                  <table class="table table-hover">
                    <thead>
                      <tr class="">
                        <th>id</th>
                        <th>Prizes</th>
                        <th>Prize Description</th>
                        <th>Total Quantity</th>
                        <th>Balance Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $sn = 0; ?>
                      @foreach ($data['prize'] as $prize)
                        <tr>
                          <td>{{++$sn}}</td>
                          <td>{{$prize->prize}}</td>
                          <td>{{$prize->prize_description}}</td>
                          <td>{{$prize->total_qty}}</td>
                          <td>{{$prize->balance_qty}}</td>
                          <td class="">
                            <div class="row">
                              <div class="col-sm-5 col-6">
                                <a href="{{route('prize.edit', $prize->id)}}" class="btn btn-light btn-sm">
                                  <i class="ti-eye text-primary"></i>
                                </a>
                              </div>
                              <div class="col-sm-5 col-6">
                                <form action="{{ route('prize.destroy', $prize->id)}}" method="post">
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