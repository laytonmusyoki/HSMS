@extends('admin.app')

@section('title','Dashboard')

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">  
  
    Overview
    
</div>
</div>


@include('admin.layouts.widgets.widget')


{{-- <div class="row">
  <div class="col-12 col-xl-12 d-flex">
    <div class="card rounded-4 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-around flex-wrap gap-4 p-4">
          <div class="d-flex flex-column align-items-center justify-content-center gap-2">
            <a href="javascript:;" class="mb-2 wh-48 bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center">
              <i class="material-icons-outlined">shopping_cart</i>
            </a>
            <h3 class="mb-0">85,246</h3>
            <p class="mb-0">Orders</p>
          </div>
          <div class="vr"></div>
          <div class="d-flex flex-column align-items-center justify-content-center gap-2">
            <a href="javascript:;" class="mb-2 wh-48 bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center">
              <i class="material-icons-outlined">print</i>
            </a>
            <h3 class="mb-0">$96,147</h3>
            <p class="mb-0">Income</p>
          </div>
          <div class="vr"></div>
          <div class="d-flex flex-column align-items-center justify-content-center gap-2">
            <a href="javascript:;" class="mb-2 wh-48 bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center">
              <i class="material-icons-outlined">notifications</i>
            </a>
            <h3 class="mb-0">846</h3>
            <p class="mb-0">Notifications</p>
          </div>
          <div class="vr"></div>
          
          <div class="d-flex flex-column align-items-center justify-content-center gap-2">
            <a href="javascript:;" class="mb-2 wh-48 bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center">
              <i class="material-icons-outlined">payment</i>
            </a>
            <h3 class="mb-0">$84,472</h3>
            <p class="mb-0">Payment</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}




    
@endsection