@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3>Edit User
                  <a href="{{route('users.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>User List</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                {{-- {{$editData->id}} --}}
                <form action="{{route('users.update', $editData->id)}}" method="post" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="usertype">User Role</label>
                      <select name="usertype" id="usertype" class="form-control">
                        <option value="">Select Role</option>
                        <option value="Admin" {{($editData->usertype=="Admin")?"selected":""}}>Admin</option>
                        <option value="User" {{($editData->usertype=="User")?"selected":""}}>User</option>
                      </select>
                      <font style="color: red;">
                        {{($errors->has('usertype'))?($errors->first('usertype')):''}}
                      </font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="usertype">Name</label>
                    <input id="name" type="name" value="{{$editData->name}}"class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                    <font style="color: red;">
                      {{($errors->has('name'))?($errors->first('name')):''}}
                    </font>
                    </div>
                     <div class="form-group col-md-4">
                      <label for="email">Email</label>
                      <input id="email" type="email" value="{{$editData->email}}" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" autofocus>
                      <font style="color: red;">
                      {{($errors->has('email'))?($errors->first('email')): ''}}
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
          usertype: {
            required: true,
          },
          name: {
            required: true,
            name: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
            required: true,
            equalTo: '#password'
          },
        },
        messages: {
          usertype: {
            required: "Please select user role",
          },
          name: {
            required: "Please enter a name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          password2: {
            required: "Please enter confirm password",
            equalTo: 'Confirm password does not match',
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
