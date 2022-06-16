<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\SendNotificationDace;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function sendMailDaceNotification(Request $request){

        try {
            DB::beginTransaction();

            Mail::to($request->to)->send(new SendNotificationDace($request->empresa, $request->cliente));

            DB::commit();

            return response()->json('success',Response::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(['error'    =>  $th],Response::HTTP_SERVER_INTERNAL_ERROR);
            DB::rollBack();
        }

    }

    public function test(){
        return view('emails.send.notification.dace');
    }
}
