<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PinCode;
use Excel;
use App\Imports\PinCodesImport;

class PinCodeController extends Controller
{
    //get pincodes
    public function index(Request $request){
        $sort_search =null;
        $pin_codes = PinCode::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $pin_codes = $pin_codes->where('pin_code', 'like', '%'.$sort_search.'%');
        }
        $pin_codes = $pin_codes->paginate(15);
        return view('pin_code.index', compact('pin_codes', 'sort_search'));

      
    }
    public function create(){
return view('pin_code.create');
    }
    public function store(Request $request){
      
        $validated = $request->validate([
            'pin_code' => 'required|unique:pin_codes|max:6',
            'delivery_time' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
    $pin_code = new PinCode;
    $pin_code->pin_code = $request->pin_code;
    $pin_code->delivery_time = $request->delivery_time;
    $pin_code->city = $request->city;
    $pin_code->state = $request->state;
    if($pin_code->save()){
        flash(__('Pin Code has been inserted successfully'))->success();
        return redirect()->route('pin_code.create');
    }
    else{
        flash(__('Something went i'))->error();
        return back();
    }

    }
    public function edit($id){
        $pin_code = PinCode::findOrFail($id);
        return view('pin_code.edit', compact('pin_code'));
    }
    public function update($id, Request $request){
        $pin_code = PinCode::findOrFail($id);
        $pin_code->pin_code = $request->pin_code;
        $pin_code->delivery_time = $request->delivery_time;
        $pin_code->city = $request->city;
        $pin_code->state = $request->state;
        if($pin_code->update()){
            flash(__('Pin Code has been Updated successfully'))->success();
            return redirect()->route('pin_code');
        }
        else{
            flash(__('Something went i'))->error();
            return back();
        }
    }
    public function destroy($id)
    {
        $pickup_point = PinCode::findOrFail($id);
        if(PinCode::destroy($id)){
            flash(__('PinCode has been deleted successfully'))->success();
            return redirect()->route('pin_code');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }
    public function getPinCode($pin_code){

        $pin_code = PinCode::where('pin_code',$pin_code)->first();
        if($pin_code){
            return response()->json($pin_code,200);
        }else{
            return response()->json($pin_code,500);
        }
    
    }
    public function pinImport(Request $request){
        if($request->hasFile('import_pin')){
            
            $url = $request->file('import_pin');
            $import = new PinCodesImport;
           $data = Excel::import($import, $url);
           if($data){
            flash(__($import->getRowCount().' Pin Code successfully Added'))->success();
            return redirect()->route('pin_code');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }

        }
        
    }
}
