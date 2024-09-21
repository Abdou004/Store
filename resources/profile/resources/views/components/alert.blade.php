@props(['type','text'])
<div>
    <div class="alert alert-{{$type}}" role="alert">
        {{$slot}}
    </div>
</div>