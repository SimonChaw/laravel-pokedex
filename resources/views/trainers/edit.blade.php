<x-layout>
    <!-- HTTP forms only take POST requests, so I need to use Laravel to have a PUT request for updating pokemons. -->
    <form method="POST" action="/trainers/{{$editTrainer->id}}" class="col-6 mx-auto">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $editTrainer->name) }}"/>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $editTrainer->url) }}"/>
            @error('url')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>