<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [ 'name','notes','time','address','phone','address','company','email','website','appointment'];
}
