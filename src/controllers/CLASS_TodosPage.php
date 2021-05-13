<?php
class CTodosPage extends CController {
    /**
     * @var CTodosView
     */
    private $oView;
    /**
     * @var CTodos
     */
    private $oModel;

    public function __construct(CMaster $oMaster)
    {
        parent::__construct($oMaster, ["index", "create", "done"], "index");

        include_once  ROOT_DIR."/models/CLASS_Todos.php";
        $this->oModel = new CTodos($oMaster);

        include_once ROOT_DIR . "/views/CLASS_TodosView.php";
        $this->oView = new CTodosView();

    }

    public function index($arrGets, $arrPosts){
        $arrTodos = $this->oModel->listTodos();

        echo $this->oMaster->oView->headers();
        echo $this->oView->listTodos($arrTodos);
        echo $this->oMaster->oView->footer();
    }

    public function create($arrGets, $arrPosts){
        //TODO complete this section to add a todo item
    }

    public function done($arrGets, $arrPosts){
        //TODO complete this section to mark a todo item as done
    }
}