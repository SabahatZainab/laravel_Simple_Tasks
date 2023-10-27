<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','father_name','address','class','profile','school_id'];
    
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
