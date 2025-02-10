<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = "languages";

    protected $fillable = [
        "name",
        "english_name",
        "native_name",
        "code",
        "direction"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function isLtr(): bool
    {
        return $this->direction === "ltr";
    }

    public static function getLtrLanguages()
    {
        return self::where("direction", "ltr")->get();
    }

    public function isRtl(): bool
    {
        return $this->direction === "rtl";
    }

    public static function getRtlLanguages()
    {
        return self::where("direction", "rtl")->get();
    }
}
