<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defendant extends Model
{
    use HasFactory;
    protected $table = "defendants";
    protected $primaryKey = "UserId";
     protected $keyType = 'string';
     protected $fillable = [
      'UserId',
      'email',
      'FirstName',
  ];
     public function Cases(){
        return $this->belongsToMany( LegalCase::class);
     }
}
