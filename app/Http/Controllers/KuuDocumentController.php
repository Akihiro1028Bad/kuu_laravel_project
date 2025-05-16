<?php

namespace App\Http\Controllers;

class KuuDocumentController extends Controller
{   
    // トップドキュメントを表示
    public function index()
    {
        return view('top_document');
    }
}
