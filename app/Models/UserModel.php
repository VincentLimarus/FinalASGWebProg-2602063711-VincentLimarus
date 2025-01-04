<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    protected $table = "users";
    protected $guarded = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at',
    ];
    // protected $fillable = [
    //     'name',
    //     'gender',
    //     'field_of_work',
    //     'linkedin',
    //     'mobile_number',
    //     'email',
    //     'password',
    //     'registration_price',
    // ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(TransactionModel::class);
    }

    public function works(): HasMany
    {
        return $this->hasMany(WorkModel::class);
    }
}
