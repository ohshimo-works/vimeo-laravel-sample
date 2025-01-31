<?php

namespace App\Http\Controllers;

use App\Models\VimeoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\Facades\Vimeo;
use Illuminate\Support\Str;
// use Vimeo\Vimeo;

class ViemoController extends Controller
{
    public function index(Request $request){
        $items = VimeoItem::all();
        $user = Auth::user();
        return view("vimeo.index", compact("items", "user"));
    }

    public function upload(Request $request){
        $validate = $request->validate([
            "video" => ["required"]
        ]);
        $id = Auth::user()->id;
        $file = $request->file("video");
        $filename = Str::uuid();
        $path = $file->storeAs('tmp', $filename . '.' . $file->extension());
        $videoItem = VimeoItem::firstOrNew([
            "user_id" => $id,
        ]);
        $videoItem->name = $filename;
        $videoItem->path = Vimeo::upload(Storage::path($path));
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
