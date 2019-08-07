<?php


class Book
{
    private $isbn;
    private $book_name;
    private $a_id;
    private $c_id;
    private $p_id;
    private $qty;
    private $status;

    /**
     * Book constructor.
     * @param $isbn
     * @param $book_name
     * @param $a_id
     * @param $c_id
     * @param $p_id
     * @param $qty
     * @param $status
     */
    public function __construct($isbn, $book_name, $a_id, $c_id, $p_id, $qty, $status)
    {
        $this->isbn = $isbn;
        $this->book_name = $book_name;
        $this->a_id = $a_id;
        $this->c_id = $c_id;
        $this->p_id = $p_id;
        $this->qty = $qty;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->book_name;
    }

    /**
     * @param mixed $book_name
     */
    public function setBookName($book_name)
    {
        $this->book_name = $book_name;
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
    public function getCId()
    {
        return $this->c_id;
    }

    /**
     * @param mixed $c_id
     */
    public function setCId($c_id)
    {
        $this->c_id = $c_id;
    }

    /**
     * @return mixed
     */
    public function getPId()
    {
        return $this->p_id;
    }

    /**
     * @param mixed $p_id
     */
    public function setPId($p_id)
    {
        $this->p_id = $p_id;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}