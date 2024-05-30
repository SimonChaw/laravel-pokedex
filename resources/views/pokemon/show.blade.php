<!-- INDIVIDUAL pokemon pages-->

<x-layout>
    <div class="col-4 card mx-auto">
        <img src="{{ $mon->url }}" class="card-img-top p-4 mx-auto" alt="..." style="width: 200px; height: auto;">
        <div class="card-body">
            <h5 class="card-title">{{ $mon->name }}</h5>
            <p class="card-text">{{ $mon->description }}</p>
            <a href="#" class="btn btn-primary">{{ $mon->type }}</a>
            <a href="/pokemon/" class="btn btn-secondary">Back</a>

            <!-- Wrapping in a form, then using Laravel's DELETE method.
                    This is because you can't wrap a form itself with a DELETE method.
                Also, an action for WHERE request goes to.-->
            <form method="POST" action="{{ "/pokemon/" . $mon->id }}">
                @csrf <!-- Token for Laravel to know it's coming from a page IT generated -->
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <!-- GO to "edit" page -->
            <!-- <a href="{ "/pokemon/" . $mon->id . "/edit"}}" class="btn btn-success">Edit</a> -->
            <a href="/pokemon/{{ $mon->id }}/edit" class="btn btn-success">Edit</a>
        </div>
    </div>
</x-layout>