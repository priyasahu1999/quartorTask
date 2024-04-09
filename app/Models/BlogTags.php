<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    use HasFactory;

    protected $table = 'blog_tags';

    static function insertDeleteTag($blog_id, $tags)
    {
        BlogTags::where('blog_id','=',$blog_id)->delete();

        if(!empty($tags))
        {
            $tagsarray = explode(",",$tags);
            foreach($tagsarray as $tag)
            {
               $save = new BlogTags;
               $save->blog_id = $blog_id;
               $save->tag_name = $tag;
               $save->save();
            }
        }
    }
    

}
