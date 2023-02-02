@extends('admin.admin_layouts')
@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            @php

       $suppier=DB::Table('suppilers')->get();





            @endphp
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($suppier)}}</h3>

                <p>Supplier</p>
              </div>
              
              <a href="{{url('admin/suppiler/manage-supplier')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @php

                 $product=DB::Table('products')->get();

                @endphp
                <h3>{{count($product)}}</h3>

                <p>Total Product</p>
              </div>
              
              <a href="{{url('admin/product/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            @php

        $today=date('d');
       
       $today_order=DB::table('orders')->where('day',$today)->sum('TotalAmount');

            @endphp
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$today_order}} TK</h3>

                <p>Today Order</p>
              </div>
             
              <a href="{{url('admin/report/today-income')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 @php

        $month=date('m');
       
       $month_order=DB::table('orders')->where('month',$month)->sum('TotalAmount');

            @endphp
                <h3>{{$month_order}} TK</h3>

                <p>This Month Order</p>
              </div>
              
              <a href="{{url('admin/report/month-income')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            @php
            $y=date('Y');

       $year=DB::Table('orders')->where('year',$y)->sum('TotalAmount');

   @endphp
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$year}} TK</h3>

                <p>This Year Income</p>
              </div>
              
              <a href="{{url('admin/report/year-income')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            @php

        $today=date('d');
       
       $today_expense=DB::table('expensives')->where('day',$today)->sum('amount');
       $todaypur=DB::Table('purchases')->where('day',$today)->sum('totalamount');

       $total=$today_expense+$todaypur;

            @endphp
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total}} TK</h3>

                <p>Today Expense</p>
              </div>
             
              <a href="{{url('admin/report/daily-expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            @php

        $month=date('m');
       
       $month_expense=DB::table('expensives')->where('month',$month)->sum('amount');
       $monthpur=DB::Table('purchases')->where('month',$month)->sum('totalamount');

       $total=$month_expense+$monthpur;


            @endphp
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total}} TK</h3>

                <p>This Month Expense</p>
              </div>
             
              <a href="{{url('admin/report/month-expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            @php

        $yaer=date('Y');
       
       $year_expense=DB::table('expensives')->where('year',$yaer)->sum('amount');
       $yearpur=DB::Table('purchases')->where('year',$yaer)->sum('totalamount');

       $total=$year_expense+$yearpur;

            @endphp
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$total}} TK</h3>

                <p>This Year Expense</p>
              </div>
             
              <a href="{{url('admin/report/year-expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @php
                $month=date('m');

                 $profitmonth=DB::Table('profit_details')->where('month',$month)->sum('profit');

                @endphp
                <h3>{{$profitmonth}} TK</h3>

                <p>This Month Profit</p>
              </div>
              
              <a href="{{url('admin/report/monthprofit')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @php
                $yaer=date('Y');

                 $profityear=DB::Table('profit_details')->where('year',$yaer)->sum('profit');

                @endphp
                <h3>{{$profityear}} TK</h3>

                <p>This Year Profit</p>
              </div>
              
              <a href="{{url('admin/report/monthprofit')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">LAST 5 INCOME</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  @php
                    
                    $last=DB::Table('orders')->latest('id')->get();

                  @endphp
                  <tbody>
                    @foreach($last as $data)
                    <tr>
                      <td>{{$data->invoice_date}}</td>
                      <td>Product Sell</td>
                      <td>
                        {{$data->TotalAmount}} TK
                      </td>
                      <td><a href="{{url('admin/sales/show-single-invoice-show',$data->invoiceid)}}" class="btn btn-primary">View Details</a></td>

                    </tr>
                    @endforeach
                   
                  
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">LAST 5 Expense</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  @php
              
                $lastex=DB::Table('purchases')->latest('id')->get();

                  @endphp
                  <tbody>
                    @foreach($lastex as $data)
                    <tr>
                      <td>{{$data->order_data}}</td>
                      <td>Product Purchase</td>
                      <td>
                       {{$data->totalamount}} TK
                      </td>
                      <td><a href="{{route('admin.showpurchase',['invoice'=>$data->invoice_id,'suppler' =>$data->suppiler])}}" class="btn btn-danger">View Details</a></td>

                    </tr>
                    @endforeach
                   
                  
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://kkrenterprise.net/">KKR ENTERPRISE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>


















@endsection