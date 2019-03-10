<?php
if (! function_exists('getCurrentTime')) {

    function getCurrentTime($time = 0)
    {
        if (empty($time)) {
            if (defined('CURRENT_TIMESTAMP')) {
                return new \MongoDate(CURRENT_TIMESTAMP);
            } else {
                return new \MongoDate();
            }
        } else {
            return new \MongoDate($time);
        }
    }
}