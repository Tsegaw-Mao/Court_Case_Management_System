<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
    use HasFactory;
    protected $table="clerks";
    protected $primaryKey = "UserId";
     protected $keyType = 'string';
     public function Cases(){
        return $this->belongsToMany( LegalCase::class);
     }
    
}
