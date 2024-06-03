<!-- ALL items for a SPECIFIC trainer-->

<x-layout>
    <ul class="list-group" style="max-width: 400px">
        @if ($allItems->isNotEmpty())
            @foreach($allItems as $allItem)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $allItem->name }}
                    <span class="badge badge-primary badge-pill" style="color:blue">{{ $allItem->quantity }}
                        <a href="/trainers/{{ $allItem->trainer_id }}/items/edit/{{ $allItem->id }}" class="btn btn-success">Edit?</a>
                        <form method="POST" action="/trainers/{{ $allItem->trainer_id }}/items/{{ $allItem->id }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete?</button>
                        </form>
                    </span>
                </li>
            @endforeach
        @else
            <h5>No items yet!</h5>
        @endif

    </ul>
    <br>
    <a href="/trainers/{{ $trainerId }}" class="btn btn-secondary"><-Back to trainer</a>
    <a href="/trainers/{{ $trainerId }}/items/create" class="btn btn-primary">Add items?</a>
</x-layout>

<!-- figure out what to do if trainer has no items assigned, like maybe reroute to the creation page. -->