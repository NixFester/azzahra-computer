    <style>
        .bodyblog {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            width: 1100px;
        }
    </style>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Create New Blog Post</h1>

        <form action="{{ route('blog.store') }}" method="POST" class=" shadow-md rounded-lg p-8">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="w-full px-3 py-2 border rounded @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}"
                    class="w-full px-3 py-2 border rounded @error('date') border-red-500 @enderror">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block text-gray-700 font-bold mb-2">Body (Markdown)</label>
                <br />
                <textarea name="body" id="body" rows="20"
                    class=" px-3 py-2 border rounded font-mono bodyblog @error('body') @enderror">{{ old('body') }}</textarea>
                <p class="text-gray-600 text-sm mt-1">You can use Markdown formatting</p>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-purple-600 text-black px-6 py-2 rounded-lg font-semibold
                        hover:bg-purple-700 transition duration-200">
                    Create Post
                </button>

                <a href="{{ route('blog.index') }}"
                    class="inline-block border border-gray-400 text-gray-600 px-6 py-2 rounded-lg
                            hover:bg-gray-100 hover:text-gray-800 transition duration-200">
                    Cancel
                </a>

            </div>
        </form>
    </div>
