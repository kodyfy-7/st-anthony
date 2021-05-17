<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaptismInfo extends Model
{
    use HasFactory;

    protected $table = 'baptism_info';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
