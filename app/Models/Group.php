<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'group_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grps()
    {
        return $this->hasMany(MemberGroup::class);
    }
    
    public function summaries()
    {
        return $this->hasMany(GroupSummary::class);
    }
}
