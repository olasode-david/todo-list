<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Personaltodolist;
use Illuminate\Support\Facades\Auth;

class PersonaltodolistController extends Controller
{
    public function store(Request $request)
    {
        $store = $request->validate([
            'pname' =>'required',
            'pstatus' => 'required',
            'prioritys' => 'required',
            'date' => 'required',
            'type' => 'required',
            'phour' => 'required',
        ]);
        $store['user_id'] = Auth::user()->id;
        Personaltodolist::create($store);
        return redirect(route('home'))->with('message','😄Successfully uploaded a Personal todo-list');
    }

    public function edit(Personaltodolist $id)
    {
        return view('personal-todolist.edit',compact('id'));
    }

    public function update(Request $request, Personaltodolist $update)
    {   
        $save = $request->validate([
            'pname' => 'max:255',
            'pstatus' => 'max:255',
            'prioritys' => 'max:255',
            'date' => 'max:255',
            'type' => 'max:255',
            'phour' => 'max:255',
        ]);

        $save['user_id'] = Auth::user()->id;
            $update->update($save);

        return redirect(route('home'))->with('message','😄Successfully updated a Personal todo-list');
    }

    public function destroy($id)
    {
        Personaltodolist::destroy($id);

            return redirect(route('home'))->with('message','😄 Successfully delete a Personal todo-list'); 
    }
}
