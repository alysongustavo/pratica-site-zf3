<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 10/01/2018
 * Time: 21:18
 */

namespace Blog\Model;


interface PostRepositoryInterface
{

    /**
     * Return a set of all blog posts that we can iterate over.
     *
     * Each entry should be a Post instance.
     *
     * @return Post[]
     */
    public function findAllPosts();

    /**
     * Return a single blog post.
     *
     * @param  int $id Identifier of the post to return.
     * @return Post
     */
    public function findPost($id);

}