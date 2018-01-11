<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 10/01/2018
 * Time: 21:08
 */

namespace Blog\Controller;

use InvalidArgumentException;

use Blog\Model\PostRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController
{

    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function indexAction()
    {
        return new ViewModel([
            'posts' => $this->postRepository->findAllPosts(),
        ]);
    }

    public function detailAction(){

        $id = $this->params()->fromRoute('id');

        try{
            $post = $this->postRepository->findPost($id);
        }catch (InvalidArgumentException $e){
            return $this->redirect()->toRoute('blog');
        }


        return new ViewModel([
            'post' => $post
        ]);
    }


}