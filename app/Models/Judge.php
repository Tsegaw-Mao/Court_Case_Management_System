<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;
    protected $table = "judges";
    protected $primaryKey = "UserId";
     protected $keyType = 'string';

    public function Cases(){
        return $this->hasMany(LegalCase::class);
    }
}
