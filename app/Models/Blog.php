<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
 
    static public function getRecord(){

        $return = self::select('blogs.*','users.name as users_name','categories.name as categories_name')
            ->join('users','users.id','=','blogs.user_id')
            ->join('categories', 'categories.id','=','blogs.category_id');

            //  if(!empty(Request::get('id')))
            //  {
            //     $return = $return->where('blogs.id','=' ,Request::get('id'));
            //  }

             if(!empty(Request::get('username')))
             {
                $return = $return->where('users.name', 'like', '%'.Request::get('username').'%');
             }

                if(!empty(Request::get('title')))
                {
                    $return = $return->where('blogs.title', 'like', '%'.Request::get('title').'%');
                }

             if(!empty(Request::get('category')))
             {
                $return = $return->where('categories.name', 'like', '%'.Request::get('category').'%');
             }

             if(!empty(Request::get('status')))
             {
                $status = (Request::get('status'));
                if($status == 100)
                {
                    $status = 0;
                }
                $return = $return->where('blogs.status','=' ,Request::get('status'));
             }

             if(!empty(Request::get('start_date')))
             {
                $return = $return->whereDate('blogs.created_at','>=' ,Request::get('start_date'));
             }

             if(!empty(Request::get('end_date')))
             {
                $return = $return->whereDate('blogs.created_at','<=' ,Request::get('end_date'));
             }

            $return = $return->where('blogs.is_delete','=',0)
            ->orderBy('id','desc')
            ->paginate(20);
        return $return;    
    }

    public function getImage()
    {
        if(!empty($this->image_file) && file_exists('upload/blog/'.$this->image_file))
        {
            return url('upload/blog/'.$this->image_file);
        }
        else
        {
            return "";
        }

    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    // get all data

    public function getTag()
    {
        return $this->hasMany(BlogTags::class,'blog_id');
    }
}
