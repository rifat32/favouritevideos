<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BasicController extends Controller
{
    public function singleVideo($key){
        $video =  DB::table('videos')->where([
            'key'=>$key
        ])->orderByDesc('id')->paginate(6);
             return view('single-video',compact('video'));
         }
         public function about(){
          return view('about');
             }
    public function welcome() {
        $videos =  DB::table('videos')->where(['user_id' => Auth::user()->id])->orderByDesc('id')->paginate(6);
        return view('welcome',compact('videos'));

    }
    public function search(Request $request){
        $search = $request->search;
        $videos =  DB::table('videos')
            ->where([
            'user_id' => Auth::user()->id,
            ])
            ->where('title', 'like',  '%' . $search .'%')->orderByDesc('id')
            ->paginate(6);
            $videos->appends(['search' => $search]);

        return view('search',compact('videos','search'));

    }
}
