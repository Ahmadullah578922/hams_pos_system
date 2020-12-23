@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                <h3>Edit Profile
                  <a href="{{route('profiles.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>Your Profile</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                {{-- {{$editData->id}} --}}
                <form action="{{route('profiles.update')}}" method="post" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
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
                    <div class="form-group col-md-4">
                        <label for="mobile">Mobile</label>
                        <input id="mobile" type="text" value="{{$editData->mobile}}" class="form-control @error('mobile') is-invalid @enderror" name="mobile" autocomplete="mobile" autofocus>
                        <font style="color: red;">
                      {{($errors->has('mobile'))?($errors->first('mobile')): ''}}
                        </font>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Address</label>
                        <input id="address" type="text" value="{{$editData->address}}" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address" autofocus>
                        <font style="color: red;">
                      {{($errors->has('address'))?($errors->first('address')): ''}}
                        </font>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="gender">Gender</label>
                      <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                        <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
                      </select>
                      <font style="color: red;">
                        {{($errors->has('gender'))?($errors->first('gender')):''}}
                      </font>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image">Image</label>
                        <input id="image" name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <img id="showImage" src="{{(!empty($editData->image))?asset('/upload/user_images/'. $editData->image):asset('/upload/no_image.jpg')}}" style="width:150px; height:150px;border:1px solid #000;"  alt="">
                    </div>
                    <div class="form-group col-md-6" style="padding-top: 30px;">
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
