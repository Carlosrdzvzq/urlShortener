<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class urlController extends Controller
{
    
    public function index(){
        $shortLinks = Url::latest()->get();
        return view('shortLink', compact('shortLinks'));
    }   

    public function store(Request $request){
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        Url::create($input);

        return redirect('generate-short-link')->withSuccess('Shorten Link Generated successfully.');

    }

    public function shortLink($code){
        $find = Url::where('code', $code)->first();
        return redirect($find->link);
    }   

}
