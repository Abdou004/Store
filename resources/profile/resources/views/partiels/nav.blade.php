<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Social Network</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
             <a class="nav-link" href="{{route('homepage')}}">Accueil</a>
        </li>

        <li class="nav-item">
             <a class="nav-link" href="{{route('profiles.index')}}">Tout les profiles</a>
        </li>

        <li class="nav-item">
             <a class="nav-link" href="{{route('profiles.create')}}">Ajouter Profile</a>
       
            </li>
        <li class="nav-item">
             <a class="nav-link" href="{{route('publications.index')}}">Publications</a>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login.show')}}">Se Connect</a>
        </li> 
        @endguest
    


      
          
        @auth
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('publications.create')}}">Ajouter Publication</a>
        </li>
      </ul>

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{auth()->user()->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="{{route('login.logout')}}">Deconnexion</a>
        </div>
      </div>
      @endauth
     
    </div>
  </nav>