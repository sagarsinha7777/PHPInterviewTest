<?php

class CTodos extends CModel {

    public function getTodo($intId): ?CTodo {
        $arrRows = $this->querySQL("Select * from Todos where id=?",$intId);
        if(!$arrRows){
            return null;
        }
        return CTodo::fromDB($arrRows[0]);
    }

    public function createTodo(CTodo $oTodo){
        //TODO add the item to the database
    }

    public function listTodos(): array {
        $arrRows = $this->querySQL("Select * from Todos");
        $arrTodos = [];
        foreach ($arrRows as $oRow){
            $arrTodos[] = CTodo::fromDB($oRow);
        }
        return $arrTodos;
    }

    public function markDone($intId){
        //TODO add the item to the database
    }
}

class CTodo {
    public $intId;
    public $strTitle;
    public $bCompleted;

    public function __construct($strTitle, $bCompleted, $intId=null){
        $this->intId = $intId;
        $this->strTitle = $strTitle;
        $this->bCompleted = $bCompleted;
    }

    public static function fromDB($arrRow):CTodo{
        return new static($arrRow["title"], $arrRow["completed"], $arrRow["id"]);
    }

    public function toDB(){
        return [
            "id"=>$this->intId,
            "title"=>$this->strTitle,
            "completed"=>$this->bCompleted
        ];
    }
}

