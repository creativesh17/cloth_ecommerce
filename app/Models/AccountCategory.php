<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function account_log_income() {
        return $this->hasMany(AccountLog::class, 'account_category_id')->where('type', 'income');
    }

    public function account_log_expense() {
        return $this->hasMany(AccountLog::class, 'account_category_id')->where('type', 'expense');
    }

}
