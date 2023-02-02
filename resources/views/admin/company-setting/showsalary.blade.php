@extends('admin.admin_layouts')
@section('admin.content')
<style type="text/css">
  
 

.a{

margin-left: 70%;
margin-bottom:20px;
}

.fw-bolder{

font-size:18px;


}

.c{

  font-size:16px;
}





</style>
<?php
// Create a function for converting the amount in words
function numberTowords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
    $get_divider = ($x == 2) ? 10 : 100;
    $amount = floor($num % $get_divider);
    $num = floor($num / $get_divider);
    $x += $get_divider == 10 ? 1 : 2;
    if ($amount) {
      $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
      $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
      $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
      '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
      '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
    }else $string[] = null;
    
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'TK ' : '') . $get_paise;
}

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Salary Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="row no-print">
                <div class="col-12 mb-4">
                  <button type="button" id="print" class="btn btn-default"><i class="fas fa-print"></i>Print
                  </button>
                  
                    
                  
                  <button type="button" class="btn btn-primary" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <a class="a"><img src="https://kkrenterprise.net/frontend/assets/img/kkr.png"></a>

              <div class="text-center lh-1 mb-2">
                <h4 class="fw-bold">Payslip</h4> <span class="fw-normal">Payment slip for the month of {{$salary->month}} {{$salary->year}}</span>
            </div>
             
              <!-- info row -->
        <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
             <div class="row invoice-info">
                <div class="col-sm-6 invoice-col" style="padding: 30px;">
                  <address>
                    
                    Employee ID:{{$staff->em_id}}<br>
                    Name:{{$staff->name}}<br>
                    Phone:{{$staff->phone}}<br>
                    Email:{{$staff->email}}<br>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col float-right" style="padding: 30px;">
                  <address>
                    
                    Date Of Joining:{{$staff->Dateofjoining}}<br>
                    Department:{{$staff->Department}}<br>
                    Designation:{{$staff->position}}<br>
                    Payment Date:{{$salary->date}}<br>
                   
                   
      

                    
                    
                  </address>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
              </div>
            </div>
            
            <div class="row">
               
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic</th>
                            <td>{{$salary->amount}}</td>
                            <td>Late Fine</td>
                            <td>{{$salary->LateFine}}</td>
                        </tr>
                        <tr>
                            <th scope="row">DA</th>
                            <td>{{$salary->DA}}</td>
                            <td>Absence</td>
                            <td>{{$salary->Absence}}</td>
                        </tr>
                        <tr>
                            <th scope="row">TA</th>
                            <td>{{$salary->TA}}</td>
                             <td colspan="2"></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">SalesIncentive</th>
                            <td>{{$salary->SalesIncentive}}</td>
                             <td colspan="2"></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Bonus</th>
                            <td>{{$salary->Bonus}}</td>
                             <td colspan="2"></td>
                            
                        </tr>
                      
                       
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            @php

                           $total=$salary->amount+$salary->DA+$salary->TA+$salary->SalesIncentive+$salary->Bonus

                            @endphp
                            <td>{{$total}} TK</td>
                            @php
                             
                             $totald=$salary->Absence+$salary->LateFine;

                            @endphp
                            <td>Total Deductions</td>
                            <td>{{$totald}} TK</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6 invoice-col" style="padding: 30px;"> <br> <span class="fw-bold">Net Pay : {{$income=$total-$totald}} TK</span> </div>
                <div class="col-sm-6 invoice-col border" style="padding: 30px;">
                  <?php
    
      $num = $income=$total-$totald;
      $get_amount= numberTowords($num);
      
    
  ?>
                    <div class=""> <span>In Words:</span> <span>{{$get_amount}}</span> </div>
                </div>
            </div>
            <div class="row mt-4">
             <div class="col-sm-6 invoice-col" style="">
               
               <span class="fw-bolder">{{$salary->name}}</span><br><br> <span class="mt-4">-----------------------------------</span>
             </div>
              <div class="col-sm-6 invoice-col content-justify-end" style="margin-left: 330px;">
               
               <span class="fw-bolder">Rajib Sarkar</span><br><br> <span class="mt-4">-----------------------------------</span>
             </div>

            </div>
            
        </div>
    </div>
</div>


	     </div><!-- modal-body -->
	            
	              </div>
	            </div>
	          </div><!-- modal-dialog -->
                                                            </tbody>
                        </table>
                    </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
           
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	
 $('#print').on("click", function () {
      $('.invoice').printThis();
    });




</script>















@endsection