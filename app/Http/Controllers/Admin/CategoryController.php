<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Category;
use Auth;
use Hash;
use Str;

class CategoryController extends Controller
{
    public function category(){

        $getRecord = Category::getRecord();
        return view('backend.category.list',compact(['getRecord']));
    }

    /**
     * Get category form
     */
    public function add_category(){

        return view('backend.category.add');
    }

    /**
     * Store Categroy Information
     */
    public function store_category_data(Request $request)
    {

        $save = new Category;
        $save->name = trim($request->name);
        $save->slug = trim(str::slug($request->name));
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status); 
        $save->save();

        return redirect('panel/category/list')->with('Sucess','category Added');
    }
    
    /**
     * Delete Category
     */
    public function delete_category($id){

        // $user = User::select('*')->where('id','=',$id)->delete();
        $save = Category::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('panel/category/list')->with('Sucess','Category Deleted');
    }

    /**
     * Edit Category Data
     */
    public function edit_category(Request $request, $id='')
    {

        $getCategoryData = Category::getSingle($id);
        return view('backend.category.edit', compact(['getCategoryData']));
    }

    /**
     * Update Category information
     */
    public function update_category_data(Request $request, $id)
    {
        // Find the Category by ID  
        $update = Category::find($id);
        $update->name = trim($request->name);
        $update->slug = trim(str::slug($request->name));
        $update->title = trim($request->title);
        $update->meta_title = trim($request->meta_title);
        $update->meta_description = trim($request->meta_description);
        $update->meta_keywords = trim($request->meta_keywords);
        $update->status = trim($request->status); 
        $update->save();
        // Redirect with success message
        return redirect()->back()->with('success', 'Category updated');
    }
}
