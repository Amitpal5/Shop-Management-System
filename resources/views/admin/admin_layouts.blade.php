<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.cs')}}s">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
 @guest

     @else
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <h3>{{Auth::user()->name}}</h3>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Profile
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('admin.logout')}}" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i>Log out
          </a>
          
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
      
      <span class="brand-text font-weight-light">SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
          
          
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Company Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Staff Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/company-setting/staff')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Add Staff</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/company-setting/manage-staff')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Manage Staff</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/staff-setting/salary')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Salary Staff</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/company-setting/payment-method')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Method</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/company-setting/vat')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tax</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/company-setting/compant-information')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Information</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Supplier Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{url('admin/suppiler/add-suppiler')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/suppiler/manage-supplier')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Supplier</p>
                </a>
              </li>
            </ul>
          </li>

                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Purchase Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{url('admin/Purchase/add-Purchase')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Purchase Order</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/Purchase/manage-purchase')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/Purchase/Cash-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash List</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/Purchase/Due-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/product/manage')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-cart-plus"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{url('admin/Sales/add-sales')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Invoice</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/sales/invoice-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice List</p>
                </a>
              </li>
            </ul>
          </li>

             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Transcation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{url('/daily-expensive')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Daily Expense</p>
                </a>
              </li>
              
            </ul>
          </li>

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa fa-file"></i>
              <p>
                Report Managemnt
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             
           
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="{{url('admin/report/today-income')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Income</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/report/month-income')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/report/year-income')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Income</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('admin/report/daily-expense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Expense</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('admin/report/month-expense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/report/year-expense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/report/monthprofit')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Profit</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('admin/report/yearprofit')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Profit</p>
                </a>
              </li>
            </ul>
          </li>

           
          
              
            
              
         
         
          
          
         
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 
@endguest
      
      @yield('admin.content')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="d{{asset('backend/dist/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/printThis.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.success("{{ session('message') }}");
  @endif
  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.error("{{ session('error') }}");
  @endif
  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.info("{{ session('info') }}");
  @endif
  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.warning("{{ session('warning') }}");
  @endif
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>
