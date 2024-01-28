<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\notes;

class HomeController extends Controller
{
    public function Home(){
       
            return view("dashboard");
           
    }

    public function getData(){
        if(Session()->has("loginid")){
            $user = Session()->get("loginid");
            $data = User::where("id","=",$user->id)->first();
            $users = notes::with('user')->where("user_id","=",$data->id)->first();
            


            // logic to show notes of specific user in dashboard
            $notes = notes::with('user')->where("user_id","=",$data->id)->get();
            // return view("dashboard",compact("data","notes","users"));
            // $data = compact("notes","users");
            
            return response()->json(['data'=>$notes,"users"=>$data]);
        }
    }

   public function NewNotes(){
    return view("newNotes");
   }



   public function storenotes(Request $request){
    $notes = new notes();
    $userid = Session()->get("loginid");
    $user = User::where("id","=",$userid->id)->first();
    $notes->user_id = $user->id;
    $notes->title = $request->title;
    $notes->description = $request->desc;

    $notes->save();

    return redirect()->route("dashboard");
   }

   public function update($id){
    
        $title = "Update notes";
        $route = "/updatenotes/".$id;

        $updatenotes = notes::find($id);
      

        return view("create",compact("title","route","updatenotes","id"));
   }

   public function updateNotes($id,Request $request){
        $notes = notes::find($id);
        $notes->title = $request->title;
        $notes->description = $request->desc;
        $notes->save();
        // return redirect()->route("dashboard");
   }

   public function deleteNotes($id){
    notes::find($id)->delete();
    return back();
   }
}
