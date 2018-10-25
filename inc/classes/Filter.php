<?php
/**
 * Created by PhpStorm.
 * User: Sagar
 * Date: 24/10/2018
 * Time: 12:34
 */

if (!defined('__CONFIG__')) {
    exit('You do not have any configurations');
}

class Filter
{
    /**
     * String to filter before putting inside InnoDB
     * @param $string
     * @param bool $html
     *  @return string - valid string to put into the Database.
     */
    public static function String($string, $html = false) {
        if (!$html) {
            $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
        } else {
            $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $string;
    }

    /**
     *  @param string $email Email to filter before putting inside InnoDB
     *  @return string - valid or invalid email address
     */
    public static function Email( $email ) {
        return filter_var( $email , FILTER_SANITIZE_EMAIL);
    }

    /**
     *  @param string $url String to filter before putting inside InnoDB
     *  @return \http\Url Filters and returns a valid or invalid URL
     */
    public static function URL( $url ) {
        return filter_var( $url , FILTER_SANITIZE_URL);
    }

    /**
     *  @param int $integer	The string to filter and turn into an integer
     *  @return int Returns an integer after being filtered.
     */
    public static function Int( $integer ) {
        return (int) $integer = filter_var( $integer , FILTER_SANITIZE_NUMBER_INT);
    }

}