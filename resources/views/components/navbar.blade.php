<div class="flex items-center justify-center py-4  mb-10 shadow-md"> 
    <div>
        <div class="border-b border-gray-200">
          <nav class="-mb-px flex gap-6" aria-label="Tabs">
            
            <a
              href="/"
              class="inline-flex shrink-0 items-center gap-2 border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700 
              {{ request()->is('/') ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500' }}"
            >
              Home
            </a>
      
            <a
              href="/posts"
              class="inline-flex shrink-0 items-center gap-2 border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700 
              {{ request()->is('posts') ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500' }}"
            >
              Posts
            </a>
      
            <a
              href="/recipes"
              class="inline-flex shrink-0 items-center gap-2 border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700 
              {{ request()->is('recipes') ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500' }}"
            >
              Recipes
            </a>
      
          </nav>
        </div>
      </div>      
  </div>
</div>