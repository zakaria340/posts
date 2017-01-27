<?php
/**
 * Created by PhpStorm.
 * User: zaelh
 * Date: 23/01/17
 * Time: 15:14
 */

namespace PostsBundle\Services\PostsServices;

use PostsBundle\Services\Providers\FacebookManager\FacebookManager;

class Posts {


  protected $_facebookManager;

  public function __construct(FacebookManager $facebookManager) {
    $this->_facebookManager = $facebookManager;
  }

  public function getAllPosts() {

    $post = $this->_facebookManager->getAllposts();
    $this->sortPosts($post);
    return $post;
  }

  public function sortPosts($post) {
    return $post;
  }
}
