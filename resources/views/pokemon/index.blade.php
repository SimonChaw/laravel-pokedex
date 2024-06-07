<!-- ALL pokemon -->

<x-layout>
    <h5>Here are our Pokemon!</h5>
    <br>

    <!-- Search by name -->
    <form method="GET" action="/pokemon">
        <div class="form-group">
            <label for="name">Search by name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Pokemon name">
        </div>
        <button @style([ "background-color:Crimson", "color:White"]) type="submit" class="btn">Search</button>
      </form>

    <!-- Navigate to create new mons -->
    <div class="row py-4">
        <a href="/pokemon/create" class="col-3 btn btn-success mx-auto" allign=>Create New Pokemon</a>
    </div>
    
    <!-- See all mons -->
    <div class="row grid gap-0 column-gap-2 justify-content-center">
    @foreach($pokemon as $mon)
        <div class="col-3 card">
            <img src="{{ $mon->url }}" class="mx-auto card-img-top p-4" style="width:auto; height:150px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $mon->name }}</h5>
                <p class="card-text">{{ $mon->description }}</p>
                <form method="GET" action="/pokemon">

                    <button @style([
                        "background-color:" . \App\Models\Pokemon::typeColor($mon->type), "color:white"
                    ]) type="submit" class="btn">{{ $mon->type }}</button>
                    
                    <input type="hidden" value="{{ $lastSearch }}" name="name"/>
                    <input type="hidden" value="{{ $mon->type }}" name="type"/>
                    <a href="/pokemon/{{  $mon->id }}" class="btn btn-primary">View</a>
                </form>
            </div>
        </div>
    @endforeach
    </div>
</x-layout>