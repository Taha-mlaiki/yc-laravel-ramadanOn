@extends('components.layout')
@section('content')
    <x-navbar />

    <div class="container mx-auto">
        <div class="mb-3">
            <h1 class="text-xl text-neutral-700 font-bold">Created by :{{ $recipe->username }}</h1>
            <h1 class="text-neutral-700">{{ $recipe->email }}</h1>
        </div>
        <div class="w-full rounded-xl bg-black flex items-center justify-center relative h-[70vh]">
            <p class="text-white text-center text-lg">No Image available</p>
            <img src={{ $recipe->image }} class='absolute inset-0 w-full h-full bg-cover z-10'>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-neutral-800  mt-4">{{ $recipe->title }}</h1>
            <p class="mt-2 text-neutral-700">
                {{ $recipe->description }}
            </p>
            <p class="my-10">
                {{ $recipe->body }}
            </p>
        </div>
    </div>
@endsection
