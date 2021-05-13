<?php
class CModel {
    /** @var CMaster */
    protected $oMaster;

    /** @var mysqli  */
    protected $oDB;

    public function __construct(CMaster $oMaster){
        $this->oMaster = $oMaster;
        $this->oDB = $this->oMaster->oDB;
    }


    /**
     * @throws Exception
     */
    protected function querySQL($strSQL, ...$args):?array{
        $stmt = $this->oDB->prepare($strSQL);
        if(!$stmt){
            throw new Exception("Failed to run query $strSQL because ".mysqli_error($this->oDB) );
        }

        if($args){
            $type = array_reduce($args, array($this, "getTypeOfValues"));
            $stmt->bind_param($type, ...$args);
        }
        $stmt->execute();
        if($oResult = $stmt->get_result()){
            return mysqli_fetch_all($oResult, MYSQLI_ASSOC);
        }
        return null;
    }

    private function getTypeofValues($string, $value){
        if(is_float($value)){
            $string .= "d";
        }elseif(is_integer($value)){
            $string .= "i";
        }elseif(is_string($value)){
            $string .= "s";
        }else{
            $string .= "b";
        }
        return $string;
    }

}