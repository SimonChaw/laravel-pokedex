<!-- ALL pokemon -->

<x-layout>
    <h5>Here are our Pokémon!</h5>

    <div class="row py-4">
        <a href="/pokemon/create" class="col-3 btn btn-success mx-auto" allign=>Create New Pokemon</a>
    </div>
    
    <div class="row grid gap-0 column-gap-2 justify-content-center">
    @foreach($pokemon as $mon)
        <div class="col-3 card">
            <img src="{{ $mon->url }}" class="mx-auto card-img-top p-4" style="width:auto; height:150px;" alt="...">
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