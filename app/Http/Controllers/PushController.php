<?php

namespace App\Http\Controllers;

use App\Models\Notification_logs;
use App\Repository\courseTimeRepository;
use App\Repository\presentStudentRepository;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\Models\User;
use Auth;
use Notification;

class PushController extends Controller
{


    /**
     * Store the PushSubscription.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'endpoint' => 'required',
            'keys.auth' => 'required',
            'keys.p256dh' => 'required'
        ]);
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true], 200);
    }

    public function push()
    {
        courseTimeRepository::CheckCourseHasNotStarted();
        return redirect()->back();
    }


    public function imPresent($id, $start, $end, $log_id)
    {
        $log = Notification_logs::find($log_id);
        if ($log) {
            if ($log->expire_date < date("Y-m-d H:m:i")) {
                return ["success" => false, "msg" => "به دلیل دیر کلیک کردن بر روی لینک ، این پیوند منقضی شده است"];
            }else{
                presentStudentRepository::modify($id, $start, $end);
                Auth::loginUsingId($id, true);
                return redirect()->route("home");
            }
        } else {
            return ["success" => false, "msg" => "لینک ارسالی نا معتبر میباشد"];
        }


    }
}
