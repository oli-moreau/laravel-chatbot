<x-app-layout>
    <div class="flex justify-center mt-10">
        <p class="flex justify-center w-3/12 text-gray-700 bg-blue-100 rounded shadow h-full text-l">{{ session('welcome') ?? "" }}</p>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-xl">
                <div class="p-6 bg-white border-b border-gray-200 rounded-xl">

                    @foreach ($messages as $message)
                        @include('components.messages.user')
                        @include('components.messages.lara')
                    @endforeach

                    @include('components.messages.clear')
                    @include('components.messages.send')

                    <script>
                        window.onload = () => window.scroll(0, document.body.scrollHeight)
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
