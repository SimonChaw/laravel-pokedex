<!-- ALL pokemon -->

<x-layout>
    <h5>Here are our Pokémon!</h5>
    <div class="row grid gap-0 column-gap-2">
    @foreach($pokemon as $mon)
        <div class="col-2 card">
            <img src="{{ $mon->url }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $mon->name }}</h5>
                <p class="card-text">{{ $mon->description }}</p>
                <a href="#" class="btn btn-primary">{{ $mon->type }}</a>
                <a href="/pokemon/{{  $mon->id }}"
                    class="btn btn-primary">View</a>
            </div>
        </div>
    @endforeach
    </div>
</x-layout>