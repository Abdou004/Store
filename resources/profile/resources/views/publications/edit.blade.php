<x-master title="Modifier"><h3>Modifier Publication</h3>
  
    @if ($errors->any())
        <x-alert type="danger">
          <h6>Errors : </h6>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
        </x-alert>
    @endif
  
  <form method="POST" action="{{route('publications.update',$publication->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
      <img src="{{asset('storage/' . $publication->image)}}" width="200" alt="">
    </div>
    <div class="mb-3">
      <label class="form-label">Titre</label>
      <input type="text" name="titre" value="{{old('titre',$publication->titre)}}"  class="form-control">
  
      @error('titre')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label class="form-label">Body</label>
      <input type="" name="body" value="{{old('body',$publication->body)}}"  class="form-control">
      @error('body')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image"  class="form-control">
      @error('image')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
  <div class="d-grid my-2">
    
    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
  
  </div>
  </form>
  
  </x-master>