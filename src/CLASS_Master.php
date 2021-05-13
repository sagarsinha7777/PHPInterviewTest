<?PHP

class CMaster {
    /** @var mysqli  */
    public $oDB;

    /** @var CSessionManager */
    public $oSessionMan;

    public $oView;

    public function __construct(mysqli $oDB, CSessionManager $oSessionMan){
        $this->oDB = $oDB;
        $this->oSessionMan = $oSessionMan;

        require_once ROOT_DIR."/views/CLASS_MasterView.php";
        $this->oView = new CMasterView();


    }
}