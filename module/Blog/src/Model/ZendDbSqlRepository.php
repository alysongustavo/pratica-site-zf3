<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 11/01/2018
 * Time: 00:33
 */

namespace Blog\Model;


use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Sql;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use RuntimeException;
use InvalidArgumentException;

class ZendDbSqlRepository implements PostRepositoryInterface
{

    private $db;

    private $hydrator;

    private $postPrototype;

    public function __construct(AdapterInterface $adapter, HydratorInterface $hydrator, Post $postPrototype)
    {
        $this->db = $adapter;
        $this->hydrator = $hydrator;
        $this->postPrototype = $postPrototype;
    }

    /**
     * Return a set of all blog posts that we can iterate over.
     *
     * Each entry should be a Post instance.
     *
     * @return Post[]
     */
    public function findAllPosts()
    {
        $sql = new Sql($this->db);
        $select = $sql->select('posts');
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if(! $result instanceof ResultInterface || ! $result->isQueryResult()){
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->postPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }

    /**
     * Return a single blog post.
     *
     * @param  int $id Identifier of the post to return.
     * @return Post
     */
    public function findPost($id)
    {
        $sql = new Sql($this->db);
        $select = $sql->select('posts');

        $select->where(['id' => $id]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if(! $result instanceof ResultInterface || ! $result->isQueryResult()){
            throw new RuntimeException(sprintf('Failed retrieving blog post with identifier "%s"; unknown database error.', $id));
        }

        $resultSet = new HydratingResultSet($this->hydrator,$this->postPrototype);
        $resultSet->initialize($result);

        $post = $resultSet->current();

        if (! $post) {
            throw new InvalidArgumentException(sprintf(
                'Blog post with identifier "%s" not found.',
                $id
            ));
        }

        return $post;


    }
}