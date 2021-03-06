<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 11/01/2018
 * Time: 09:49
 */

namespace Blog\Form;


use Zend\Form\Fieldset;

class PostFieldset extends Fieldset
{

    public function init()
    {
        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'title',
            'options' => [
                'label' => 'Post Title',
            ],
        ]);

        $this->add([
            'type' => 'textarea',
            'name' => 'text',
            'options' => [
                'label' => 'Post Text',
            ],
        ]);
    }
}