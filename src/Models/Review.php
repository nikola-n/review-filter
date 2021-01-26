<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../database/DbConnection.php';

use Database\DbConnection;
use PDOException;

class Review extends DbConnection
{

    public $response;

    public $uuid;

    public $review_id;

    public $review_full_text;

    public $review_text;

    //public $num_likes;

    //public $num_comments;

    //public $num_shares;

    public $rating;

    public $review_created_on;

    public $review_created_on_date;

    public $review_created_on_time;

    public $reviewer_id;

    public $reviewer_url;

    public $reviewer_name;

    public $reviewer_email;

    public $source_type;

    public $is_verified;

    public $source;

    public $source_name;

    public $source_id;

    public $tags;

    public $href;

    public $logo_href;

    public $photos;

    /**
     * @param $property
     * @param                    $value
     */
    public function setProperty($property, $value)
    {
        $this->{$property} = $value;
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function getProperty($property)
    {
        return $this->{$property};
    }

    /**
     * @return string
     */
    public function save()
    {
        try {
            $sql  = "INSERT INTO reviews (uuid, review_id, review_text, review_full_text, photos, logo_href, href, tags, source_id, source_name, source, is_verified, source_type, reviewer_email, reviewer_name, reviewer_url, reviewer_id, review_created_on, review_created_on_time, review_created_on_date, rating) VALUES (:uuid, :review_id, :review_full_text, :review_text,  :photos, :logo_href, :href, :tags, :source_id, :source_name, :source, :is_verified, :source_type, :reviewer_email, :reviewer_name, :reviewer_url, :reviewer_id, :review_created_on, :review_created_on_time, :review_created_on_date, :rating)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(':uuid', $this->uuid);
            $stmt->bindParam(':review_id', $this->review_id);
            $stmt->bindParam(':review_full_text', $this->review_full_text);
            //$stmt->bindParam(':num_comments', $this->num_comments);
            $stmt->bindParam(':review_text', $this->review_text);
            //$stmt->bindParam(':num_likes', $this->num_likes);
            //$stmt->bindParam(':num_shares', $this->num_shares);
            $stmt->bindParam(':photos', $this->photos);
            $stmt->bindParam(':logo_href', $this->logo_href);
            $stmt->bindParam(':href', $this->href);
            $stmt->bindParam(':tags', $this->tags);
            $stmt->bindParam(':source_id', $this->source_id);
            $stmt->bindParam(':source_name', $this->source_name);
            $stmt->bindParam(':source', $this->source);
            $stmt->bindParam(':is_verified', $this->is_verified);
            $stmt->bindParam(':source_type', $this->source_type);
            $stmt->bindParam(':reviewer_email', $this->reviewer_email);
            $stmt->bindParam(':reviewer_name', $this->reviewer_name);
            $stmt->bindParam(':reviewer_url', $this->reviewer_url);
            $stmt->bindParam(':reviewer_id', $this->reviewer_id);
            $stmt->bindParam(':review_created_on', $this->review_created_on);
            $stmt->bindParam(':review_created_on_time', $this->review_created_on_time);
            $stmt->bindParam(':review_created_on_date', $this->review_created_on_date);
            $stmt->bindParam(':rating', $this->rating);
            $stmt->execute();
            $id = $this->getConnection()->lastInsertId();

            return $id;

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    /**
     * @return string
     */
    public function curlApi()
    {
        $url  = 'https://embedsocial.com/admin/v2/api/reviews?reviews_ref=0d44e0b0a245de6fc9651f870d8b44efc4653184';
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Bearer escfe7569d859dd903d77664e9983edf',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $this->response = json_decode($response, 1);
        return 0;
    }

}

$review = new Review();
var_dump($review->curlApi());
