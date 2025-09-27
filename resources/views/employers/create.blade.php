<x-layout>
  <div class="mt-6">
    <x-page-heading>Create Employer</x-page-heading>

    <x-forms.form method="POST" action="/employer" enctype="multipart/form-data">

      <x-forms.input label="Employer Name" name="employer" />
      <x-forms.input label="Employer Logo" name="logo" type="file" />

      <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
  </div>
</x-layout>