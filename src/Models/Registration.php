<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function account()
    {
        return $this->hasOne(Account::class);
    }
}
