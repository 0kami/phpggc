<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */


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
        protected $type;
    }

    trait ModelEvent{
        protected $withEvent;
    }

}

namespace think {
    abstract class Model{
        use model\concern\RelationShip;
        use model\concern\Conversion;
        use model\concern\Attribute;
        use model\concern\ModelEvent;

        private $lazySave;
        private $exists;
        private $force;
        protected $connection;
        protected $suffix;

        function __construct($obj, $closure)
        {
            if($obj == null){
                $this->data = array("wh1t3p1g"=>[]);
                $this->relation = array("wh1t3p1g"=>[]);
                $this->visible= array("wh1t3p1g"=>[]);
                $this->withAttr = array("wh1t3p1g"=>$closure);
            }else{
                $this->lazySave = true;
                $this->withEvent = false;
                $this->exists = true;
                $this->force = true;
                $this->data = array("wh1t3p1g"=>[]);
                $this->connection = "mysql";
                $this->suffix = $obj;
            }

        }
    }

}

namespace think\model {
    class Pivot extends \think\Model{

        function __construct($obj, $closure)
        {
            parent::__construct($obj, $closure);
        }
    }
}