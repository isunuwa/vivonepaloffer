
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-12 col-12 grid-margin  stretch-card">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-8">
                      <h4 class="card-title">Prize Winners Table</h4>
                      <p class="card-description">
                      Table of the winners that won the prize
                      </p>
                  </div>
                  <div class="col-md-6 col-4">
                    <a href="{{route('awardedprize.create')}}" class="btn btn-primary btn-rounded btn-fw float-right ">Create New</a>
                  </div>
                </div>
            
                <div class="table-responsive align-self-center">
                  <table id="order-listing" class="table table-hover ">
                    <thead>
                      <tr class="">
                        <th>id</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Prize Name</th>
                        <th>Won Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $sn = 0; ?>
                      @foreach ($data['awardedprizes'] as $awardedprize)
                        <tr>
                          <td>{{++$sn}}</td>
                          <td>{{$awardedprize->salesCustomer->full_name}}</td>
                          <td>{{$awardedprize->salesCustomer->contact_no}}</td>
                          <td>{{$awardedprize->prizeTitle->prize}}</td>
                          
                          <td>{{$awardedprize->date}}</td>
                          <td class="">
                            <div class="row">
                              <div class="col-sm-4 col-6">
                                <a href="{{route('awardedprize.edit', $awardedprize->id)}}" class="btn btn-light btn-sm">
                                  <i class="ti-eye text-primary"></i>
                                </a>
                              </div>
                              <div class="col-sm-4 col-6">
                                <form action="{{ route('awardedprize.destroy', $awardedprize->id)}}" method="post">
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