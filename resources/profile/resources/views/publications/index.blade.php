<x-master title="Publications"><h3>Publications</h3>

    <div class="container w-50 mx-auto">
<div class="row">
    @foreach ($publication as $publication)
        <x-publication :canUpdate="auth()->check() && auth()->user()->id === $publication->profile_id" :publication="$publication"/>
    @endforeach
</div>

</div>
</div>


</x-master>
