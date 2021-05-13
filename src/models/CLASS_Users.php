<?php

class CUsers extends CModel {

    public function getUser($intId):?CUser{
        $arrRows = $this->querySQL("Select * from Users where id=?",$intId);
        if(!$arrRows){
            return null;
        }
        return CUser::fromDB($arrRows[0]);
    }
    public function getUserByNameAndHash($strName,$strHash):?CUser{
        $arrRows = $this->querySQL("Select * from Users where name=? and password_hash=?",$strName, $strHash);
        if(!$arrRows){
            return null;
        }
        return CUser::fromDB($arrRows[0]);
    }

}

class CUser {
    public $intId;
    public $strName;
    public $strPasswordHash;

    public static function fromDB($arrRow):CUser{
        $oUser = new static;
        $oUser->intId = $arrRow["id"];
        $oUser->strName = $arrRow["name"];
        $oUser->strPasswordHash = $arrRow["password_hash"];
        return $oUser;
    }

    public function toDB(){
        return [
            "id"=>$this->intId,
            "name"=>$this->strName,
            "password_hash"=>$this->strPasswordHash
        ];
    }
}

