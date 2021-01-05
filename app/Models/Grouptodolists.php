<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Groupname;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grouptodolists extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groupname()
    {
        return $this->belongsTo(Groupname::class, 'group_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
