<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FacebookController extends Controller
{
    public function index(){
        $facebooks =  DB::table('videos')->where(['user_id' => Auth::user()->id,'website'=>'facebook'])->orderByDesc('id')->paginate(6);
             return view('facebook',compact('facebooks'));
         }
         public function store(Request $request) {
            $randomLink = rand(50,80);
            $link = $request->link;
            $title = $request->title;
            DB::table('videos')->insert([
             'key' => Str::random($randomLink),
             'link' => $link,
             'title' => $title,
             'user_id' => Auth::user()->id,
             'website'=>'facebook'
            ]
            );
            return back()->with('inserted','Facebook video has been inserted successfully.');
     }
        public function destroy($id){
         DB::table('videos')->where(['id'=>$id])->delete();
         return back()->with('deleted','Facebook video has been deleted successfully.');
        }
}
