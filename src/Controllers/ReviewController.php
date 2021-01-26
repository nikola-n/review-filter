<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/Review.php';
require_once __DIR__ . '/../database/DbConnection.php';

use App\Models\Review;

class ReviewController
{

    public function store()
    {
        $reviews = new Review();
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

$result = new Review();
echo '<pre>';
$reviews  = $result->curlApi();
$filtered = $result->getMinRatingReviews($reviews);

/**
 * @param \App\Models\Review $result
 * @param array              $filtered
 *
 * @return array
 */
function sortByRating(Review $result, array $filtered)
{
    return $_GET['rating'] === 'lowest' ? $sortByRating = $result->array_sort($filtered, 'rating', SORT_ASC)
        : $sortByRating = $result->array_sort($filtered, 'rating', SORT_DESC);
}

/**
 * @param \App\Models\Review $result
 * @param array              $sortedByRating
 *
 * @return array
 */
function sortByDate(Review $result, array $sortedByRating)
{
    return $_GET['date'] === 'oldest' ? $sortByRating = $result->array_sort($sortedByRating, 'reviewCreatedOnTime', SORT_ASC)
        : $sortByRating = $result->array_sort($sortedByRating, 'reviewCreatedOnTime', SORT_DESC);
}

/**
 * @param \App\Models\Review $result
 * @param array              $sortedByDate
 *
 * @return array
 */
function sortByText(Review $result, array $sortedByDate)
{
    return $_GET['text'] === 'no' ? $sortByRating = $result->array_sort($sortedByDate, 'reviewFullText', SORT_ASC)
        : $sortByRating = $result->array_sort($sortedByDate, 'reviewFullText', SORT_DESC);
}

$sortedByRating = sortByRating($result, $filtered);

$sortedByDate = sortByDate($result, $sortedByRating);

$sortedByText = print_r(sortByText($result, $sortedByDate));
echo '</pre>';

//$store->store();
//$store = new ReviewController();
