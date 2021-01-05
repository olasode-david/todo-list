<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\User;
use App\Models\Groupname;
use App\Models\Grouptodolists;
use App\Models\Personaltodolist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd();
        if (Personaltodolist::where('user_id', Auth::user()->id )->first()) {
            $personal = Personaltodolist::where('user_id', Auth::user()->id )->get();
            // Personaltodolist::find(Auth::user()->id)->get();
        } else {
           $personal = 'hello';
        }
        
        $set = User::find(Auth::user()->id)->personal;
        $group  = User::find(Auth::user()->id)->groupname;
            //checking before echoing out the tag name 
            if (Groupname::where('user_id',Auth::user()->id)->first()) {
                $glist = Groupname::find($group->first()->id)->tag()->get();
            } else {
                 $glist = "hello";
            }
            //end of the if statement
            //checking before echoing out the gname
            if (Grouptodolists::where('user_id', Auth::user()->id)->first()) 
            {
                $gname = Groupname::find(Auth::user()->id)->grouptodo;
            } else {
                $gname = "hello";
            }
            //end of if statement
    
            //New query if statement for sure
            //checking the tag table for auth()->user()->name if exist
            if (Tag::where('name', Auth::user()->name)->first()) {
    
               $tag = Tag::where('name', Auth::user()->name)->first();
               $look = $tag->gname()->first();//getting the groupname
                //getting the user todo-list
               $outlist = Grouptodolists::where('group_id', $tag->gname()->pluck('id')->first())->get();
                    //getting the users name to allow the user be able to update 
               $outst = Grouptodolists::where('group_id', $tag->gname()->pluck('id')->first())->first();
               if($outst == "")
               {
                   $few = 'hello';
                    $outst = "";
               }else{
                    $take =  Tag::where('gname_id', $outst->group_id)->get();
    
                    foreach ($take as $key) {
                        if($key->name == Auth::user()->name)
                        {
                            $few = $key->name;
                        }
                    } 
                    
               }
               
            } else {
                $look = "hello";
                $outlist = "hello";
                $few = "hello";
            }
        
            
        return view('home',[
            'personals' => $personal,
            'groupName' => $group,
            'groupTodo' => $gname,
            'lists' => $glist,
            'outs' => $outlist,
            'looks' => $look,
            'takes' => $few,
        ]);
    }
}
