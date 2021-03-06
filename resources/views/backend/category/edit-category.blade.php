@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                <h3>Edit Categories
                  <a href="{{route('categories.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>Categories List</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                {{-- {{$editData->id}} --}}
                <form action="{{route('categories.update', $editData->id)}}" method="post" id="myForm">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name"> Category Name</label>
                        <input id="name" value="{{$editData->category_name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                      <font style="color: red;">
                        {{($errors->has('name'))?($errors->first('name')):''}}
                      </font>
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
          name: {
            required: true,
            name: true,
          },
         
        },
        messages: {
          name: {
            required: "Please enter a name",
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
