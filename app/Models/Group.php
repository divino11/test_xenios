<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public const UPDATED_AT = null;

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
