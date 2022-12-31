<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffmember extends Model
{
    protected $fillable = [
        'user_id',        
        'department_id' ,              
        'gender',
        'phone',
        'dateofbirth',
        'current_address',
        'permanent_address',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    
    public function department() 
    {
        
        return $this->belongsTo(Department::class);
    }
    
    
    

  
}
