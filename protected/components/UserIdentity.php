<?php


class UserIdentity extends CUserIdentity
{

    private $_id;
    public function authenticate()
    {
        $record=Usuario::model()->findByAttributes(array('cEmail'=>$this->username));
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }

        else if($record->cPassword!==crypt($this->password,$this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->nUser;
           // $this->setState('nUser', $record->nUser);
//            $this->setState('roles', 'RCP');
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

}