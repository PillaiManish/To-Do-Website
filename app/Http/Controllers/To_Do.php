<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use App\User;
use Auth;
use Hash;
class To_Do extends Controller
{
    public function index(){
        if (Auth::check()){
        $todo = ToDo::where('user_id','=',Auth::user()->id)->where('status','=','no')->orderBy('Deadline')->get();
        $completed = ToDo::where('user_id','=',Auth::user()->id)->where('status','=','yes')->orderBy('Completed','desc')->get();
        return view('index',compact('todo','completed'));
        }
        return redirect('/signin');
    }

    public function add(Request $request){

        // Validation
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'deadline' => 'required|date|after_or_equal:today',
            'priority'=>'required',
        ]);

        $new_todo = new ToDo;
        $new_todo->Title=$request->input('title');
        $new_todo->Description=$request->input('description');
        $new_todo->Deadline=$request->input('deadline');
        $new_todo->Priority=$request->input('priority');
        $new_todo->user_id = Auth::user()->id;
        $new_todo->save();
        return redirect('/');
    }



    public function signup(){
        if (!Auth::check()){
        return view('signup');
        }
        return redirect('/');
    }

    public function post_signup(Request $request){

        $request->validate([
            'name' => 'required|alpha|max:70',
            'email' => 'required|email|unique:users',
            'password'=>'required|min:8',
        ]);

        $new_user = new User;
        $new_user->name = $request->input('name');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();
        return redirect('/signin');

    }

    public function signin(){
        if (!Auth::check()){
            return view('signin');
        }
        return redirect('/');
    }


    public function post_signin(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);


            $email = $request->input('email');
            $password = $request->input('password');
            $info = ['email'=>$email,'password'=>$password];
            if(auth()->attempt($info)){
                return redirect('/');
            }

            return redirect('signin')->with('message','E-mail or Password is wrong');
        }

    public function signout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/signin');

    }


        public function delete($id){
            if(Auth::check()){
                try{
        $delete_todo = ToDo::where('user_id','=',Auth::user()->id)->where('id','=',$id)->firstOrFail();
    }

    catch (Exception $e){
        return redirect('/');
             }   
        $delete_todo->delete();
        return redirect('/');
            }
        return redirect('/');
        // current user owner of delete post
    }

    public function complete($id){
        if(Auth::check()){

            try{
        $complete_todo = ToDo::where('user_id','=',Auth::user()->id)->where('id','=',$id)->firstOrFail();
                  }
             catch (Exception $e){
             return redirect('/');
                  }   
        $complete_todo->status = 'yes';
        $complete_todo->Completed = now();
        $complete_todo->update();
        }
        return redirect('/');

    }

    public function edit($id){
        if(Auth::check()){

        try{
            $edit_todo = ToDo::where('user_id','=',Auth::user()->id)->where('id','=',$id)->firstOrFail();
            return view('edit',compact('edit_todo'));

        }

        catch (Exception $e){
            return redirect('/');
        }   
        
        }
        return redirect('/');
    }

    public function update_edit(Request $request,$id){

        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'deadline' => 'required|date|after_or_equal:today',
            'priority'=>'required',
        ]);

        $edit_todo = ToDo::where('user_id','=',Auth::user()->id)->find($id);
        $edit_todo->Title=$request->input('title');
        $edit_todo->Description=$request->input('description');
        $edit_todo->Deadline=$request->input('deadline');
        $edit_todo->Priority=$request->input('priority');
        $edit_todo->update();


        return redirect('/');
    }
}
