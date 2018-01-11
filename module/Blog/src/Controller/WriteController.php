<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 11/01/2018
 * Time: 09:51
 */

namespace Blog\Controller;

use Blog\Form\PostForm;
use Blog\Model\PostCommandInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WriteController extends AbstractActionController
{

    /**
     * @var PostCommandInterface
     */
    private $command;

    /**
     * @var PostForm
     */
    private $form;

    public function __construct(PostCommandInterface $command, PostForm $postForm)
    {
        $this->command = $command;
        $this->form = $postForm;

    }

    public function addAction()
    {

    }



}