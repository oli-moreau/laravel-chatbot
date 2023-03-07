@foreach ($responses as $response)
    @if($message->id == $response->message_id)
        <div class="flex justify-start items-center max-w-[75%]">
            <img class="object-contain h-16 mr-2" src="{{ asset('images/lara_gpt.png') }}">
            <div class="px-4 py-2 text-gray-700 bg-blue-100 rounded shadow h-full flex flex-col items-start">
                @if($response->search != "")
                    <span>{{ $response->text }}</span>
                    <a class="w-full" href="{{ $response->search }}" target="_blank">
                        <div class="flex flex-row items-start mt-2">
                            <img class="h-5 mr-2" src="{{ asset('images/search.png') }}" alt="">
                            {{ $message->text }}
                        </div>
                    </a>
                @else
                    <span>{{ $response->text }}</span>
                @endif
            </div>
        </div>
        <span class="text-xs ml-20 text-gray-400">{{ $response->created_at }}</span>
    @endif
@endforeach
