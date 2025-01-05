<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(AvatarModel::class);
    }
}
