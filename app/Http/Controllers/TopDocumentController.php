<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TopDocumentController extends Controller
{
    // トップドキュメントを表示
    public function index()
    {
        // 現在ログインしているかを判定
        $isLogin = Auth::check();

        return view('top_document', compact(['isLogin']));
    }
}
