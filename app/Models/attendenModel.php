<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendenModel extends Model
{
   	public  $table = "attenden";
    public  $primiaryKey = 'id';
    public  $incrementing = true;
    public  $KeyType = 'int';
    public  $timestamps = false;
}
