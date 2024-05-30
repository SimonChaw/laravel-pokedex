<!-- ALL pokemon -->

<x-layout>
    <h5>Here are our Pokémon!</h5>

    
    <!--
    <button type="button" class="btn btn-primary" data-toggle="button"
    aria-pressed="false" autocomplete="off" style="float: right;">
        Delete?
    </button>

    <div class="btn-group-toggle" data-toggle="buttons" style="float: right;">
        <label class="btn btn-secondary active">
            <input type="checkbox" checked autocomplete="off"> Select Pokemon
        </label>
    </div>
    -->

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