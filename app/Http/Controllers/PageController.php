<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Web;
use App\Models\WebType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home() {
        $data = WebType::all();
        return view('guest.home', compact('data'));
    }

    public function myweb() {
        $access = Access::where('user_id', Auth::id())->get();
        if (Auth::user()->role == 'superadmin') {
            $data = Web::all();
        } else {
            $data = $access->map(function ($accessItem) {
                return $accessItem->web; // Relasi 'web'
            })->filter();
        }
        $data->transform(function ($data) {
            $data->template = $data->webType->type;
            return $data;
        });
        return view('guest.my-web', compact('data'));
    }

    public function template() {
        $data = WebType::all();
        // dd($data);
        return view('guest.template', compact('data'));
    }

    public function website($slug) {
        $data = Web::where('url', $slug)->first();

        if (!$data) {
            return redirect()->back();
        }

        $access = Access::where('web_id', $data->id)->where('user_id', Auth::id())->first();
        $data->product->transform(function ($data) {
            $data->image = asset('storage/images/product/'.$data->image);
            return $data;
        });
        if ((Auth::user()->role ?? '') === 'superadmin') {
            $admin = true;
        } elseif ($access) {
            $admin = true;
        } else {
            $admin = false;
        }
        $tag_position = $data->content->tag_position ?? 'top';
        $tags = $data->tags;
        return view('guest.'.strtolower(Str::slug($data->webType->type, '-')).'.home', compact('data', 'admin', 'tags', 'tag_position'));
    }

    public function product($slug) {
        $data = Web::where('url', $slug)->first();
        $access = Access::where('web_id', $data->id)->where('user_id', Auth::id())->first();
        $data->product->transform(function ($data) {
            $data->image = asset('storage/images/product/'.$data->image);
            return $data;
        });
        if ((Auth::user()->role ?? '') === 'superadmin') {
            $admin = true;
        } elseif ($access) {
            $admin = true;
        } else {
            $admin = false;
        }
        return view('guest.'.strtolower(Str::slug($data->webType->type, '-')).'.product', compact('data', 'admin'));
    }

    public function link($slug) {
        $data = Web::where('url', $slug)->first();
        $access = Access::where('web_id', $data->id)->where('user_id', Auth::id())->first();
        $data->product->transform(function ($data) {
            $data->image = asset('storage/images/product/'.$data->image);
            return $data;
        });
        if ((Auth::user()->role ?? '') === 'superadmin') {
            $admin = true;
        } elseif ($access) {
            $admin = true;
        } else {
            $admin = false;
        }
        return view('guest.'.strtolower(Str::slug($data->webType->type, '-')).'.link', compact('data', 'admin'));
    }

    public function dashboard() {
        return view('dashboard');
    }
}
