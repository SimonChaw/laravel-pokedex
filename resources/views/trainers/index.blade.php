<!-- ALL trainers -->

<x-layout>
    <h5>Meet your trainers!</h5>

    <div class="row py-4">
        <a href="/trainers/create" class="col-3 btn btn-success mx-auto" allign=>Add New Trainer</a>
    </div>

    <div class="row grid gap-0 column-gap-2 justify-content-center">
        @foreach($trainers as $trainer)
            <div class="card mb-3" style="max-width: 540px">
                <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $trainer->url }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $trainer->name }}</h5>
                        <p class="card-text"><small class="text-muted">[Licensed Trainer]</small></p>
                        <a href="/trainers/{{  $trainer->id }}"
                            class="btn btn-primary">View</a>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>