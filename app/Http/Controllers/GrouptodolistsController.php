<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Grouptodolists;
use Illuminate\Support\Facades\Auth;

class GrouptodolistsController extends Controller
{
    public function store(Request $request)
    {
        $store = $request->validate([
            'tname' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'ddate' => 'required',
            'ttype' => 'required',
            'hour' => 'required'
        ]);
        
        $store['user_id'] = Auth::user()->id;
        $store['group_id'] = User::find(Auth::user()->id)->groupname->pluck('id')->first();
        $store['gname'] = User::find(Auth::user()->id)->groupname->pluck('gname')->first();
        $save =  Grouptodolists::create($store);
        $save->tags()->attach(request('assignee'));
        return redirect(route('home'))->with('message','😄Successfully uploaded a Group todo-list');
    }

    public function edit($id)
    {
        $gtodolist = Grouptodolists::where('id', $id)->first();
        return view('group-todolist.edit',[
            'groupTodo' => $gtodolist
        ]);
    }

    public function update(Request $request, Grouptodolists $update)
    {
        $save = $request->validate([
            'tname' => 'max:255',
            'status' => 'max:255',
            'priority' => 'max:255',
            'ddate' => 'max:255',
            'ttype' => 'max:255',
            'assignee' =>'max:255',
            'hour' => 'max:255'
        ]);
        $save['user_id'] = Auth::user()->id;
        $save['group_id'] = User::find(Auth::user()->id)->groupname->pluck('id')->first();
        $save['gname'] = User::find(Auth::user()->id)->groupname->pluck('gname')->first();
            $update->update($save);
        return redirect(route('home'))->with('message','😄Successfully Edited a Group todo-list');
    }

    public function singleView($single)
    {
        $gtodolist = Grouptodolists::where('id', $single)->first();
        return view('group-todolist.edit2-0',[
            'groupTodo' => $gtodolist
        ]);
    }

    public function updateSingle(Request $request, Grouptodolists $singles)
    {
        $sync = $request->validate([
            'tname' => 'max:255',
            'status' => 'max:255',
            'priority' => 'max:255',
            'ddate' => 'max:255',
            'ttype' => 'max:255',
            'hour' => 'max:255'
        ]);

        $sync['user_id'] = request('user_id');
        $sync['group_id'] = request('group_id');
        $sync['gname'] = request('gname');

            $singles->update($sync);

        return redirect(route('home'))->with('message','😄Successfully Edited a Group todo-list');
    }

    public function destroy($id)
    {
        Grouptodolists::destroy($id);

        return redirect(route('home'))->with('message','😄Successfully uploaded a Group todo-list');;
    }
}
