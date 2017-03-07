<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function logs()
    {
        return $this->hasMany(AccountLog::class);
    }

    public function uniqueIpCount()
    {
        return $this->logs()
            ->selectRaw('account_id, count(*) as aggregate')
            ->groupBy('account_id', 'ip_address');
    }
}
