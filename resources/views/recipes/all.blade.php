@extends('components.layout')

@section('content')
    <x-navbar />

    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="relative w-fit my-10">
                <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                    <button id="dropdownButton" class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                        Filter by Category
                    </button>
                </div>

                <div id="dropdownMenu"
                    class="absolute left-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg hidden"
                    role="menu">
                    <div class="p-2">
                        @foreach ($categories as $category)
                            <a href={{ route('recipes.all', ['category_id'=> $category->id]) }}
                                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                role="menuitem">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <x-modal buttonTitle="" :categories='$categories' />
        </div>
        @if (session('success'))
            <p class="bg-green-100 text-green-700 my-10 p-2 rounded">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="bg-red-100 text-red-700 p-2 rounded">{{ session('error') }}</p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Recipe Cards -->
            @foreach ($recipes as $recipe)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                    <div class="relative h-48 overflow-hidden">
                        <img src={{ $recipe->image }} alt="Harira Soup" class="w-full h-full object-cover" />
                    </div>
                    <div class="p-6">
                        <span class="p-2 text-xs my-4 inline-block rounded-lg bg-blue-300 text-white w-fit ms-auto">
                            {{ $recipe->category->name }}
                        </span>
                        <h3 class="text-xl font-bold text-indigo-900 mb-2">{{ $recipe->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $recipe->description }}</p>
                        <a href="/recipes/{{ $recipe->id }}">
                            <button class="text-yellow-500 hover:text-yellow-600 font-semibold">View Recipe →</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-16 flex items-center justify-center">
            {{ $recipes->links() }}
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownButton = document.getElementById("dropdownButton");
            const dropdownMenu = document.getElementById("dropdownMenu");

            dropdownButton.addEventListener("click", function(event) {
                event.stopPropagation(); // Prevents immediate closing
                dropdownMenu.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (!dropdownMenu.contains(event.target) && event.target !== dropdownButton) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
