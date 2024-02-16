<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attorney extends Model
{
    use HasFactory;

    protected $table = "attorneys";
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
}
