<?php

namespace PostsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {
  /**
   * @Route("/")
   */
  public function indexAction() {


    $postsService = $this->container->get('posts.service');
    $allposts = $postsService->getAllPosts();
    var_dump($allposts);
    die;


    return $this->render('PostsBundle:Default:index.html.twig');

  }
}
