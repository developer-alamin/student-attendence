<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crouseModel extends Model
{
    protected  $table = "crouse";
    protected  $primiaryKey = 'id';
    public  $incrementing = true;
    protected  $KeyType = 'int';
    public  $timestamps = false;
}
