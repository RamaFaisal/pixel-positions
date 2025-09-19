<x-layout>
    <form action="/jobs" method="post" enctype="multipart/form-data"
        class="max-w-2xl mx-auto bg-primary/10 p-10 space-y-6 rounded-lg text-black shadow-2xl">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-black">Job Title</label>
            <input type="text" name="title" id="title"
                class="mt-1 block w-full border-2 border-primary rounded-md shadow-sm p-2" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gambar" class="block text-sm font-medium text-black">Job Image</label>
            <label for="gambar" class="bg-primary text-white px-4 py-2 rounded-md cursor-pointer inline-block">
                Select Image
            </label>
            <div class="mt-1">
                <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" required>
                <p>Uploaded Image: <span id="gambar-name"></span></p>
            </div>
            @error('gambar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-White">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2"
                required></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salary" class="block text-sm font-medium text-White">Salary</label>
            <div class="flex items-center border border-primary rounded-md shadow-sm">
                <span class="px-4 w-18 border-r border-primary rounded-l-md">US $</span>
                <input type="number" name="salary" id="salary" class="mt-1 block w-full p-2" step="0.01"
                    min="0" required>
            </div>

            @error('salary')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div>
            <label for="tags" class="block text-sm font-medium text-White">Tag</label>
            @foreach ($tags as $tag)
                <div class="inline-block mr-4">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="">
                    {{ $tag->name }}
                </div>
            @endforeach
        </div> --}}

        <div>
            <label for="tags" class="block text-sm font-medium ">Tags</label>
            <select id="select-tags" name="tags[]" multiple placeholder="Pilih atau ketik tag..."
                class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2 bg-transparent">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-White">Location</label>
            <input type="text" name="location" id="location"
                class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2" required>
            @error('location')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Schedule</label>
            <div class="mt-2 flex items-center space-x-4">
                <label>
                    <input type="radio" name="schedule" value="Full-time" class="form-radio text-blue-500" required>
                    <span class="ml-2">Full-time</span>
                </label>
                <label>
                    <input type="radio" name="schedule" value="Part-time" class="form-radio text-blue-500" required>
                    <span class="ml-2">Part-time</span>
                </label>
            </div>
            @error('schedule')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url" class="block text-sm font-medium text-White">Application URL</label>
            <input type="text" name="url" id="url"
                class="mt-1 block w-full border border-primary rounded-md shadow-sm p-2" required>
            @error('url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="bg-primary/75 text-white px-6 py-2 rounded-md font-semibold transition-colors duration-300 hover:bg-primary/100">Post
                Job</button>
        </div>
    </form>

    <script>
        const gambarInput = document.getElementById('gambar');
        const gambarName = document.getElementById('gambar-name');

        gambarInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                gambarName.textContent = this.files[0].name;
            } else {
                gambarName.textContent = '';
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect("#select-tags", {
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });
    </script>
</x-layout>
