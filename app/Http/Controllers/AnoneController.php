<?php

namespace App\Http\Controllers;

use App\User;
use App\User_profile;
use Illuminate\Http\Request;
use Validator;
use Auth;


class AnoneController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    
    public function login(){
        return view('login'); 
    }
    
    public function register(){
        return view('register');
    }
    
    public function register_act(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:1 | max:20',
            'password' => 'required | min:1 | max:20',
            'sex' => 'required | max:1',
            'school_year' => 'required | max:5',
            'nigate' => 'required',
        ]);
        
        if ($validator->fails()){
            return redirect('register')
            ->withInput()
            ->withErrors($validator);
        }
        $users = new User;
        $users->name = $request->name;
        $users->password = bcrypt($request->password);
        $users->sex = $request->sex;
        $users->school_year = $request->school_year;
        $users->save();
        
        $aiu = User::orderBy('id', 'desc')->first();
        $id = $aiu->id;
        
        
        $nigate = $request->nigate;
        for ($i = 0; $i < count($nigate); $i++){
            $user_profiles = new User_profile;
            $user_profiles->user_id = $id;
            $user_profiles->nigate_id = $nigate[$i];
            $user_profiles->save();
        }
    }
    
    public function login_act(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required | min:1 | max:20',
            'password' => 'required | min:1 | max:20',
        ]);
        if($validator->fails()) {
            return redirect('login')
            ->withInput()
            ->withErrors($validator);
        }
        //ログインの処理
        // $user = User::where('name', $request->name, '&&', 'password', $request->password)->get();
        // $user = User::where('name', $request->name)->where('password', $request->password)->first();
        
        // if(count($user) > 0){
        //   Auth::attempt($user);
        //   return redirect('/test');
        // }
        
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // 認証に成功した
            return redirect('test');
            // ->intended('dashboard');
        }
    }
    public function test() {
        $user = Auth::user();
        echo $user->name;
    }
}
