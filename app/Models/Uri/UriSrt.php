<?php

namespace App\Models\Uri;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UriSrt extends Model
{
    use HasFactory;

    // 資料庫名稱
    protected $table = 'uri_srt';
    // 欄位名稱
    protected $fillable = [
        'srt', 'url', 'access', 'status', 'expire_at',
    ];
    // 隱藏不顯示欄位
    // protected $hidden = [];
}
