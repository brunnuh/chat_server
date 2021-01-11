<?php

namespace App\Http\Controllers;

use App\Events\Chat\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use SebastianBergmann\CodeCoverage\Driver\Selector;


class MessageController extends Controller
{
    /**
     * @var Message
     */
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }




    public function store(Request $request)
    {

        try {
            $data = $request->all();
            //$data["from"] = 2;
            //$data["to"] = 1;
            //$message = $this->message->create($data);
            //Event::dispatch(new SendMessage($message));
            broadcast(new SendMessage($data));
            //event(new SendMessage($message));
            return response()->json(["stts" => "success"], 200);
        }catch (\Exception $e){
            return response()->json(["stts" => $e->getMessage()], 401);
        }
    }
}
