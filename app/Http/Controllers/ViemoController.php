<?php

namespace App\Http\Controllers;

use App\Models\VimeoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViemoController extends Controller
{
    public function index(Request $request){
        $items = VimeoItem::all();
        return view("vimeo.index", compact("items"));
    }

    public function upload(Request $request){
        $validate = $request->validate([
            "video" => ["required"]
        ]);
        $id = Auth::user()->id;
        $file = $request->file("video");
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs(storage_path('tmp'), $file->getClientOriginalName());
        $videoItem = VimeoItem::firstOrNew([
            "user_id" => $id,
        ]);
        $videoItem->name = $filename;
        $videoItem->path = $path;
        $videoItem->save();

        return redirect()->to(route("vimeo.index"));
    }

    public function list(Request $request) {
        return view("vimeo.list");
    }

    public function detail(Request $request, VimeoItem $item) {
        return view("vimeo.detail", compact("item"));
    }
}
