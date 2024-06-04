<!-- INDIVIDUAL trainers -->

<x-layout>
    <div class="row grid gap-0 column-gap-2 justify-content-center">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $trainer->url }}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $trainer->name }}</h5>
                    <p class="card-text"><small class="text-muted">[Licensed Trainer]</small></p>
                    <a href="/trainers" class="btn btn-secondary">Back</a>

                    <form method="POST" action="{{ "/trainers/" . $trainer->id }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a href="/trainers/{{ $trainer->id }}/edit" class="btn btn-success">Edit</a>
                    <a href="/trainers/{{ $trainer->id }}/items" class="btn btn-primary">Items</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <label>Add to {{ $trainer->name }}'s Team:</label>
    <form method="POST", action="/trainers/{{ $trainer->id }}/add-mon">
        @csrf
        <input type="text" class="form-control" id="name" name="name"
        placeholder="Pokemon name" style="width: 250px" value="{{ old('name') }}">
        <input type="text" class="form-control" id="nickname" name="nickname"
        placeholder="Pokemon nickname" style="width: 250px" value="{{ old('nickname') }}">
        <button type="submit" class="btn btn-success">Enter</button>
    </form>

</x-layout>