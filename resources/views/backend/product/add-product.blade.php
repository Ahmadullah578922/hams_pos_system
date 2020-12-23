@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                <h3>Add Product
                  <a href="{{route('products.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list btn-sm"></i>Product List</a>
                </h3>
              </div><!-- /.card-header -->
              {{-- @include('alert.messages')  --}}
              <div class="card-body">
                <form action="{{route('products.store')}}" method="post" id="myForm">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="supplier_id">Supplier Name</label>
                      <select name="supplier_id" id="supplier_id"  class="form-control">
                        <option value="">Select Supplier </option>
                        @foreach ($suppliers as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="unit_id">Units</label>
                      <select name="unit_id"  class="form-control">
                        <option value="">Select Unit</option>
                        @foreach ($units as $unit)
                          <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="category_name">Category</label>
                      <select name="category_id"  class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Product Name</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autocomplete="name" autofocus>
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
          supplier_id:{
            required: true,
          },
          unit_id:{
            required: true,
          },
          category_name:{
            required: true,
          },
          name:{
            required: true,
          },
         
        },
        messages: {
          category_id:{
            required: "Please enter a name",
          },
          // email: {
          //   required: "Please enter a email address",
          //   email: "Please enter a vaild email address"
          // },
          // address: {
          //   required: "Please enter address ",
          // },
          // mobile: {
          //   required: "Please enter mobile ",
          // },
        
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
