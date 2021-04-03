
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
                      <h4 class="card-title">Customer Table</h4>
                      <p class="card-description">
                      Table of customers that bought VIVO products 
                      </p>
                  </div>
                  <div class="col-md-6 col-4">
                    <a href="{{route('customer.create')}}" class="btn btn-primary btn-rounded btn-fw float-right ">Create New</a>
                  </div>
              </div>
              
              <div class="row">
                <div class="table-sorter-wrapper col-lg-12 table-responsive">
                  <table id="sortable-table-1" class="table">
                    <thead>
                      <tr class="">
                        <th>id </th>
                        <th class="sortStyle">Customer Name <i class="ti-angle-down"></i></th>
                        <th class="sortStyle">Contact No <i class="ti-angle-down"></i></th>
                        <th class="sortStyle">Sold Area <i class="ti-angle-down"></i></th>
                        <th class="sortStyle">Shop Name <i class="ti-angle-down"></i></th>
                        <th class="sortStyle">Campaign <i class="ti-angle-down"></i></th>
                        <th class="sortStyle">Phone Model <i class="ti-angle-down"></i></th>
                        <th>IMEI</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sn = 0; ?>
                      @foreach ($data['salescustomer'] as $salescustomer)
                        <tr>
                          <td>{{++$sn}}</td>
                          <td>{{$salescustomer->full_name}}</td>
                          <td>{{$salescustomer->contact_no}}</td>
                          <td>{{$salescustomer->sold_area}}</td>
                          <td>{{$salescustomer->shop_name}}</td>
                          <td>{{$salescustomer->campaignFrom->campaign_from}}</td>
                          <td>{{$salescustomer->phoneModel->model}}</td>
                          <td>
                            @foreach ($salescustomer->imeis as $customerimei)
                              {{$allimei = $customerimei->imei}}
                            @endforeach
                          </td>
                          <td class="">
                            <div class="row">
                              <div class="col-sm-5 col-6">
                                <a href="{{route('customer.edit', $salescustomer->id)}}" class="btn btn-light btn-sm">
                                  <i class="ti-eye text-primary"></i> 
                                </a>
                              </div>
                              <div class="col-sm-5 col-6">
                                <form action="{{ route('customer.destroy', $salescustomer->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-light btn-sm text-danger" type="submit"> <i class="ti-trash"></i> </button>
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
  </div>
  <!-- main-panel ends -->
</div>
@stop