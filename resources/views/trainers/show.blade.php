<!-- INDIVIDUAL trainers and their teams -->

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

    <!-- Pokemon card: -->
    <label>Add to {{ $trainer->name }}'s Team:</label>
    <form method="POST", action="/trainers/{{ $trainer->id }}/add-mon">
        @csrf
        <input type="text" class="form-control" id="name" name="name"
        placeholder="Pokemon name" style="width: 250px" value="{{ old('name') }}">
        <input type="text" class="form-control" id="nickname" name="nickname"
        placeholder="Pokemon nickname" style="width: 250px" value="{{ old('nickname') }}">
        <button type="submit" class="btn btn-success">Enter</button>
    </form>
    <br>
    <div class="row">
        @foreach ($pokemon as $monDisplay)
            <div class="col-lg-2 mb-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <img src="{{ $monDisplay->url }}" class="mx-auto card-img-top p-4" style="width:auto; height:150px;" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $monDisplay->pivot->nickname }} ({{ $monDisplay->name }})</h5>
                        <p class="card-text flex-grow-1">{{ $monDisplay->description }}</p>
                        <div>
                            <a href="#" class="btn btn-primary">{{ $monDisplay->type }}</a>
                            <a href="/pokemon/{{  $monDisplay->id }}" class="btn btn-primary">View</a>
                            <form method="POST" action="{{ "/trainers/" . $trainer->id . "/remove-mon/" . $monDisplay->pivot->id}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                                
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nameModal{{ $monDisplay->pivot->id }}">
                                Edit name?
                            </button>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="nameModal{{ $monDisplay->pivot->id }}" tabindex="-1" aria-labelledby="nameModal{{ $monDisplay->pivot->id }}Label" aria-hidden="{{ $errors->has("newNickname") ? "false" : "true" }}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="nameModal{{ $monDisplay->pivot->id }}Label">Edit name?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="/trainers/{{$trainer->id}}/update-name/{{ $monDisplay->pivot->id }}" class="col-6 mx-auto">
                                        @csrf
                                        @method("PUT")
                                        <div class="modal-body">
                                            <input type="text" class="form-control" id="nickname" name="newNickname"
                                            placeholder="Pokemon nickname" style="width: 250px" value="{{ old('newNickname', $monDisplay->pivot->nickname) }}">
                                            @error('newNickname')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
</x-layout>