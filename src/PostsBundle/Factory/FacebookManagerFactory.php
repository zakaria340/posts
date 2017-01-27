<?php
/**
 * Created by PhpStorm.
 * User: zaelh
 * Date: 23/01/17
 * Time: 15:53
 */

namespace PostsBundle\Factory;

use PostsBundle\Services\Providers\FacebookManager\FacebookManager;

class FacebookManagerFactory {

  public static function createFacebookManager($params)
  {
    $facebookPosts = new FacebookManager($params);

    return $facebookPosts;
  }
}