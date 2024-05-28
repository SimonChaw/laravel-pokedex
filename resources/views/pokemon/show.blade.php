<!-- INDIVIDUAL pokemon -->

<x-layout>
    <div class="col-2 card">
        <img src="{{ $mon->url }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $mon->name }}</h5>
            <p class="card-text">{{ $mon->description }}</p>
            <a href="#" class="btn btn-primary">{{ $mon->type }}</a>
            <a href="/pokemon/" class="btn btn-primary">Back</a>
            
        </div>
    </div>
</x-layout>