<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class FriendModel extends Model
{
    protected $table = 'friends';
    protected $guarded = [
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    
    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'friend_id');
    }
}
