<x-master title="Mon Profile"><h3>Profiles</h3>
    <div class="my-5 row">
    @foreach ($profiles as $profile)

    <x-profile-card :profile="$profile" />
        
     @endforeach
    </div>

    {{$profiles->links()}}


</x-master>
