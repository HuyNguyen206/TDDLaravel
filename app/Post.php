<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];
    public function getCreateAtAttribute(){
        return $this->created_at->toFormattedDateString();
    }
}
