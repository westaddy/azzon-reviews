<?php

namespace Westaddy\Reviews;

trait Review {

    public static function getTableName() {
        return ((new self)->getTable());
    }

    public static function createReview($product_id, $comment, $rating,$ip,$user_id=1) {
        $review = new \Westaddy\Reviews\Models\Review;
        $review->product_id=$product_id;
        $review->user_id=$user_id;
        $review->comment=$comment;
        $review->rating=$rating;
        $review->ip_address=$ip;
        $review->save();
        self::recalculateRating($product_id);
    }

    public static function recalculateRating($id) {
        $reviews = self::getReviews($id);
        $avgRating = $reviews->avg('rating');
        $product = self::find($id);
        $product->rating_cache = round($avgRating, 1);
        $product->rating_count = $reviews->count();
        $product->save();
    }
    public static function getReviews($product_id) {
        $reviews = \Westaddy\Reviews\Models\Review::where('product_id', $product_id)->get();
        return $reviews;
    }

}
