<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 10/01/2018
 * Time: 21:20
 */

namespace Blog\Model;


class Post
{

    private $id;

    private $text;

    private $title;

    public function __construct($title, $text, $id = null)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }



}