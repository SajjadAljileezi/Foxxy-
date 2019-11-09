<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name','company','address','phone','email','website','keywords','active','facebook','twitter','ourwebsite',
    'notes','price','call_back','is_call_back','adword','adword_phrases','adword_start','adword_end',
'city_campaign','closer_name','packages','canceled_date','review_managment'];
}
