<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;
    protected $table = "legal_cases";
    protected $primaryKey = 'Case_Id';
    protected $keyType = 'string';

    protected $fillable = [
        "Case_Id",
        "Case_Title",
        "Case_Type",
        "Case_Details",
    ];
    public static function validate($request)
    {
        $request->validate([
            'id' => "required|max:10",
            "title" => "required|max:255",
            "type" => "required|max:255",
            "detail" => "required|max:5000",
        ]);
    }
}
