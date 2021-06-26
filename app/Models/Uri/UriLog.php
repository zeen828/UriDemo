<?php

namespace App\Models\Uri;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UriLog extends Model
{
    use HasFactory;

    // 資料庫名稱
    protected $table = 'uri_log';
    // 欄位名稱
    protected $fillable = [
        'name', 'code', 'logo', 'description', 'description_zh', 'website', 'currency',
        'sort',
        // 狀態
        'status',
    ];
    // 隱藏不顯示欄位
    // protected $hidden = [];
}
