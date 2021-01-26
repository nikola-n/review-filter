<?php

require_once __DIR__ . '/../Models/Review.php';
require_once __DIR__ . '/../database/DbConnection.php';

use App\Models\Review;

class ReviewController
{

    public function store()
    {
        $reviews  = new Review();
        $reviews->curlApi();
        foreach ($reviews->response['reviews'] as $key => $value) {
            $reviews->setProperty("uuid", $value["id"]);
            $reviews->setProperty("review_id", $value["reviewId"]);
            $reviews->setProperty("review_full_text", $value["reviewFullText"]);
            $reviews->setProperty("num_comments", $value["numComments"]);
            $reviews->setProperty("review_text", $value["reviewText"]);
            //$reviews->setProperty("num_likes", $value["numLikes"]);
            //$reviews->setProperty("num_shares", $value["numShares"]);
            //$reviews->setProperty("photos", $value["photos"]);
            $reviews->setProperty("logo_href", $value["logoHref"]);
            $reviews->setProperty("href", $value["href"]);
            $reviews->setProperty("tags", $value["tags"]);
            $reviews->setProperty("source_id", $value["sourceId"]);
            $reviews->setProperty("source_name", $value["sourceName"]);
            $reviews->setProperty("source", $value["source"]);
            $reviews->setProperty("is_verified", $value["isVerified"]);
            $reviews->setProperty("source_type", $value["sourceType"]);
            $reviews->setProperty("reviewer_email", $value["reviewerEmail"]);
            $reviews->setProperty("reviewer_name", $value["reviewerName"]);
            $reviews->setProperty("reviewer_url", $value["reviewerUrl"]);
            $reviews->setProperty("reviewer_id", $value["reviewerId"]);
            $reviews->setProperty("review_created_on", $value["reviewCreatedOn"]);
            $reviews->setProperty("review_created_on_time", $value["reviewCreatedOnTime"]);
            $reviews->setProperty("review_created_on_date", $value["reviewCreatedOnDate"]);
            $reviews->save();
        }
    }

}

$store = new ReviewController();
$store->store();
