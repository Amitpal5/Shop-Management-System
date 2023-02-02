<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\companycontroller;
use App\Http\Controllers\Admin\SuppilerController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\ExpensiveController;
use App\Http\Controllers\Admin\ReportController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontendController::class,'index'])->name('fro.home');
Route::get('/redirect',[FrontendController::class,'redirect']);

// Admin//

Route::get('admin/dashboard',[Admincontroller::class,'dashboard']);
Route::get('admin/logout',[AdminController::class,'adminlogout'])->name('admin.logout');


// Company Settings//

Route::get('admin/company-setting/staff',[companycontroller::class,'staff'])->name('admin.staff');
Route::post('addf',[companycontroller::class,'addstaff'])->name('admin.addstaff');
Route::get('admin/company-setting/manage-staff',[companycontroller::class,'managestaff'])->name('admin.managestaff');
Route::post('upss',[companycontroller::class,'updatestaff'])->name('admin.updatestaff');
Route::get('admin/staff-delete/{id}',[companycontroller::class,'deletestaff']);
Route::get('admin/staff-setting/salary',[companycontroller::class,'salary'])->name('admin.staffsalary');
Route::post('aadss',[companycontroller::class,'addsalary'])->name('admin.addsalary');
Route::post('aadup',[companycontroller::class,'updatesalary'])->name('admin.updatesalary');
Route::get('admin/salary-delete/{id}',[companycontroller::class,'deletesalary']);
Route::get('admin/salary-showsalary/{id}/{emid}',[companycontroller::class,'showsalary'])->name('admin.showsalary');
Route::get('admin/company-setting/payment-method',[companycontroller::class,'paymentmethod'])->name('admin.paymentmethod');
Route::post('addpa',[companycontroller::class,'addpaymentmethod'])->name('admin.addpaymentmethod');
Route::post('admin/company-setting/update/paymentmethod',[companycontroller::class,'updatepaymentmethod'])->name('admin.updatepayment');
Route::get('admin/paymentmethod/delete/{id}',[companycontroller::class,'deletepaymentmethod']);

Route::get('admin/company-setting/vat',[companycontroller::class,'vat'])->name('admin.vat');
Route::post('admin/company-setting/add-vat',[companycontroller::class,'addvat'])->name('admin.addvat');
Route::post('admin/company-setting/update-vat',[companycontroller::class,'updatevat'])->name('admin.updatevat');
Route::get('admin/update-vat/delete/{id}',[companycontroller::class,'deletevat']);
Route::get('admin/company-setting/compant-information',[companycontroller::class,'companyinformation'])->name('admin.companyinformation');
Route::post('admin/company-setting/update-information',[companycontroller::class,'updateinformation'])->name('admin.companyinformation.update');


// suppiler Management//

Route::get('admin/suppiler/add-suppiler',[SuppilerController::class,'suppiler'])->name('admin.suppiler');
Route::post('admin/suppiler/addsuppiler',[SuppilerController::class,'addsuppiler'])->name('admin.addsuppiler');
Route::get('admin/suppiler/manage-supplier',[SuppilerController::class,'maangesupplier'])->name('admin.maangesupplier');
Route::post('admin/suppiler/update-supplier',[SuppilerController::class,'updatesupplier'])->name('admin.updatesupplier');
Route::get('admin/suppiler/delete-supplier/{id}',[SuppilerController::class,'deletesuppiler']);


// Purchase Management//

