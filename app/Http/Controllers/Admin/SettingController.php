<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $settings = [];
        $dbsettings = Setting::get();
        
        foreach($dbsettings AS $dbsetting) {
           $settings[$dbsetting['name']] = $dbsetting['content']; 
        }
        
        
       return view('Admin.settings.index', [
           'settings' => $settings
       ]);
        
    }
    
    public function save(Request $request) {
        
        $data = $request->only([
            'title',
            'subtitle',
            'email',
            'bgcolor',
            'textcolor'
        ]);
      
        $validator =  $this->validator($data);
        
        if($validator->fails()){
            return redirect()->route('settings')
                    ->withErrors($validator);
        }
        
        foreach($data AS $item => $value) {
            Setting::where('name',$item)->update([
                'content' => $value
            ]);
        }
        
        return back()->with('warning', 'Itens alterados com sucesso!');
        
     //   return redirect()->route('settings')
     //           ->with('warning', 'Itens alterados com sucesso!');
    }
    
    protected function validator($data) {
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            'bgcolor' => ['string'], ['regex:/#[a-zA-Z0-9]{6}/1'],
            'textcolor' => ['string'], ['regex:/#[a-zA-Z0-9]{6}/1'],
        ]);
    }
            
    
}
