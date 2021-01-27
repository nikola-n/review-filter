<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/Review.php';
require_once __DIR__ . '/../../database/DbConnection.php';

use PDO;
use App\Models\Review;
use Database\DbConnection;

class ReviewController extends DbConnection
{
    /**
     * Store records from API to database
     */
    public function store()
    {
        $reviews  = new Review();
        $response = $reviews->curlApi();

        foreach ($response as $key => $value) {
            $reviews->setProperty("uuid", $value["id"]);
            $reviews->setProperty("review_id", $value["reviewId"]);
            $reviews->setProperty("review_full_text", $value["reviewFullText"]);
            $reviews->setProperty("num_comments", $value["numComments"]);
            $reviews->setProperty("review_text", $value["reviewText"]);
            $reviews->setProperty("rating", $value["rating"]);
            $reviews->setProperty("num_likes", $value["numLikes"]);
            $reviews->setProperty("num_shares", $value["numShares"]);
            $reviews->setProperty("logo_href", $value["logoHref"]);
            $reviews->setProperty("href", $value["href"]);
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

    /**
     * Filter and sort according to requests from the form
     */
    public function filterAndSort()
    {
        $minRating      = $_GET['min-rating'];
        $orderByRating  = $_GET['rating'];
        $orderByDate    = $_GET['date'];
        $prioritizeText = $_GET['text'];

        try {
            $sql = 'SELECT * FROM reviews WHERE reviews.rating >= ' . $minRating;

            $sql = $this->ratingSort($orderByRating, $sql);

            $sql = $this->dateSort($orderByDate, $sql);

            $sql = $this->prioritizeText($prioritizeText, $sql);

            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

        return $reviews;
    }

    // SQL Solution sort methods

    /**
     * @param $orderByRating
     * @param $sql
     *
     * @return string
     */
    protected function ratingSort($orderByRating, $sql)
    {
        return $orderByRating === 'lowest' ? $sql .= ' ORDER BY rating ASC' : $sql .= ' ORDER BY rating DESC';
    }

    /**
     * @param $orderByDate
     * @param $sql
     *
     * @return string
     */
    protected function dateSort($orderByDate, $sql)
    {
        return $orderByDate === 'oldest' ? $sql .= ', review_created_on_time ASC' : $sql .= ', review_created_on_time DESC';
    }

    /**
     * @param $prioritizeText
     * @param $sql
     *
     * @return string
     */
    protected function prioritizeText($prioritizeText, $sql)
    {
        return $prioritizeText === 'yes' ? $sql .= ', CHAR_LENGTH(review_full_text);' : $sql.= '';
    }

    // Solution with array sorting and filtering
    public function filterSort()
    {
        $review = new Review();

        $AllReviews = $review->curlApi();
        $filtered   = $review->getMinRatingReviews($AllReviews);

        $sortedByRating = $this->sortByRating($review, $filtered);

        $sortedByDate = $this->sortByDate($review, $sortedByRating);

        return $result = $this->sortByText($review, $sortedByDate);
    }

    // Array sorting and filtering solution methods

    /**
     * @param \App\Models\Review $review
     * @param array              $filtered
     *
     * @return array
     */
    public function sortByRating(Review $review, array $filtered)
    {
        return $_GET['rating'] === 'lowest' ? $sortByRating = $review->array_sort($filtered, 'rating', SORT_ASC)
            : $sortByRating = $review->array_sort($filtered, 'rating', SORT_DESC);
    }

    /**
     * @param \App\Models\Review $review
     * @param array              $sortedByRating
     *
     * @return array
     */
    public function sortByDate(Review $review, array $sortedByRating)
    {
        return $_GET['date'] === 'oldest' ? $sortByRating = $review->array_sort($sortedByRating, 'reviewCreatedOnTime', SORT_ASC)
            : $sortByRating = $review->array_sort($sortedByRating, 'reviewCreatedOnTime', SORT_DESC);
    }

    /**
     * @param \App\Models\Review $review
     * @param array              $sortedByDate
     *
     * @return array
     */
    public function sortByText(Review $review, array $sortedByDate)
    {
        return $_GET['text'] === 'no' ? $sortByRating = $review->array_sort($sortedByDate, 'reviewFullText', SORT_ASC)
            : $sortByRating = $review->array_sort($sortedByDate, 'reviewFullText', SORT_DESC);
    }

}

$store = new ReviewController();
$store->store();
echo '<pre>';
print_r($store->filterAndSort());
echo '</pre>';
die();
//==================================================================================

$sortedArray = new ReviewController();
echo '<pre>';
print_r($sortedArray->filterSort());
echo '</pre>';


