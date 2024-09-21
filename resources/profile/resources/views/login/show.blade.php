<x-master title="Se Connecter">
    <div class="container w-75 my-2 bg-light p-5">
        <h3>Authentification</h3>
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
        @error('email')
             <div class="text-danger">{{$message}}</div> 
        @enderror
        </div>
        <div class="mb-3">
        <label class="form-label"> Mot de passe</label>
        <input type="password" name="password" class="form-control">
        </div>
        <div class="d-grid">
        <button class="btn btn-primary">Se connecter</button>
        </div>
        </form>
        </div>
</x-master>