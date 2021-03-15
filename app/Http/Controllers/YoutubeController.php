<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtubes =  DB::table('videos')->where(['user_id' => Auth::user()->id, 'website' => 'youtube'])->orderByDesc('id')->paginate(6);
        return view('youtube', compact('youtubes'));
    }
    public function store(Request $request)
    {
        $randomLink = rand(50, 80);
        $link = $request->link;

        $link = substr($link, 32, 11);


        $title = $request->title;
        DB::table('videos')->insert(
            [
                'key' => Str::random($randomLink),
                'link' => $link,
                'title' => $title,
                'user_id' => Auth::user()->id,
                'website' => 'youtube'
            ]
        );
        return back()->with('inserted', 'Youtube video has been inserted successfully.');
    }
    public function destroy($id)
    {
        DB::table('videos')->where(['id' => $id])->delete();
        return back()->with('deleted', 'Youtube video has been deleted successfully.');
    }
}
