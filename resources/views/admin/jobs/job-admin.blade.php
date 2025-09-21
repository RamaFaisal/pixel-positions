<x-admin-layout>
  <h2 class="font-bold text-2xl text-center">Job Controller {{ auth()->user()->name }}</h2>

  <table id="user-admin-table" class="w-full mt-6 table-auto border-2 border-black dark:border-white">
      <tr class="bg-primary">
          <th class="">Job</th>
          <th>Employer</th>
          <th>Location</th>
          <th>Salary</th>
          <th>Schedule</th>
          {{-- <th>Tags</th> --}}
          <th>Action</th>
      </tr>
      @foreach ($jobs as $job)
          <tr class="border-b border-gray-300">
              <td class="text-left">{{ $job->title }}</td>
              <td class="text-left">{{ $job->employer->name }}</td>
              <td class="text-left">{{ $job->location }}</td>
              <td class="text-left">${{ $job->salary }}</td>
              <td class="text-left">{{ $job->schedule }}</td>
              {{-- <td class="text-left">
                @foreach ($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
              </td> --}}
              <td class="text-center flex flex-row gap-4">
                  <a href="/admin/job/{{ $job->id }}/edit" class="">Edit</a>
                  <a href="/admin/job/{{ $job->id }}/delete">Delete</a>
              </td>
          </tr>
      @endforeach
  </table>
  <div class="mt-4">
      {{ $jobs->links() }}
  </div>
</x-admin-layout>