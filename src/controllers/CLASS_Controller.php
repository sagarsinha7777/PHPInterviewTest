<?php
class CController {
    /** @var CMaster */
    protected $oMaster;

    protected $arrActions;
    protected $strDefaultAction;

    public function __construct(CMaster $oMaster, $arrActions, $strDefaultAction){
        $this->oMaster = $oMaster;
        foreach($arrActions as $strAction){
            $this->arrActions[] = strtolower($strAction);
        }
        $this->strDefaultAction = strtolower($strDefaultAction);
    }


    public function process($arrGets, $arrPosts){
        $call = $this->arrActions[0];
        $strRequestAction = strtolower($arrGets["action"]??"");
        if(in_array($strRequestAction,$this->arrActions) &&
            method_exists($this,$strRequestAction)
        ){
            $call = $strRequestAction;
        }elseif(method_exists($this,$this->strDefaultAction)){
            $call = $this->strDefaultAction;
        }

        $this->$call($arrGets, $arrPosts);
    }
}