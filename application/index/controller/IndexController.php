<?php
/**
 * 网站首页
 */

namespace app\index\controller;


class IndexController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    
}