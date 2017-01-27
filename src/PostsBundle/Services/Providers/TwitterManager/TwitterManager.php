<?php
/**
 * Created by PhpStorm.
 * User: zaelh
 * Date: 23/01/17
 * Time: 15:53
 */

namespace PostsBundle\Services\Providers\TwitterManager;

use Symfony\Component\HttpFoundation\Request;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterManager {

  private $fb_app_id;
  private $fb_app_secret;


  public function __construct($params) {
    $this->fb_app_id = $params['fb_app_id'];
    $this->fb_app_secret = $params['fb_app_secret'];


  }


  public function getAllposts() {
    $fb_page_profile_name = "asa7bess";
    $fb = new \Facebook\Facebook(
      [
        'app_id'                => $this->fb_app_id,
        'app_secret'            => $this->fb_app_secret,
        'default_graph_version' => 'v2.2',
      ]
    );


    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");
    
    $access_token = $fb->getApp()->getAccessToken()->getValue();

    $url = 'https://graph.facebook.com/' .
      $fb_page_profile_name .
      '/posts?fields=id,message,link,attachments{media}&access_token=' . $access_token;

    $headers = get_headers($url);
    $response = substr($headers[0], 9, 3);
    if ($response == "200") {
      $results = file_get_contents($url);
      $results = json_decode($results);
    }
    else {
      $results = [];
    }

    return $results;
  }
}
