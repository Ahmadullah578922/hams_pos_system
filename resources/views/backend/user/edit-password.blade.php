@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Password </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
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
                <h3>Edit Password</h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                <form action="{{route('profiles.password.update')}}" method="post" id="myForm">
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-4">
                      <label for="current_password">Current Password</label>
                      <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password" autofocus>
                      <font style="color: red;">
                      {{($errors->has('current_password'))?($errors->first('current_password')): ''}}
                    </font>
                    </div>
                      <div class="form-group col-md-4">
                        <label for="new_password">New Password</label>
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new_password" autofocus>
                      <font style="color: red;">
                        {{($errors->has('new_password'))?($errors->first('new_password')): ''}}
                      </font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="again_new_password">Again New Password</label>
                      <input id="again_new_password" type="password" class="form-control @error('again_new_password') is-invalid @enderror" name="again_new_password" autocomplete="again_new_password" autofocus>
                    <font style="color: red;">
                      {{($errors->has('again_new_password'))?($errors->first('again_new_password')): ''}}
                    </font>
                  </div>
                    <div class="form-groupz col-md-6">
                      <input type="submit" value="Update" class="btn btn-primary">
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
          current_password: {
            required: true,
          },
          new_password: {
            required: true,
            minlength: 6
          },
          again_new_password: {
            required: true,
            equalTo: '#new_password'
          },
        },
        messages: {
          current_password: {
            required: "Please provide your current password",
          },
          new_password: {
            required: "Please enter new password",
            minlength: "Your password must be at least 6 characters long"
          },
          again_new_password: {
            required: "Please enter your new password again",
            equalTo: 'again new password and new password does not match',
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
