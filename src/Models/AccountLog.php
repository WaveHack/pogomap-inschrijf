<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
