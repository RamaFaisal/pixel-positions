<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Log In</x-forms.button>

        <div class="flex flex-col gap-2 text-center">
            <a href="{{ route('login.google') }}"
                class="bg-tertiary/75 hover:bg-tertiary/100 py-2 px-4 rounded-full transition ease-in-out delay-150 duration-300">Login
                with Google</a>
            <a href="{{ route('login.github') }}" class="bg-primary/75 hover:bg-primary/100 py-2 px-4 rounded-full transition ease-in-out delay-150 duration-300">Login with GitHub</a>
        </div>
    </x-forms.form>
    <script>
        @if (session('error')){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        } @endif
    </script>
</x-layout>
