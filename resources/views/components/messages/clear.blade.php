@unless ($messages->first() == null)
    <div class="flex justify-center items-center mt-5">
        <form action="{{ route('message.clear') }}" method="POST" class="h-10 bg-gray-100 rounded shadow flex justify-center items-center px-3 mb-5">
            @csrf
            @method('DELETE')
            <input class="cursor-pointer" type="submit" value="Clear conversation">
        </form>
    </div>
@endunless
