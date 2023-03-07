<div class="flex justify-end items-center">
    <div class="px-4 py-2 text-gray-700 bg-gray-100 rounded shadow h-full flex items-center">
        <span class="">{{ $message->text }}</span>
    </div>
    <img class="object-contain h-16 ml-2" src="{{ asset('images/user_profile/' . ($user->profile_picture)) }}">
</div>
