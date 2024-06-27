<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActionType extends Model
{
    use HasFactory;

    protected $fillable = [];

    public $timestamps = false;


    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }
}
