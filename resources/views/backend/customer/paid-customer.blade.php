@extends('backend.layouts.master')
@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Paid Customers </h1>
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
                <h3> Paid  Customers List
                  <a href="{{route('customers.paid.pdf')}}" class="btn btn-success float-right btn-sm" target="_blank"><i class="fa fa-download btn-sm"></i>Download Pdf</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Customer Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $total_paid = '0';
                    @endphp
                    @foreach($allData as $key => $payment)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>

                      {{$payment['customer']['name']}}
                      ({{$payment['customer']['mobile']}}-{{$payment['customer']['address']}})

                    </td>
                      <td>Invoice No #{{$payment['invoice']['invoice_no']}}</td>
                      <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                      <td>{{$payment->paid_amount}} Tk</td>
                      <td>
                       
                        <a title="Details" href="{{route('invoice.details.pdf', $payment->invoice_id)}}" class="btn btn-sm btn-success" target="_blank" ><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                      @php
                        $total_paid += $payment->paid_amount;
                      @endphp
                    @endforeach
                  </tbody>
                </table>
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td colspan="5" style="text-align: right;font-weight: bold;">Grand Total</td>
                      <td><strong>{{ $total_paid }} Tk</strong></td>
                    </tr>
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
