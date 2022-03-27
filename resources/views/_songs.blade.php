<div class="songs__list">
<h3>{{$type}}</h3>

<ul>
    @foreach($songs as $song)
    
    <li>
    
        <img src="{{$song->thumbnail_url}}"/>
        <div class="titre-musique"><a href="#" class="song" data-file="{{$song->url}}">{{$song['title']}}</a></div>
        
        <p class="poste">Posté par<p> <a href="/users/{{$song->user->id}}"> {{$song->user->name}}</a>
        @if($song->user_id == Auth::id())
        <form action="delete/{{$song->id}}" method="POST">
        {{csrf_field()}}    
        
        <input type="submit" class="btn btn-outline-danger" value="supprimer"> 


        </form>
        @endif
</li>   
    @endforeach
</ul>
</div>