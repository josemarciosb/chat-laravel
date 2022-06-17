<?php

namespace App\Http\Controllers\Api;

use App\Events\Chat\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{

    public function listMessages(User $user)
    {

        $userFrom = Auth::user()->id;
        $userTo = $user->id;

        $messages = Message::where([['from_user_id', $userFrom], ['to_user_id', $userTo]])
            ->orWhere([['to_user_id', $userFrom], ['from_user_id', $userTo]])
            ->orderBy('created_at', 'ASC')->get();

        return response()->json([
            'messages' => $messages
        ], Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();

        $message->from_user_id = Auth::user()->id;
        $message->to_user_id = $request->to;
        $message->content = $request->content;

        $message->save();

        try {
            Event::dispatch(new SendMessage($message));


            return response()->json([
                'message' => $message
            ], Response::HTTP_OK);

        } catch (\Exception $e) {

            return response()->json([
                'message' => $e
            ], Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
