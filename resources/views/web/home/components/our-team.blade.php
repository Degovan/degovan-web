<section id="our-team">
    <h1 class="text-center text-white p-4 lato">Team</h1>

    <div class="container">
        <div class="row your-class">
           
            @foreach ($members as $member)
            <div class="col-lg-3">
                <div class="card mb-3">
                    <img src="{{ $member->takeImage }}" class="card-img-top" alt=".img">
                    <div class="card-body">
                      <h5 class="card-title">{{ $member->name }}</h5>
                      <p class="card-text">{{ $member->part }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>