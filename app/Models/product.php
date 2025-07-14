<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name','size_id','color_id'];

    public function color(){
        return $this->belongsTo(Size::class); 
    }

    public function size(){
        return $this->belongsTo(Color::class);
    }
}
