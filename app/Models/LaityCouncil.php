<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaityCouncil extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'laity_role', 'laity_slug'];

    public function getRouteKeyName()
    {
        return 'laity_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
