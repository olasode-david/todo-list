<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupname extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function grouptodo()
    {
        return $this->hasMany(Grouptodolists::class,'group_id');
    }

    public function tag()
    {
        return $this->hasMany(Tag::class, 'gname_id');
    }
}
