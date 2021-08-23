<?php

class Js_path{
    public function getRootPath()
    {
        return '/';
    }

    public function get_AssetsPath()
    {
        return '/assets';
    }

    public function get_adminPath()
    {
        return '/admin';
    }

    public function get_stylePath()
    {
        return '/assets/css';
    }

    public function get_scriptPath()
    {
        return '/assets/js';
    }

    public function get_fontPath()
    {
        return '/assets/font';
    }


    public function get_CorePath()
    {
        return '/core';
    }

    public function get_DomainName()
    {
        return $_SERVER['SERVER_NAME'];
    }


   


}