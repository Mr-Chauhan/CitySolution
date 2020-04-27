<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Complains extends Model
{
    use Sluggable;
    
    protected $fillable = ['varName','varEmail','varPhone','fkCateId','varTitle','slug','varMessage','varImage','chrStatus',
'varAdminCmt'];

public function ComplainCategory()
    {
        return $this->belongsTo('App\Complain_Category', 'fkCateId');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'varTitle',
                'unique' => true,
                'onUpdate'=>true
            ]
        ];
    }


}
