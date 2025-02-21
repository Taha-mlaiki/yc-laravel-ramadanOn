@extends('components.layout')
@section('content')
    <x-navbar />

    <div class="container mx-auto">
        <div class="mb-3">
            <h1 class="text-xl text-neutral-700 font-bold">Created by :{{ $post->username }}</h1>
            <h1 class="text-neutral-700">{{ $post->email }}</h1>
        </div>
        <div class="w-full rounded-xl bg-black flex items-center justify-center relative h-[70vh]">
            <p class="text-white text-center text-lg">No Image available</p>
            <img src={{ $post->image }} class='absolute inset-0 w-full h-full bg-cover z-10'>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-neutral-800  mt-4">{{ $post->title }}</h1>
            <p class="my-10 text-neutral-700">
                {{ $post->content }}
            </p>
        </div>
        @if (session('success'))
            <p class="bg-green-100 text-green-700 my-10 p-2 rounded">{{ session('success') }}</p>
        @endif
        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl px-4">
                <div class="flex justify-between items-center mb-6">
                </div>
                <form class="mb-6 flex flex-col gap-2" method="POST" action={{ route('comment.create') }}>
                    @csrf
                    <input type="hidden" value={{ $post->id }} name="post_id" />
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                            Username
                        </label>
                        <input type="text" id="username" name="username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="john doe">
                    </div>
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter recipe title">
                    </div>
                    <div
                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment">Your comment</label>
                        <textarea id="comment" name="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a comment..."></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg bg-blue-500 ms-auto">
                        Post comment
                    </button>
                </form>
                @foreach ($post->comments as $comment)
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                    <img class="mr-2 w-6 h-6 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="Michael Gough">{{ $comment->username }}
                                </p>
                            </div>
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
@endsection
