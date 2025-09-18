<x-layout>
    <form action="/jobs" method="post" enctype="multipart/form-data" class="max-w-xl mx-auto space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-white">Job Title</label>
            <input type="text" name="title" id="title"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gambar" class="block text-sm font-medium text-White">Gambar</label>
            <input type="file" name="gambar" id="gambar" accept="image/*"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-White">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                required></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salary" class="block text-sm font-medium text-White">Salary</label>
            <input type="text" name="salary" id="salary"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            @error('salary')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tags" class="block text-sm font-medium text-White">Tag</label>
            @foreach ($tags as $tag)
                <div class="inline-block mr-4">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="">
                    {{ $tag->name }}
                </div>
            @endforeach
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-White">Location</label>
            <input type="text" name="location" id="location"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            @error('location')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="schedule" class="block text-sm font-medium text-White">Schedule</label>
            <input type="radio" name="schedule" id="schedule" value="Full-time" class="mt-1" required> Full-time
            <input type="radio" name="schedule" id="schedule" value="Part-time" class="mt-1" required> Part-time
            @error('schedule')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url" class="block text-sm font-medium text-White">Application URL</label>
            <input type="text" name="url" id="url"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            @error('url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Post Job</button>
        </div>
    </form>
</x-layout>
