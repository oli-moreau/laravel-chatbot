<form class="flex justify-start items-center w-full" action="{{ route('message.add') }}" method="POST">
    @csrf
    <input class="rounded w-full h-10" type="text" name="text" placeholder="Message" autofocus>
    <input type="submit" value="Submit" class="text-white bg-blue-500 rounded px-5 h-10 ml-5 text-center cursor-pointer">
</form>