Route::get('admin/Purchase/add-Purchase',[PurchaseController::class,'purchase'])->name('admin.purchase');
Route::post('admin/Purchase/addpurchase',[PurchaseController::class,'addpurchase'])->name('admin.addpurchase');
Route::post('admin/purchase/make-payment',[PurchaseController::class,'makepayment'])->name('admin.makepayment');
Route::get('admin/Purchase/manage-purchase',[PurchaseController::class,'managepurchase'])->name('admin.mangepurchase');
Route::get('admin/Purchase/edit-purchase/{invoice}/{suppler}',[PurchaseController::class,'editpurchase'])->name('admin.editpurchase');
Route::post('admin/Purchase/update-purchase',[PurchaseController::class,'updatepurchase'])->name('admin.upadte.purchase');
Route::get('admin/Purchase/show-purchase/{invoice}/{suppler}',[PurchaseController::class,'showpurchase'])->name('admin.showpurchase');
Route::get('admin/Purchase/delete-purchase/{id}',[PurchaseController::class,'deletepurchase']);
Route::get('admin/Purchase/Cash-list',[PurchaseController::class,'cashlist']);
Route::get('admin/Purchase/Due-list',[PurchaseController::class,'duelist']);
Route::get('admin/purchase/print/{invoice}/{suppler}',[PurchaseController::class,'purchasepdf'])->name('admin.purchase.print');



// Product Management//

Route::get('admin/product/manage',[ProductController::class,'manageproduct'])->name('admin.manageproduct');
Route::post('admin/product/add-product',[ProductController::class,'addproduct'])->name('admin.add.products');
Route::post('admin/product/update-product',[ProductController::class,'updateproduct'])->name('admin.add.updateproduct');
Route::get('admin/product/delete-product/{id}',[ProductController::class,'deleteproduct']);


// Sales Management//

Route::get('admin/Sales/add-sales',[SalesController::class,'sales'])->name('admin.main.sales');
Route::post('autocomplete',[SalesController::class,'fetch'])->name('autocomplete.fetch');
Route::get('add/to/product/{id}',[SalesController::class,'addcart']);
Route::get('/fetch_data',[SalesController::class,'fetchdata']);
Route::get('add/to/reset',[SalesController::class,'reset']);
Route::get('product/delete/{id}',[SalesController::class,'deletecart']);
Route::post('product/update/sales',[SalesController::class,'updatecart']);
Route::post('admin/sales/invoice',[SalesController::class,'addinvocie'])->name('admin.sales.invoice');
Route::get('admin/sales/invoice-list',[SalesController::class,'manageinvocie'])->name('admin.invocie.manage');
Route::get('admin/sales/show-single-invoice-show/{id}',[SalesController::class,'singleinvoiceshow']);
Route::get('admin/sales/single-invoice-edit/{id}',[SalesController::class,'editinvoicelist']);
Route::post('admin/sales/single-invoice-update',[SalesController::class,'updateinvoicelist'])->name('admin.invoice.update');
Route::get('admin/sales/delete-sales/{id}/{invoiceid}',[SalesController::class,'deletesales'])->name('admin.sales.delete');
Route::get('admin/sales/customerpdf/{invoiceid}',[SalesController::class,'customerpdf']);



// Admin Daily Expensive//

Route::get('/daily-expensive',[ExpensiveController::class,'expensive'])->name('admin.dailyexpense');
Route::post('add-daily-expensive',[ExpensiveController::class,'addexpense'])->name('admin.add.daily.expense');
Route::post('update-daily-expense',[ExpensiveController::class,'updateexpense'])->name('admin.update.expense');
Route::get('admin/delete-expense/{id}',[ExpensiveController::class,'deleteexpense']);


// Admin Report Management//

Route::get('admin/report/today-income',[ReportController::class,'todayincome']);
Route::get('admin/report/month-income',[ReportController::class,'monthincome']);
Route::get('admin/report/year-income',[ReportController::class,'yearincome']);
Route::get('admin/report/daily-expense',[ReportController::class,'dailyexpense']);
Route::get('admin/report/month-expense',[ReportController::class,'monthexpense']);
Route::get('admin/report/year-expense',[ReportController::class,'yearexpense']);
Route::get('admin/report/monthprofit',[ReportController::class,'monthprofit']);
Route::get('admin/report/yearprofit',[ReportController::class,'yearprofit']);





