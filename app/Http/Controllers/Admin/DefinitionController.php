<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Definition;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DefinitionController extends Controller
{
    public function getDefinitions()
    {
        if (!Auth::user()){
            return redirect('/');
        }
        $user = Auth::user();

        if ($user->role_id != 1){
            return redirect('/');
        }
        $definitions = Definition::orderBy('created_at','desc')->paginate(12);

        return view('admin.definitions',compact('definitions','user'));
    }

    public function getWaitingDefinitions()
    {
        $definitions = Definition::where('approved',0)->orderBy('created_at','desc')->paginate(12);
        $user = Auth::user();

        return view('admin.definitions_not_approved',compact('definitions','user'));
    }

    public function getSingleDefinition($id)
    {
        $definition = Definition::whereId($id)->first();
        $user = Auth::user();
        $comments = Comment::where('post_id',$definition->id)->where('comm_type','App\Definition')->get();
        $likes = Like::where('likeable_id',$definition->id)->where('likeable_type','App\Definition')->get();

        return view('admin.definition_single',compact('definition','user','comments','likes'));
    }

    public function approve($id)
    {
        $definition = Definition::whereId($id)->first();
        $definition->approved = 1;
        $definition->save();

        return back()->with('success','Definicija je odobrena');
    }

    public function refuse($id)
    {
        $definition = Definition::whereId($id)->first();
        $definition->approved = 0;
        $definition->save();

        return back()->with('error','Definicija je odbijena');
    }

    public function delete($id)
    {
        $definition = Definition::whereId($id)->first();
        $comments = Comment::where('post_id',$definition->id)->where('comm_type','App\Definition')->get();

        if ($comments){
            foreach ($comments as $comment){
                $comment->delete();
            }
        }

        $definition->delete();


        return redirect('/admin/definitions');
    }
}
