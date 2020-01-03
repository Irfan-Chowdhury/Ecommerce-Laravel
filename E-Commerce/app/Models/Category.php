<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /*
    *ParentorNot
    *
    *Checking that if the Category is Parent or Not
    *
    *@param int $parent_id
    *@param int $child_id
    */ 
    public static function ParentorNot($parent_id , $child_id)
    {
        $categories = Category::where('id',$child_id)
                                ->where('parent_id',$parent_id)
                                ->get();
        
        if ( !is_null($categories)) 
        {
            return true;  //for child
        }
        else {
            return false; //for Parent
        }
    }
}
