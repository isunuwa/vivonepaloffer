
@extends('admin._shared.master')
@section('main-content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
          
          <div class="col-lg-8 grid-margin  stretch-card">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-8">
                        <h4 class="card-title">Campaign From Table</h4>
                        <p class="card-description">
                        Table from of how the customer heard of this program
                        </p>
                    </div>
                    <div class="col-md-6 col-4">
                      <a href="{{route('campaignfrom.create')}}" class="btn btn-primary btn-rounded btn-fw float-right ">Create New</a>
                    </div>
                </div>
                <div class="table-responsive align-self-center">
                  <table class="table table-hover">
                    <thead>
                      <tr class="">
                        <th>id</th>
                        <th>Campaign From</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $sn = 0; ?>
                      @foreach ($data['campaign_from'] as $campaign_from)
                        <tr>
                          <td>{{++$sn}}</td>
                          <td>{{$campaign_from->campaign_from}}</td>
                          <td class="">
                            <div class="row">
                              <div class="col-sm-3">
                                <a href="{{route('campaignfrom.edit', $campaign_from->id)}}" class="btn btn-light btn-sm">
                                  <i class="ti-eye text-primary"></i>
                                </a>
                              </div>
                              <div class="col-sm-3">
                                {{-- <button class="btn btn-outline-success" onclick="showSwal('title-and-text')">Click here!</button> --}}
                                <form action="{{ route('campaignfrom.destroy', $campaign_from->id)}}" method="post">
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