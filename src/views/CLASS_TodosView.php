<?php

class CTodosView extends CView {

    public function listTodos(array $arrTodos): string {
       $strHTML = "<h1>Todos</h1>";

       $strHTML .= "<div>";
       $strHTML .= "<h2>Remaining:</h2>";

        /** @var CTodo $oTodo */
       foreach ($arrTodos as  $oTodo){
           if($oTodo->bCompleted) continue;

           $strHTML .= "<div><span>". $oTodo->strTitle ."</span> <input type='checkbox' onclick='markDone(\"{$oTodo->intId}\")'></div>";
       }
       $strHTML .= "</div>";

        $strHTML .= "<div>";
        $strHTML .= "<h2>Done:</h2>";
        /** @var CTodo $oTodo */
        foreach ($arrTodos as  $oTodo){
            if(!$oTodo->bCompleted) continue;

            $strHTML .= "<div><span>". $oTodo->strTitle ."</span></div>";
        }
        $strHTML .= "</div>";

        $strHTML .= "<div>";
        $strHTML .= "<h2>Add Item:</h2>";

        $strHTML .= <<<EOD
<form class="todo-form" method="post" action="?action=create">
    <input type="text" name="title" placeholder="Title...">
    <input type="submit" value="Add"/>
</form>
EOD;
        $strHTML .= "</div>";

        $strHTML .= '<script language="javascript" type="text/javascript" src="/js/todos/todo.js"></script>';
       return $strHTML;
    }
}
