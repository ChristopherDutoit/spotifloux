<div class="songs__list">
<h3>{{$type}}</h3>

<ul>
    @foreach($songs as $song)
    
    <li>
    
        <img src="{{$song->thumbnail_url}}"/>
        <div class="titre-musique"><a href="#" class="song" data-file="{{$song->url}}">{{$song['title']}}</a></div>
        
        <p class="poste">Posté par<p> <a href="/users/{{$song->user->id}}"> {{$song->user->name}}</a>
</li>   
    @endforeach
</ul>
</div>