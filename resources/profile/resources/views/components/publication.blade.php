<div class="card my-2 bg-light">
    <div class="card-body">
        @auth
        @if ($canUpdate === true)
            
        <a class="float-end btn btn-primary btn-sm" href="{{route('publications.edit',$publication->id)}}">Modifier</a>
        <form action="{{route('publications.destroy',$publication->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('voulez vous vraiment supprimer cette publication')" class="float-end btn btn-danger btn-sm mx-2">Supprimer</button>
        </form>
        
        @endif    
        @endauth
    <blockquote class="blockquote mb-0">
      <div class="container">
        <div class="row align-items-center">
        <div class="col-md-4">
          <img class=" my-4" src="{{asset('storage/'.$publication->profile->image)}}" width="80">
        </div>
        <div class="col">
          {{$publication->profile->name}}
        </div>
      </div>
      <hr>
      </div>
      <p>{{$publication->titre}}</p>
      <p>{{$publication->body}}</p>
      @empty($publication->id)
          @else
          <footer  class="blockquote-footer">
            <cite title="Source title"><img class="img-fluid my-3"  src="{{ asset('storage/'. $publication->image) }}" alt=""></cite></footer>
        </blockquote>
      @endempty
  </div>
</div>