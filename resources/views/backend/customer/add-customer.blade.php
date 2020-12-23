@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Add Customer
                  <a href="{{route('customers.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>Customers List</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                <form action="{{route('customers.store')}}" method="post" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">Customer Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autocomplete="name" autofocus>
                    <font style="color: red;">
                      {{($errors->has('name'))?($errors->first('name')):''}}
                    </font>
                    </div>
                     <div class="form-group col-md-6">
                      <label for="mobile">Mobile No</label>
                      <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"autocomplete="mobile" autofocus>
                      <font style="color: red;">
                      {{($errors->has('mobile'))?($errors->first('mobile')): ''}}
                    </font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"autocomplete="email" autofocus>
                      <font style="color: red;">
                      {{($errors->has('email'))?($errors->first('email')): ''}}
                    </font>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Address</label>
                      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"autocomplete="address" autofocus>
                      <font style="color: red;">
                      {{($errors->has('address'))?($errors->first('address')): ''}}
                    </font>
                    </div>

                    <div class="form-group col-md-6">
                      <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  
  <script>
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
            name: true,
          },
          mobile: {
            required: true,
          },
          address: {
            required: true,
          },
         
        },
        messages: {
          name: {
            required: "Please enter a name",
          },
          address: {
            required: "Please enter address ",
          },
          mobile: {
            required: "Please enter mobile ",
          },
        
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script> 
@endsection
