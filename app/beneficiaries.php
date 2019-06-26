<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beneficiaries extends Model
{
    protected $fillable = ['NIN','surname','other_names','Age','district','sub_county','Amount','Schedule','payment_status','SNo'];
    protected $hidden = ['NIN','user_id','created_at','updated_at','id','surname','other_names','Age','Amount','Schedule','payment_status','SNo'];
}
