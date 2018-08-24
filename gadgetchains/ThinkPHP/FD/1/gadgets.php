<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace think\process\pipes {
    class Windows {
        private $files = [

        ];

        public function __construct($files)
        {
            $this->files = array($files);
        }
    }
}