<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AvatarModel extends Model
{
    protected $table = 'avatars';
    protected $guarded = [];
    
    public function transaction(): HasMany
    {
        return $this->hasMany(TransactionModel::class);
    }

}
