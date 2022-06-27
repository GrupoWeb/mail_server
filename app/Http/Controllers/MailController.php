<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use App\Mail\SendNotificationDace;
use App\Mail\TransferDocuments;
use Illuminate\Support\Facades\DB;
use App\Mail\CopiesUser;
use App\Models\User;

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
            DB::rollBack();
            return response()->json(['error'    =>  $th],Response::HTTP_SERVER_INTERNAL_ERROR);
        }
        
    }
    
    public function sendTransferNotification(Request $request){
        try {
            DB::beginTransaction();

            Mail::to($request->to)->send(new TransferDocuments($request->usuario, $request->empresa,$request->numero,$request->asunto,$request->interno));
            
            DB::commit();

            return response()->json('success',Response::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json(['error'    =>  $th],Response::HTTP_SERVER_INTERNAL_ERROR);
        }
    }
    public function sendCopiesNotification(Request $request){
        try {
            DB::beginTransaction();

            Mail::to($request->to)->send(new CopiesUser($request->usuario_to, $request->empresa_to,$request->numero_to,$request->asunto_to,$request->interno, $request->copias, $request->instrucciones,$request->fecha));
            
            DB::commit();

            return response()->json('success',Response::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json(['error'    =>  $th],Response::HTTP_SERVER_INTERNAL_ERROR);
        }
    }

    public function test(){
        return view('emails.send.notification.dace');
    }
}
