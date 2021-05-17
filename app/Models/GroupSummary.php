<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSummary extends Model
{
    use HasFactory;
    
    protected $fillable = ['group_id', 'summary', 'summary_slug'];
    public function getRouteKeyName()
    {
          return 'summary_slug';
    }
  
    public function group()
    {
      return $this->belongsTo(Group::class);
    }

}
