<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
