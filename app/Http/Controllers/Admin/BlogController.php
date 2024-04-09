<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BlogTags;
use Auth;
use Str;

class BlogController extends Controller
{
    public function blog()
    {
        $getRecord = Blog::getRecord();
       return view('backend.blog.list',compact(['getRecord']));
    }
    /**
     * Show Blog information
     */
    public function add_blog()
    { 
        $getCategory = Category::getCategory();
        return view('backend.blog.add',compact(['getCategory']));
    }

    /**
     * Store Blog Information
     */
    public function store_blog_data(Request $request)
    {
        $save = new Blog;
        $save->user_id = Auth::user()->id;
        $save->title = trim($request->title);
        $save->category_id = trim($request->category_id);
        $save->description = trim($request->description);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status); 

        $slug = str::slug($request->title);

        $checkSlug = Blog::where('slug','=', $slug)->first();

        if(!empty($checkSlug))
        {
           $dbslug->$slug.'-'.$save->id;
        }else
        {
            $dbslug = $slug;
        }

        $save->slug = $dbslug;

        if(!empty($request->file('image_file')))
        {
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $dbslug.'-'.$ext;
            $file->move('upload/blog/',$filename);
            $save->image_file = $filename;
        }
        $save->save();
        BlogTags::insertDeleteTag($save->id,$request->tags);
        return redirect('panel/blog/list')->with('Sucess','Blog Created');
    }
 
    /**
     * Delete Blog
     */
    public function delete_blog($id){

        $delete = Blog::where('id','=',$id)->delete();
        return redirect('panel/blog/list')->with('Sucess','Blog Deleted');
    }

    /**
     * Edit Blog information
     */
    public function edit_blog($id)
    { 
        $getCategory = Category::getCategory();
        $getRecord = Blog::getSingle($id);
        return view('backend.blog.edit',compact(['getCategory','getRecord']));
    }

    /**
     * Update Blog Information
     */
    public function update_blog_data(Request $request,$id)
    {
        $update = Blog::getSingle($id);
        $update->title = trim($request->title);
        $update->category_id = trim($request->category_id);
        $update->description = trim($request->description);
        $update->meta_title = trim($request->meta_title);
        $update->meta_description = trim($request->meta_description);
        $update->meta_keywords = trim($request->meta_keywords);
        $update->status = trim($request->status); 

        if(!empty($request->file('image_file')))
        {
            if(!empty($update->getImage()))
            {
                unlink('upload/blog/'.$update->image_file);
            }

            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $update->slug.'.'.$ext;
            $file->move('upload/blog/',$filename);
            $update->image_file = $filename;
        }
        $update->save();

        BlogTags::insertDeleteTag($update->id,$request->tags);

        return redirect()->back()->with('Sucess','Blog Updated');
    }
 
}
