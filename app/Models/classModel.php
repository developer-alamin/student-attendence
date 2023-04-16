<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classModel extends Model
{
    protected  $table = "class";
    protected  $primiaryKey = 'id';
    public  $incrementing = true;
    protected  $KeyType = 'int';
    public  $timestamps = true;
}
