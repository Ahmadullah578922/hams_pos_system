<?php


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'Frontend\FrontendController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin/dashboard', 'HomeController@index')->name('admin.dashboard');
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('users')->group(function(){
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::get('/destroy/{id}', 'Backend\UserController@destroy')->name('users.destroy');
    });
    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::post('/store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
        
    });
    Route::prefix('suppliers')->group(function(){
        Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::get('/destroy/{id}', 'Backend\SupplierController@destroy')->name('suppliers.destroy');
    });
    Route::prefix('customers')->group(function(){
        Route::get('/view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('/add', 'Backend\CustomerController@add')->name('customers.add');
        Route::post('/store', 'Backend\CustomerController@store')->name('customers.store');
        Route::get('/edit/{id}', 'Backend\CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'Backend\CustomerController@update')->name('customers.update');
        Route::get('/destroy/{id}', 'Backend\CustomerController@destroy')->name('customers.destroy');
        Route::get('/credit', 'Backend\CustomerController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf', 'Backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'Backend\CustomerController@editInvoice')->name('customers.edit.invoice');
        Route::post('/invoice/update/{invoice_id}', 'Backend\CustomerController@updateInvoice')->name('customers.update.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}', 'Backend\CustomerController@invoiceDetailPdf')->name('invoice.details.pdf');
        Route::get('/paid', 'Backend\CustomerController@paidCustomer')->name('customers.paid');
        Route::get('/paid/pdf', 'Backend\CustomerController@paidCustomerPdf')->name('customers.paid.pdf');
    });
    Route::prefix('units')->group(function(){
        Route::get('/view', 'Backend\UnitController@view')->name('units.view');
        Route::get('/add', 'Backend\UnitController@add')->name('units.add');
        Route::post('/store', 'Backend\UnitController@store')->name('units.store');
        Route::get('/edit/{id}', 'Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
        Route::get('/destroy/{id}', 'Backend\UnitController@destroy')->name('units.destroy');
    });
    Route::prefix('categories ')->group(function(){
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::get('/destroy/{id}', 'Backend\CategoryController@destroy')->name('categories.destroy');
    });
    Route::prefix('products')->group(function(){
        Route::get('/view', 'Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'Backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('products.update');
        Route::get('/destroy/{id}', 'Backend\ProductController@destroy')->name('products.destroy');
    });
    Route::prefix('purchase')->group(function(){
        Route::get('/view', 'Backend\PurchaseController@view')->name('purchase.view');
        Route::get('/add', 'Backend\PurchaseController@add')->name('purchase.add');
        Route::post('/store', 'Backend\PurchaseController@store')->name('purchase.store');
        Route::get('/pending/', 'Backend\PurchaseController@pendingList')->name('purchase.pending.list');
        Route::get('/approve/{id}', 'Backend\PurchaseController@approve')->name('purchase.approve');
        Route::get('/destroy/{id}', 'Backend\PurchaseController@destroy')->name('purchase.destroy');
        Route::get('/report', 'Backend\PurchaseController@purchaseReport')->name('purchase.daily.report');
        Route::get('/report/pdf', 'Backend\PurchaseController@purchaseReportPdf')->name('purchase.report.pdf');
      
    });
    Route::get('/get-category','Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product','Backend\DefaultController@getProduct')->name('get-product');
     Route::get('/get-stock','Backend\DefaultController@getStock')->name('check-product-stock');


    Route::prefix('invoice')->group(function(){
        Route::get('/view', 'Backend\InvoiceController@view')->name('invoice.view');
        Route::get('/add', 'Backend\InvoiceController@add')->name('invoice.add');
        Route::post('/store', 'Backend\InvoiceController@store')->name('invoice.store');
        Route::get('/pending/', 'Backend\InvoiceController@pendingList')->name('invoice.pending.list');
        Route::get('/approve/{id}', 'Backend\InvoiceController@approve')->name('invoice.approve');
        Route::get('/destroy/{id}', 'Backend\InvoiceController@destroy')->name('invoice.destroy');
         Route::post('/approve/store/{id}', 'Backend\InvoiceController@approvalStore')->name('approval.store');
         Route::get('/print/list', 'Backend\InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/{id}', 'Backend\InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/daily/report', 'Backend\InvoiceController@dailyReport')->name('invoice.daily.report');
        Route::get('/daily/report/pdf', 'Backend\InvoiceController@dailyReportPdf')->name('invoice.daily.report.pdf');
    });

    Route::prefix('stock')->group(function(){
        Route::get('/report', 'Backend\StockController@stockReport')->name('stock.report');
        Route::get('/report/pdf', 'Backend\StockController@stockReportPdf')->name('stock.report.pdf');
        Route::get('/report/supplier/product/wise', 'Backend\StockController@supplierProductWise')->name('stock.report.supplier.product.wise');
        Route::get('/report/supplier/wise/pdf', 'Backend\StockController@supplierWisePdf')->name('stock.report.supplier.wise.pdf');
        Route::get('/report/product/wise/pdf', 'Backend\StockController@productWisePdf')->name('stock.report.product.wise.pdf');
    });
});


    