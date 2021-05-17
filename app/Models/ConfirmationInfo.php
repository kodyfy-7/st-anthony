<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationInfo extends Model
{
    use HasFactory;

    protected $table = 'confirmation_info';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
