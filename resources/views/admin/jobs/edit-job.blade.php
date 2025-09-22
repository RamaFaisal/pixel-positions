<x-admin-layout>
    <h2 class="font-bold text-3xl text-center p-4">Edit Job "{{ $job->title }}"</h2>
    <form action="/admin/jobs/{{ $job->id }}" method="post" enctype="multipart/form-data" class="max-w-3xl mx-auto space-y-6 rounded-lg text-black my-4 grid grid-cols-2 gap-8 border border-gray-300 shadow p-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="employer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employer <span class="text-red-500 font-light">*Readonly</span></label>
            <input type="text" name="employer" id="employer" value="{{ $job->employer->name }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" disabled readonly>
        </div>

        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Title</label>
            <input type="text" name="title" id="title" value="{{ $job->title }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">
        </div>

        <div class="mb-4">
            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
            <input type="file" name="gambar" id="gambar" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">
        </div>

        <div class="mb-4">
            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
            <input type="number" name="salary" id="salary" value="{{ $job->salary }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">
        </div>

        <div class="col-span-2">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea name="description" id="description" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">{{ $job->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
            <input type="text" name="location" id="location" value="{{ $job->location }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">
        </div>

        <div>
            <label for="schedule" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule</label>
            <select name="schedule" id="schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Full-time" {{ $job->schedule === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ $job->schedule === 'Part-time' ? 'selected' : '' }}>Part-time</option>
            </select>
        </div>

        <div class="col-span-2">
          <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
          <input type="text" name="url" id="url" value="{{ $job->url }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light">
        </div>

        <div class="col-span-2 flex justify-end">
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Update</button>
        </div>
    </form>
</x-admin-layout>
