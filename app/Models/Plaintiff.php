<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaintiff extends Model
{
    use HasFactory;
    protected $table = "plaintiffs";
    protected $primaryKey = "UserId";
     protected $keyType = 'string';

    public function Case(){
        return $this->hasOne(LegalCase::class);
    }
}
