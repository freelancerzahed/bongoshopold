<?php
namespace App\Http\Controllers\Api;
use App\PinCode;
class PinCodeController extends Controller{
    public function getPinCode($pin_code){

        $pin_code = PinCode::where('pin_code',$pin_code)->first();
     return response()->json($pin_code);
    }
}
?>