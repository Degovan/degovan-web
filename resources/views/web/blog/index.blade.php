@extends('web.layouts.app')

@section('content')

<div class="bg-blog">
    <div class="container my-6 mx-auto px-4 md:px-12">
        <div class="text-kg text-center mb-8">

            <h1 class="text-4xl">
                <br>
                Artikel
            </h1>
        </div>

        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            @forelse ($post as $item)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 mb-3">
                <!-- Article -->
                <article class="overflow-hidden rounded-md shadow-md">
                    <a href="#">
                        <img alt="Placeholder" class="block "
                            src="{{ asset('/storage/assets/posts/' . $item->image) }}">
                    </a>
                    <span type="button" class="border border-green-500 text-green-500 rounded-md px-4 py-1 m-2 ">
                        {{ $item->category_post->name }}
                    </span>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg capitalize font-semibold">
                            <a class="no-underline hover:text-gray-800 text-black text-header text-xl" href="#">
                                {{ $item->title }}
                            </a>
                        </h1>
                    </header>
                    <p class="text-detail text-sm mt-3 mb-7">
                        By <span class="font-bold"> {{ $item->user->name }} </span> •
                        {{ $item->created_at->format('d F Y') }}
                    </p>
                </article>
                <!-- END Article -->
            </div>
            @empty
            <div>
                <h1>
                    Belum Ada Artikel
                </h1>
            </div>
            @endforelse

        </div>
    </div>
</div>

@endsection

<style>
    .bg-blog {
        background: #F6F6F6;
    }

    .text-kg h1 {
        font-family: Roboto;
        color: #48006C;
    }

    .text-header {
        margin-left: -10px;
        font-family: Roboto;
        line-height: 23px;
        color: rgba(0, 0, 0, 0.9);
    }

    .text-detail {
        margin-left: 7px;
        margin-top: -10px;
        font-family: Roboto;
        line-height: 16px;
        color: rgba(0, 0, 0, 0.6);
    }

    article img {
        width: 380px;
        height: 202px;
    }

</style>
