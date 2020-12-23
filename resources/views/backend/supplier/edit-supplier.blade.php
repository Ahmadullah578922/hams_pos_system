@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Suppliers </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3>Edit Supplier
                  <a href="{{route('suppliers.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>Suppliers List</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                {{-- {{$editData->id}} --}}
                <form action="{{route('suppliers.update', $editData->id)}}" method="post" id="myForm">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name">Supplier Name</label>
                        <input id="name" value="{{$editData->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                      <font style="color: red;">
                        {{($errors->has('name'))?($errors->first('name')):''}}
                      </font>
                      </div>
                       <div class="form-group col-md-6">
                        <label for="mobile">Mobile No</label>
                        <input id="mobile" value="{{$editData->mobile}}" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" autocomplete="mobile" autofocus>
                        <font style="color: red;">
                        {{($errors->has('mobile'))?($errors->first('mobile')): ''}}
                      </font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$editData->email}}" autocomplete="email" autofocus>
                        <font style="color: red;">
                        {{($errors->has('email'))?($errors->first('email')): ''}}
                      </font>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{$editData->address}}" name="address" autocomplete="address" autofocus>
                        <font style="color: red;">
                        {{($errors->has('address'))?($errors->first('address')): ''}}
                      </font>
                      </div>
  
                      <div class="form-group col-md-6">
                        <input type="submit" value="update" class="btn btn-primary">
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
          email: {
            required: true,
            email: true,
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
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
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
