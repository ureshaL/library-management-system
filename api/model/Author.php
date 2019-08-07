<?php


class Author
{
    private $a_id;
    private $author_name;

    /**
     * Author constructor.
     * @param $a_id
     * @param $author_name
     */
    public function __construct($a_id, $author_name)
    {
        $this->a_id = $a_id;
        $this->author_name = $author_name;
    }

    /**
     * @return mixed
     */
    public function getAId()
    {
        return $this->a_id;
    }

    /**
     * @param mixed $a_id
     */
    public function setAId($a_id)
    {
        $this->a_id = $a_id;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * @param mixed $author_name
     */
    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;
    }


}