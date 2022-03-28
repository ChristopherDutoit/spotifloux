<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\test;
use DB;


class test extends Controller 
{
    public function index(){
        $songs = Song::all(); // SELECT * From songs,
        //$s = Song::find(1); // SELECT * from songs where id=1 
        // on a fait $s =Song::find(1) avant de le mettre en commentaire
        //echo $s->title;die(1); // DELETE from songs where id=1
        
        //modifier
        
        $lastSongs = Song::orderBy('created_at', 'desc')->take(10)->get();

        if(Auth::id()){
        $playlists = Playlist::where('user_id', 'like', Auth::id())->get();
        $followSongs = Song::join('connection', 'connection.to_id', 'songs.user_id')->where('connection.from_id','like',Auth::id())->get();
        return view("test.index", ["lastSongs"=>$lastSongs, "followSongs"=>$followSongs, "playlists"=>$playlists]);
        }else{
            return view("test.index", ["lastSongs"=>$lastSongs]);
        }
    }

    public function destroy($id){
        $user_id = Song::where('id', 'like', $id)->value('user_id');
        if($user_id == Auth::id()){
        DB::delete('delete from songs where id = ?',[$id]);
        return redirect('/');
        
        }else{
            return redirect('/');
        }
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

    public function searchPage(){
        return view("test.searchPage");
    }

    public function searchAction(Request $request){
        if($request->ajax()){
            $output ='';
            $query = $request->get('query');
            if($query !=''){
                $data = DB::table('songs')
                ->where('title', 'like', '%'.$query.'%')
                ->orderBy('id', 'desc')
                ->get();
            }else{
                $data = DB::table('songs')
                ->orderBy('id', 'desc')
                ->get();
            }

            $total_row = $data->count();
            if($total_row > 0 ){
                foreach($data as $row){
                    $output .='   <li>
                                        <img src="'.$row->thumbnail_url.'"/>
                                        <a href="#" class="song" data-file='.$row->url.'>'.$row->title.'</a>
                                        Posté par <a href="/users/'.$row->user_id.'"> je sais pas comment récup le nom</a>
                                </li>   ';
                }
            }else{
                $output = 'no data found';
            }
            
            $data = array(
                'table_data' => $output,
                'total_data' => "1",
            );

            echo json_encode($data);

        }
    }

    public function nouvellePlaylist(){
        return view("test.playlist");

    }


    public function createPlaylist(Request $request){
        $request->validate([
            'title' =>'required|max:50|min:3',
        ]);

    $p =new Playlist();
    $p->title = $request->input("title");
    $p->user_id = Auth::id();
    $p->save();
    return redirect("/");
}

public function playlists($id){

    $songs = Song::join('playlist_song', 'playlist_song.song_id', 'songs.id')->where('playlist_song.id','like',$id)->get();
    return view("test.showPlaylist", ["id" => $id,"songs"=>$songs]);

}
}
