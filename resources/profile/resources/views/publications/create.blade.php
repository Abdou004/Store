<x-master title="Ajouter"><h3>Ajouter Publication</h3>
  
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
  <form method="POST" action="{{route('publications.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Titre</label>
      <input type="text" name="titre" value="{{old('titre')}}"  class="form-control">
  
      @error('titre')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label class="form-label">Body</label>
      <input type="" name="body" value="{{old('body')}}"  class="form-control">
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
    
    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
  
  </div>
  </form>
  
  </x-master>