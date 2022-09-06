<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class DocumensController extends Controller
{
    public function OpenOffert(){
        $pathToOffer = Storage::disk('public')->path('Documents/offert.pdf');
        return response()->file($pathToOffer);
    }
}
