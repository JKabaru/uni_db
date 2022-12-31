<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'department_id',
        'description'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function children()
    {
        return $this->hasMany(Staffmember::class, 'department_id');
    }


    
}
