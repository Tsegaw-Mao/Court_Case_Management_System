<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class LegalCase extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    public function fileUploads(){
        return $this->hasMany(FileUpload::class);
    }
}
