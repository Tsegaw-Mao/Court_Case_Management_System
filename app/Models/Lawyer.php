<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;
    protected $table = "lawyers";
    protected $primaryKey = "UserId";
     protected $keyType = 'string';
     protected $fillable = [
        'UserId',
        'email',
        'FirstName',
    ];

    public function Cases(){
        return $this->hasMany(LegalCase::class);
    }
    public function Plaintiffs(){
        return $this->hasMany(Plaintiff::class);
    }
    public function Defendants(){
        return $this->hasMany(Defendant::class);
    }
}
