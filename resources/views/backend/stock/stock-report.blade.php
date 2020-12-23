@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stocks</li>
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
                <h3>Stock Report List
                  <a href="{{route('stock.report.pdf')}}" class="btn btn-success float-right btn-sm" target="_blank"><i class="fa fa-download btn-sm"></i>Download PDF </a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Supplier Name</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th>In.Qty</th>
                      <th>Out.Qty</th>
                      <th>Stock</th>
                      <th>Unit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $product)
                    @php
                      $buying_total = App\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');

                      $selling_total = App\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');

                    @endphp
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$product['supplier']['name']}}</td>
                      <td>{{$product['category']['category_name']}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$buying_total}}</td>
                      <td>{{$selling_total}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product['unit']['name']}}</td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
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
@endsection
