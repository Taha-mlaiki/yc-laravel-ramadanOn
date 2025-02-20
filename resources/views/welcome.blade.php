@extends("components.layout")


@section("content")
<style>
    @keyframes twinkle {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .star {
        animation: twinkle 2s infinite;
    }
    
    .lantern {
        animation: float 4s infinite ease-in-out;
    }
</style>
<body class="bg-gray-50">
<!-- Hero Section -->
<section class="relative min-h-screen bg-gradient-to-b from-indigo-900 via-purple-900 to-indigo-800 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute inset-0">
        <div class="star absolute top-1/4 left-1/4 text-yellow-200 text-xl">✧</div>
        <div class="star absolute top-1/3 right-1/3 text-yellow-200 text-xl" style="animation-delay: 0.5s">✧</div>
        <div class="star absolute bottom-1/4 right-1/4 text-yellow-200 text-xl" style="animation-delay: 1s">✧</div>
        <div class="lantern absolute top-20 left-20 text-4xl">🏮</div>
        <div class="lantern absolute top-40 right-40 text-4xl" style="animation-delay: 1s">🏮</div>
    </div>
    
    <!-- Mosque silhouette -->
    <div class="absolute bottom-0 w-full">
        <svg class="w-full h-48" viewBox="0 0 1440 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,150 L60,150 L120,100 L180,150 L240,120 L300,150 L360,100 L420,150 L480,120 L540,150 L600,100 L660,150 L720,120 L780,150 L840,100 L900,150 L960,120 L1020,150 L1080,100 L1140,150 L1200,120 L1260,150 L1320,100 L1380,150 L1440,150 L1440,200 L0,200 Z" fill="#1a365d"/>
        </svg>
    </div>

    <!-- Hero content -->
    <div class="relative container mx-auto px-6 pt-32 pb-48">
        <div class="text-center">
            <h1 class="text-6xl md:text-7xl font-bold text-white mb-6">
                Ramadan'On
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto">
                Explore Recipes, Share Experiences, and Celebrate the Spirit of Ramadan
            </p>
            <button class="bg-yellow-500 hover:bg-yellow-400 text-indigo-900 font-bold py-3 px-8 rounded-full transform transition hover:scale-105">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- Recipes Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center text-indigo-900 mb-12">Discover Delicious Recipes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Recipe Cards -->
            @foreach ($recipies as $recipe )
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src={{ $recipe->image }} alt="Harira Soup" class="w-full h-full object-cover"/>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-900 mb-2">{{ $recipe->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $recipe->description }}</p>
                    <a href="/recipes/{{ $recipe->id }}">
                        <button class="text-yellow-500 hover:text-yellow-600 font-semibold">View Recipe →</button>
                    </a>
                </div>
            </div>   
            @endforeach
        </div>
        <a href="/recipes" class="flex items-center justify-center my-10">
            <button class="bg-yellow-500 hover:bg-yellow-400 text-indigo-900 font-bold py-3 px-8 rounded-full transform transition hover:scale-105">
                View more
            </button>
        </a>
    </div>
</section>

<!-- Experiences Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center text-indigo-900 mb-12">Share Your Ramadan Experiences</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Experience Cards -->
            @foreach ($posts as $post )
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src={{ $post->image }} alt="Iftar in Morocco" class="w-full h-full object-cover"/>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-900 mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($post->content, 50) }}</p>
                    <button class="text-yellow-500 hover:text-yellow-600 font-semibold">Read More →</button>
                </div>
            </div>     
            @endforeach
        </div>
        <a href="/posts" class="flex items-center justify-center my-10">
            <button class="bg-yellow-500 hover:bg-yellow-400 text-indigo-900 font-bold py-3 px-8 rounded-full transform transition hover:scale-105">
                View more
            </button>
        </a>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-indigo-900 mb-8">About Ramadan'On</h2>
        <p class="text-gray-600 max-w-3xl mx-auto mb-8">
            Ramadan'On is a platform to explore traditional recipes, share personal experiences, and connect with the global Ramadan community. Join us in celebrating this blessed month through food, stories, and spiritual connection.
        </p>
        <button class="bg-yellow-500 hover:bg-yellow-400 text-indigo-900 font-bold py-3 px-8 rounded-full transform transition hover:scale-105">
            Join Us
        </button>
    </div>
</section>

<!-- Footer -->
<footer class="bg-indigo-900 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-8 md:mb-0">
                <nav class="flex space-x-6">
                    <a href="#" class="hover:text-yellow-400">Recipes</a>
                    <a href="#" class="hover:text-yellow-400">Experiences</a>
                    <a href="#" class="hover:text-yellow-400">About</a>
                </nav>
            </div>
            <div class="flex space-x-6 mb-8 md:mb-0">
                <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="text-sm text-gray-400">
                © 2023 Ramadan'On. All rights reserved.
            </div>
        </div>
    </div>
</footer>
</body>
@endsection

