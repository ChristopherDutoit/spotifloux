<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\test;


class test extends Controller 
{
    public function index(){
        $songs = Song::all(); // SELECT * From songs,
        //$s = Song::find(1); // SELECT * from songs where id=1 
        // on a fait $s =Song::find(1) avant de le mettre en commentaire
        //echo $s->title;die(1); // DELETE from songs where id=1
        
        //modifier

        $lastSongs = Song::orderBy('created_at', 'desc')->take(10)->get();
        return view("test.index", ["lastSongs"=>$lastSongs]);
    }
    public function about(){
        return view("test.about");
    }
    public function article($id) {
        return view("test.article", ["id" => $id]);
    }
    public function nouvellechanson(){
        return view("test.nouvellechanson");
    }

        public function storechanson(Request $request){
            $request->validate([
                'title' =>'required|max:50|min:3',
                'note' =>'required|integer|max:10|min:0',
                'song' =>'required|mimes:ogg,mp3',
                'thumbnail' =>'required|mimes:jpg,jpeg,png',
            ]);
        $songname = $request->file('song')->hashName();
        $request->file('song')->move("songs/".Auth::id(), $songname);

        $thumbnailname = $request->file('thumbnail')->hashName();
        $request->file('thumbnail')->move("img/".Auth::id(), $thumbnailname);

        $s =new Song();
        $s->url = "/songs/".Auth::id()."/$songname";
        $s->thumbnail_url = "/img/".Auth::id()."/$thumbnailname";
        $s->title = $request->input("title");
        $s->note = $request->input("note");
        $s->user_id = Auth::id();
        $s->save();
        return redirect("/");
    }

    public function users($id){
        $user = User::findOrFail($id);
        return view("test.users", ["user" => $user]);
    }

    public function suivre($id){
        $user = User::findOrFail($id);
        Auth::user()->IfollowThem()->toggle($id);
        return back();
    }
}
