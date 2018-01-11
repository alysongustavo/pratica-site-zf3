<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 11/01/2018
 * Time: 09:50
 */

namespace Blog\Form;


use Zend\Form\Form;

class PostForm extends Form
{

    public function init()
    {
        $this->add([
            'name' => 'post',
            'type' => PostFieldset::class,
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Insert new Post',
            ],
        ]);
    }

}