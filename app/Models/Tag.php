<?php

namespace App\Models;

use App\Models\Grouptodolists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gname()
    {
        return $this->belongsTo(Groupname::class, 'gname_id');
    }

    public function lists()
    {
        return $this->belongsToMany(Grouptodolists::class)->withTimestamps();
    }
}
