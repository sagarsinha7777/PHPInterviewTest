<?php

class CLoginViews extends CView {

    public function loginForm($strErrors=""): string {
       return  '<div class="login-page">
            <div class="form">
            <div ><span style="background: lightcoral">'.$strErrors.'</span>   </div>
            <div>Default login is admin and password admin</div>
                <form class="login-form" method="post" action="?action=login" >
                    <input name="name" type="text" placeholder="username"/>
                    <input name="password" type="password" placeholder="password"/>
                    <button type="submit">login</button>
                </form>
            </div>
        </div>';
    }
}