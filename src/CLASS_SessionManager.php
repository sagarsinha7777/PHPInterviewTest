<?php

class CSessionManager {
    /** @var bool */
    protected $hasSession = false;

    public function __construct(){
        session_start();
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
            $this->hasSession = true;
        }
    }

    public function checkSession():bool{
        return $this->hasSession;
    }

    public function startSession(){
        $_SESSION['loggedIn']=true;
        $this->hasSession = true;
    }

    public function get($strKey){
        return $_SESSION[$strKey]??"";
    }

    public function set($strKey,$strValue){
        $_SESSION[$strKey]=$strValue;
    }

    public function closeSession(){
        $_SESSION['loggedIn']=false;
    }
}