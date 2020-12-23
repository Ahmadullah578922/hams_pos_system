<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
        $data['allData'] = Category::all();
        return view('backend.category.view-category', $data );
    }
    public function add(){
        return view('backend.category.add-category');
       }
       public function store(Request $request)
       {
           $this->validate($request, [
               //'usertype' => 'required',
               'name' => 'required',
           ]);
           $category = new Category ();
           $category->category_name = $request->name;
           $category->created_by = Auth::user()->id;
           $category->save();
           return redirect()->route('categories.view')->with('success', 'Data Inserted Successfully.');
    
       }
       public function edit($id)
       {
           $editData = Category::find($id);
           //dd($editData);
           return view('backend.category.edit-category', compact('editData'));
       }
    
       public function update(Request $request, $id)
       {
           $category = Category::find($id);
           $category->category_name = $request->name;
           $category->updated_by = Auth::user()->id;
           $category->save();
           return redirect()->route('categories.view')->with('success', 'Data Updated Successfully.');
    
       
       }
       public function destroy($id){
           $category = Category::find($id);
           $category->delete();
           return redirect()->route('categories.view')->with('success', 'Data Deleted Successfully.');
       }
}
