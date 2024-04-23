<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account_category() {
        return $this->belongsTo(AccountCategory::class, 'account_category_id', 'id');
    }

    public function account_log_attachment() {
        return $this->hasMany(AccountLogAttachment::class, 'account_log_id', 'id');
    }
}
