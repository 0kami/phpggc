<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 14:02
 */

namespace PHPGGC\GadgetChain;

abstract class FileDelete extends \PHPGGC\GadgetChain
{
    public static $type = self::TYPE_FD;
    public $parameters = [
        'remote_file'
    ];
}