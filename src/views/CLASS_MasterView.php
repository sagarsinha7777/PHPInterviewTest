<?php
class CMasterView extends CView{

    function headers(): string {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" >
              <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <script language="javascript" type="text/javascript" src="/js/jquery-1.5.1.min.js"></script>
                <script language="javascript" type="text/javascript" src="/js/jquery-ui-1.8.14.custom.min.js"></script>
                <link type="text/css" rel="stylesheet" href="/css/base.css">
                <link rel="shortcut icon" href="#">
                </head>
                <body>';
    }

    function footer(): string {
        return '</body>';
    }
}
