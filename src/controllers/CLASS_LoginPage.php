<?php

class CLoginPage extends CController {

    /**
     * @var CLoginViews
     */
    private $oView;
    /**
     * @var CUsers
     */
    private $oModel;

    public function __construct(CMaster $oMaster)
    {
        parent::__construct($oMaster, ["index","login"], "index");

        include_once  ROOT_DIR."/models/CLASS_Users.php";
        $this->oModel = new CUsers($oMaster);

        include_once  ROOT_DIR."/views/CLASS_LoginViews.php";
        $this->oView = new CLoginViews();

    }

    public function index($arrGets, $arrPosts){
        echo $this->oMaster->oView->headers();
        echo $this->oView->loginForm();
        echo $this->oMaster->oView->footer();
    }

    public function login($arrGets, $arrPosts){
        $oUser = $this->oModel->getUserByNameAndHash($arrPosts["name"],sha1($arrPosts["password"]));
        if(!$oUser){
            $strErrors = "Invalid username and password";
            echo $this->oMaster->oView->headers();
            echo $this->oView->loginForm($strErrors);
            echo $this->oMaster->oView->footer();
            return;
        }

        $this->oMaster->oSessionMan->startSession();
        header('Location: /todos/');
    }


}