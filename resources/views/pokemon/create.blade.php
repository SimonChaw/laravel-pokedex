<x-layout>
    <form method="POST" action="/pokemon" class="col-6 mx-auto">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
          @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea type="text" class="form-control" id="description" name="description">{{ old('description') }}</textarea>
          @error('description')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}"/>
            @error('url')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Type</label>
            <select class="form-select" aria-label="Default select example" id="type" name="type">
                <option value="" {{ old('type') == "" ? "selected" : "" }}>Select a Type</option>
                @foreach(\App\Models\Pokemon::TYPES as $type)
                    <option value="{{ $type }}" {{ old('type') == $type ? "selected" : "" }}> {{ $type }}</option>
                @endforeach
                </select>
            @error('type')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>