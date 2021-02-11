@extends('layouts.app')

@section('page-title','User Account')

@section('content')
<div class="container-fluid py-3" style="min-height: 80vh">
  <div class="row no-gutters">

    <div class="col-xl-2 col-md-2 col-sm-12 ml-auto">
      @include('inc.app.user-sidebar')
    </div>

    <div class="col-xl-8 col-md-8 col-sm-12 mr-auto">
      <div class="card shadow">
        <div class="card-header bg-light border-bottom">
          <p class="mb-0 ">Reporting an Issue</p>
        </div>

        <div class="card-body">
          
          <h6 class="heading-small text-muted mb-4" id="password-section">we are always ready to help you {{auth()->user()->name}}</h6>
          <div class="pl-lg-4">
            <form action="{{route('mail.send')}}">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                      Type of Issue:
                    <select  class="form-control">
                        <option value="Payment">Payment</option>
                        <option value="Shipping">Shipping</option>
                        <option value="Account">Account</option>
                    </select>
                  </div>
                  <div class="form-group">
                      leave us a Message:
                    <textarea  class="form-control" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Report</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection