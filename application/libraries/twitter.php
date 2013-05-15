<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     util
 * @author      Hermes Canuto
 * @since       Version 1.1

 */

class twitter {

    function getTwitter($username, $limit = 4) {

        $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=" . $limit;
        $twitterFeed = file_get_contents($feed);
        return $this -> parse_feed($twitterFeed, $username);
    }

    function parse_feed($feed, $username) {

        $data = array();

        $feed = str_replace("&lt;", "<", $feed);
        $feed = str_replace("&gt;", ">", $feed);
        $clean = explode("<content type=\"html\">", $feed);

        $img = "<img src='https://api.twitter.com/1/users/profile_image?screen_name=$username' />";

        $amount = count($clean) - 1;

        for ($i = 1; $i <= $amount; $i++) {
            $cleaner = explode("</content>", $clean[$i]);
            $data[] = array('img_Twitter' => $img, 'post_Twitter' => $cleaner[0]);
        }

        return $data;

    }

}
