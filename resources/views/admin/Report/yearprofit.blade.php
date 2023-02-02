@extends('admin.admin_layouts')
@section('admin.content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content mt-4">
      <div class="row">
        <div class="col-12">
          
            <!-- /.card-header -->
            
          <!-- /.card -->

          <div class="card">
          	<div class="container">

            <div class="row mb-10">
          <div class="col-sm-8 p-3">
            <h4>This year Profit List</h4>
            <h3 style="color:red">This year Total Profit {{$total}} TK</h3>
            </div>
        




       
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                   <th>Date</th>
                 <th>Name</th>
                 <th>qty</th>
                 <th>Profit</th>
                </tr>
              </thead>
       @foreach($profit as $data)
        <tbody>
         
        <tr>
        <td>{{$data->day}}-{{$data->month}}-{{$data->year}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->qty}}</td>
         <td>{{$data->profit}}</td>
          
    
        
        
        </tr>
        @endforeach
        
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>









@endsection