<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkModel extends Model
{
    protected $table = 'works';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}   
