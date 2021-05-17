<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'community_title', 'community_description', 'community_motto', 'community_time_meeting','community_profile_photo_path', 'community_slug'];

    public function getRouteKeyName()
    {
        return 'community_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
