<?php

namespace App\Http\Controllers;

use App\User;
use App\User_profile;
use App\Category;
use App\NigateList;
use App\Thread;
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
        $nigates = NigateList::all();
        return view('register', ['nigates' => $nigates]);
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
        return redirect('/');
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
        
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password],$request->remember_token)) {
            // 認証に成功した
            return redirect('/');
        }
        
    }
    
    //mypageの表示,認証されていなかったらログインページへ
    public function mypage() {
        if(Auth::check()) {
            $user = Auth::user();
            $nigates = User_profile::where('user_id', $user->id)->get();
            
            
            return view('/mypage', [
                'user' => $user,
                'myNigates' => $nigates,
                ]);
        }else{
            return redirect('/login');
        }
    }
    
    
    
    
    
    // public function test() {
    //     $user = Auth::user();
    //     echo $user->name;
    // }
    
    // <======ここからカテゴリーの処理 ======>
    
    //カテゴリー表示＆新規カテゴリー送信
    public function category() {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('category', ['categories' => $categories]);
    }
    
    //ポストされてきたカテゴリーをインサートする処理
    public function category_insert(Request $request) {
      $validator = Validator::make($request->all(), [
          'category_name' => 'required | max: 20',
      ]);
      if ($validator->fails()){
          return redirect('category')
          ->withInput()
          ->withError($validator);
      }
      $categories = new Category;
      $categories->category_name = $request->category_name;
      $categories->save();
      return redirect('category');
    }
    
    //カテゴリーを消す
    public function category_delete(Category $category) {
        $category->delete();
        return redirect('category');
    }
    
    //カテゴリーを更新viewページに飛ばす
    public function category_update_view(Category $category) {
        return view('category_update_view', ['category'=> $category]);
    }
    //カテゴリーを更新する
    public function category_update(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'category_name' => 'required | max:10',
        ]);
        if ($validator->fails()){
            return redirect('/category')
            ->withInput()
            ->withError($validator);
        }
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect('/category');
    }
    
    //<============ここまでカテゴリーの処理==============>
    
     //<==============ここから苦手の処理================>
     
     //ニガテリスト表示
     public function nigate_list() {
         $nigates = NigateList::orderBy('id', 'asc')->get();
         $categories = Category::orderBy('id', 'asc')->get();
         return view('nigate_list', ['nigates' => $nigates,
         'categories' => $categories
         ]);
     }
     
     //ニガテを登録、ニガテリストに戻す
     public function nigate_register(Request $request) {
         $validator = Validator::make($request->all(),[
             'nigate_name' => 'required | max:20',
             'category_id' => 'required',
             ]);
        if($validator->fails()){
            return redirect('/nigate')
            ->withInput()
            ->withError($validator);
        }
        $nigate_lists = new NigateList;
        $nigate_lists->nigate_name = $request->nigate_name;
        $nigate_lists->category_id = $request->category_id;
        $nigate_lists->save();
        return redirect('/nigate');
     }
     
     public function nigate_update_view(NigateList $nigate) {
         $categories = Category::orderBy('id', 'asc')->get();
         return view('nigate_update_view', ['nigate' => $nigate,
         'categories' => $categories,
         ]);
     }
     
     public function nigate_update(Request $request) {
         $validator = Validator::make($request->all(), [
             'nigate_name' => 'required | max:20',
             'category_id' => 'required',
             'id' => 'required',
             ]);
        if ($validator->fails()) {
            return redirect('nigate_update_view')
            ->withError($validator);
        }
        $nigate_lists = NigateList::find($request->id);
        $nigate_lists->nigate_name = $request->nigate_name;
        $nigate_lists->category_id = $request->category_id;
        $nigate_lists->save();
        return redirect('/nigate');
     }
     
     
     
     
     //<==============ここまで苦手の処理================>
     
     //<==============管理者側のスレッドの処理================>
     
     public function thread(){
        $threads = Thread::orderBy('id', 'asc')->get();
        $nigates = NigateList::orderBy('id', 'asc')->get();
        $categories = Category::orderBy('id', 'asc')->get(); 
        return view('thread', ['threads' => $threads,
        'nigates' => $nigates,
        'categories' => $categories,
        ]);
     }
     
     public function thread_register(Request $request){
         $validator = Validator::make($request->all(), [
             'thread_name' => 'required | max:20',
             'category_id' => 'required',
             'nigate_id' => 'required',
             ]);
        if($validator->fails()){
            return redirect('/thread')
            ->withInput()
            ->withError($validator);
        }
        $threads = new Thread;
        $threads->thread_name = $request->thread_name;
        $threads->category_id = $request->category_id;
        $threads->nigate_id = $request->nigate_id;
        $threads->save();
        return redirect('/thread');
     }
     
     public function thread_update_view(Thread $thread) {
         $nigates = NigateList::orderBy('id', 'asc')->get();
         $categories = Category::orderBy('id', 'asc')->get();
         return view('thread_update_view', [
             'thread' => $thread,
             'nigates' => $nigates,
             'categories' => $categories,
             ]);
     }
     
     public function thread_update(Request $request) {
         $validator = Validator::make($request->all(), [
             'thread_name' => 'required | max:20',
             'category_id' => 'required',
             'nigate_id' => 'required',
             'id' => 'required',
             ]);
        if ($validator->fails()) {
            return redirect('thread_update_view')
            ->withError($validator);
        }
        $threads = Thread::find($request->id);
        $threads->thread_name = $request->thread_name;
        $threads->category_id = $request->category_id;
        $threads->nigate_id = $request->nigate_id;
        $threads->save();
        return redirect('/thread');
     }
     
     public function user_list() {
         $users = User::orderBy('id' ,'asc')->get();
         return view('user_list',['users' => $users]);
     }
     
     //ユーザー情報の変更はとりあえずなし！
    //  public function user_list_update_view(User $user) {
    //      return view('user_list_update_view', [
    //          'user' => $user,
    //          ])
    //  }
    
    public function user_list_delete(User $user) {
        $user->delete();
        return redirect('user_list');
    }
     
     //<==============ここまで管理者側のスレッドの処理================>
     
}
