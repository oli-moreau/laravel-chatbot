@if ($alerts)
    <div class="flex flex-col items-center justify-center mt-5">
    @foreach ($alerts as $alert)
        <p class="flex justify-center w-3/12 text-gray-700 bg-blue-100 rounded shadow h-full text-l mb-3">{{ $alert }}</p>
    @endforeach
    </div>
@endif
