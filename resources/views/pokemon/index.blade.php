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

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/pokemon/create" class="btn btn-success" allign=>Create</a>
    </div>
    
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