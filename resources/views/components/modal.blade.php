<button id="openModalBtn"
    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">
    {{ $title ?? 'Add new Recipe' }}
</button>

<!-- Modal Backdrop -->
<div id="modalBackdrop"
    class="fixed inset-0 bg-black bg-opacity-50 overflow-auto p-4 hidden z-50 items-center justify-center">
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 transform transition-all" role="dialog"
        aria-modal="true" aria-labelledby="modalTitle">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 id="modalTitle" class="text-xl font-semibold text-gray-900">
                {{ $title ?? 'Add new Recipe' }}
            </h3>
        </div>

        <!-- Modal Body -->
        <form id="recipeForm" class="px-6 py-4 space-y-4" method="POST" action="/recipes">
            @csrf
            <!-- Username Input -->
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
            <!-- Title Input -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                    Recipe Title
                </label>
                <input type="text" id="title" name="title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter recipe title">
            </div>
            <!-- Title Input -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                    Recipe Image
                </label>
                <input type="url" id="image" name="image"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter recipe Image URL">
            </div>

            <!-- Category Dropdown -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                    Category
                </label>
                <select id="category" name="category_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="" selected disabled>Select a Category</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description Textarea -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Short Description
                </label>
                <textarea id="description" name="description" rows="2"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Brief description of the recipe"></textarea>
            </div>

            <!-- Recipe Body -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-1">
                    Recipe Instructions
                </label>
                <textarea id="body" name="body" rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter detailed recipe instructions"></textarea>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button id="cancelBtn" type="button"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Cancel
                </button>
                <button id="saveBtn" type="submit" form="recipeForm"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Save Recipe
                </button>
        </form>

        <!-- Modal Footer -->
    </div>
</div>
</div>

<script>
    // Get DOM elements
    const modalBackdrop = document.getElementById('modalBackdrop');
    const openModalBtn = document.getElementById('openModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const recipeForm = document.getElementById('recipeForm');

    // Function to open modal
    function openModal() {
        modalBackdrop.classList.remove('hidden');
        modalBackdrop.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    // Function to close modal
    function closeModal() {
        modalBackdrop.classList.add('hidden');
        modalBackdrop.classList.remove('flex');
        document.body.style.overflow = '';
        recipeForm.reset();
    }

    // Event Listeners
    openModalBtn.addEventListener('click', openModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside
    modalBackdrop.addEventListener('click', (e) => {
        if (e.target === modalBackdrop) {
            closeModal();
        }
    });

    // Close modal on Escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modalBackdrop.classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
