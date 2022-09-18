<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function Create(Request $req, $product_id, $review_id = null){
        Review::create([
            'review' => $req->review,
            'review_id' => $review_id,
            'user_id' => Auth::id(),
            'product_id' => $product_id,
        ]);

        return back();
    }

    public function DeleteFromAdmin($review_id){
        $this->DeleteReview($review_id);
        return back();
    }

    public function DeleteFromUser($review_id){

        $this->DeleteReview($review_id);
        return back();
    }

    private function DeleteReview($review_id){
        if(Review::where('id', $review_id)->first()){
            Review::where('id', $review_id)->first()->delete();
        }
    }

}
