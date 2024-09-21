<x-master title="Ajouter"><h3>Modifier Profile</h3>
  
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

<form method="POST" action="{{ route('profiles.update',$profile->id) }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="mb-3">
    <label class="form-label">Nome Complet</label>
    <input type="text" name="name" value="{{ old('name',$profile->name) }}"  class="form-control">

    @error('name')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label class="form-label">E-mail</label>
    <input type="email" name="email" value="{{ old('email',$profile->email) }}"  class="form-control">
    @error('email')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">mot de passe</label>
    <input type="password" name="password" class="form-control">
    @error('password')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>


  <div class="mb-3">
    <label class="form-label">Confirme le mot de passe</label>
    <input type="password" name="password_confirmation"  class="form-control">
    @error('confirm')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea class="form-control" name="bio" >{{ old('bio',$profile->bio) }}</textarea>
    @error('bio')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
<div class="d-grid my-2">
  
  <button type="submit" class="btn btn-primary btn-block">Modifier</button>

</div>
</form>

</x-master>