<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use App\Supplier;
use App\Category;
use App\Product;
use App\Purchase;
use Auth;
use DB;
use PDF;

class PurchaseController extends Controller
{
    public function view(){
       // $data['products'] = Product::all();
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
      // dd( $data);
        return view('backend.purchase.view-purchase', compact('allData'));
    }
    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        // $data['products'] = Product::all();
       // dd($data);
        return view('backend.purchase.add-purchase',$data);
       }
    public function store(Request $request)
       {
        // dd("ok");

         if($request->category_id == null){
          return redirect()->back()->with('error', 'Sorry! you do not select any item');
         }else{
          $count_category = count($request->category_id);
          for($i=0; $i<$count_category; $i++){

            $purchase = new Purchase();
            $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
            $purchase->purchase_no = $request->purchase_no[$i];
            $purchase->supplier_id = $request->supplier_id[$i];
            $purchase->category_id = $request->category_id[$i];
            $purchase->product_id = $request->product_id[$i];
            $purchase->buying_qty = $request->buying_qty[$i];
            $purchase->unit_price = $request->unit_price[$i];
            $purchase->buying_price = $request->buying_price[$i];
            $purchase->description = $request->description[$i];
            $purchase->created_by = Auth::user()->id;
            $purchase->status = '0';
              //dd($purchase);
            $purchase->save();
          }
         } 

         return redirect()->route('purchase.view')->with('success', 'Data Saved Successfully.');
       }

       public function destroy($id){
        $purchase = Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchase.view')->with('success', 'Data Deleted Successfully.');
    }
      
    public function pendingList(){
         // $data['products'] = Product::all();
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
      // dd( $data);
        return view('backend.purchase.view-pending-list', compact('allData'));
    }

      public function approve($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save()){
          DB::table('purchases')
            ->where('id', $id)
            ->update(['status' => 1]);
        }

        return redirect()->route('purchase.pending.list')->with('success', 'Data Approved Successfully.');
    }

    public function purchaseReport(){
      return view('backend.purchase.daily-purchase-report');
}

public function purchaseReportPdf(Request $request){
    $sdate = date('Y-m-d', strtotime($request->start_date));
    $edate = date('Y-m-d', strtotime($request->end_date));
    $data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->orderBy('supplier_id')->orderBy('category_id')->orderBy('product_id')->get();
    $data['start_date']=date('Y-m-d', strtotime($request->start_date));
    $data['end_date']=date('Y-m-d', strtotime($request->end_date));
    $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('purchase.pdf');

  }

  }
