@extends('components.layout')

@section('content')
    <x-navbar />
    <div class="container mx-auto mb-10">
        <div class="flex items-center justify-end my-10">
            <x-post-modal />
        </div>
        @if (session('success'))
            <p class="bg-green-100 text-green-700 my-10 p-2 rounded">{{ session('success') }}</p>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Experience Cards -->
            @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                    <div class="relative h-48 overflow-hidden">
                        <img src={{ $post->image }} alt="Iftar in Morocco" class="w-full h-full object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-indigo-900 mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($post->content, 50) }}</p>
                        <a href='/posts/{{ $post->id }}'>
                            <button class="text-yellow-500 hover:text-yellow-600 font-semibold">Read Post →</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
