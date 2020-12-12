<div class="container my-6 mx-auto px-4 md:px-1/12">
    <div class="text-center mb-8">
        <h1 class="text-4xl text-gray-800 font-semibold">
            Team Kami
        </h1>
    </div>

    <div class="flex flex-wrap -mx-1 lg:-mx-4 mt-3">

        @forelse ($member as $item)
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-6 lg:w-1/4 mb-3">
            <div class="my-5">
                <img src="{{ Storage::url('public/'. $item->image) }}" class="rounded-full img-team shadow-lg">
            </div>
            <span class="mb-2 text-gray-900 mx-4 font-semibold text-lg">{{ $item->name }}</span>
            <p class="mx-7 my-2">
                <span class="text-gray-500 font-bold text-xs uppercase">
                    {{$item->part}}
                </span>
            </p>
            <p class="text-gray-500 text-justify text-bawah">
                {{ $item->description }}
            </p>
            {{-- <div class="social-media flex my-3">
                <a href="#" target="_blank">
                    <img src="https://logos-world.net/wp-content/uploads/2020/04/Twitter-Logo.png">
                </a>
                <a href="#" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/240px-Facebook_logo_%28square%29.png"
                        class="facebook" width="30px">
                </a>
                <a href="#" target="_blank">
                    <img src="https://logos-world.net/wp-content/uploads/2020/04/Twitter-Logo.png" class="instagram">
                </a>
            </div> --}}
        </div>
        @empty

        @endforelse

    </div>
</div>

<style>
    .img-team {
        width: 150px;
        height: 150px;
    }

    .text-footer {
        font-size: 15px;
    }

    .social-media img {
        width: 30px;
        margin-top: 15px;
    }

</style>
