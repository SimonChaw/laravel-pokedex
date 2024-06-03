<x-layout>
    <form method="POST" action="/trainers/{{ $trainer_id }}/items/{{ $editItem->id }}" class="col-6 mx-auto">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" disabled class="form-control disabled" id="name" name="name" value="{{ old('name', $editItem->name) }}"/>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $editItem->quantity) }}"/>
            @error('quantity')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>