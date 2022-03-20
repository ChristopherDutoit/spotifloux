<div class="songs__list">
<h3>{{$type}}</h3>

<ul>
    @foreach($songs as $song)
    

    <li>
        <a href="#" class="song" data-file="{{$song->url}}">{{$song['title']}}</a>
        
        Posté par <a href="/users/{{$song->user->id}}"> {{$song->user->name}}</a>
</li>
    @endforeach
</ul>
</div>