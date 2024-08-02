<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public static function newReportNotification()
    {
        $message = "We added new VarietyReport";
        broadcast(new MessageSend($message));
        // $users_data = User::whereNot('role', 'admin')->get();

        // NotificationController::saveHistory($message);

        // foreach ($users_data as $user) {
        //     Mail::to($user->email)->send(new NewVarietyReportNotificationMail(['name' => $user->username]));
        // }

        return response()->json(['status' => 'Message Sent!']);
    }

    public static function saveHistory($message)
    {
        $users_data = User::whereNot('role', 'admin')->get();

        foreach ($users_data as $user) {
            Notification::insert(
                [
                    'user_id' => $user->id,
                    'message' => $message,
                ]
            );
        }
    }

    public function read(Request $request)
    {
        try {
            Notification::where('id', $request['notification_id'])->update(['is_read' => 1]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
            ], 500);
        }

        return response()->json([
            'status' => 'success',
        ]);
    }
}
