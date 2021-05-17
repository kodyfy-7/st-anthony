<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','council_role', 'council_status', 'council_slug'];

    public function getRouteKeyName()
    {
        return 'council_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
