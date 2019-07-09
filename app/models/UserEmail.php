<?php



class UserEmail extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var integer
     */
    public $id_email;

    /**
     *
     * @var integer
     */
    public $is_sender;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mailserverapp");
        $this->setSource("user_email");
        $this->belongsTo('id_email', 'Email', 'id', ['alias' => 'Email']);
        $this->belongsTo('id_user', 'User', 'id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_email';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserEmail[]|UserEmail|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserEmail|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
