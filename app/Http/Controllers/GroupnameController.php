<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Groupname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupnameController extends Controller
{
    public function create()
    {
        return view('group-name.create');
    }

    public function store(Request $request)
    {
        $store = $request->validate([
            'gname' => 'required'
        ]);
        $store['user_id'] = Auth::user()->id;
        $store['owner'] = 'Admin';
        Groupname::create($store);
        return redirect(route('home'))->with('message','😆 Successfully created a group');
    }

    public function join($id)
    {
        if (Tag::where('name', Auth::user()->name)->first()) {
            return redirect(route('home'))->with('message','User exists 😼');
        } else {
            Tag::create([
            'gname_id' => $id,
            'name' => Auth::user()->name
            ]);

            return redirect(route('home'))->with('message','😆 Successfully Joined a group');
        }
    }
}
