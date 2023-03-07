<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Arr;

class GenerateResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event) {
        $text = $event->text;
        $message_id = $event->message_id;
        $search = "";
        $response = "I am unsure. Would you like to search on the internet?";
        $path = storage_path() . "/app/public/phrases.json";
        $json = json_decode(file_get_contents($path), true);

        foreach ($json as $keyword => $phrase) {
            if (stripos($text, $keyword) !== false) {
                $replace = strtr($phrase, [
                    "[name]" => $event->user->name,
                    "[time]" => now()->format('H:i')
                ]);
                $response = $replace;
                break;
            }
        }

        if(!isset($replace)) {
            $search = "https://www.google.com/search?q=" . $text;
        }

        return app('App\Http\Controllers\ResponseController')->add($response, $message_id, $search);
    }
}
