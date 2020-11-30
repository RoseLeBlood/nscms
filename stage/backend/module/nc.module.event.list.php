<?php 

    class nc_module_event_list extends nc_object {
        public function __construct($parent) {
            nc_object::__construct($parent);
            
            $this->m_arrayEvents = array();
        }
        public function push($from, $event) {
            if(is_array($event)) $type = "array";
            else if(is_object($event)) $type = "object";
            else if(is_file($event)) $type = "file";
            else if(is_numeric($event)) $type = "numeric";
            else if(is_string($event)) $type = "string";
            else if(is_real($event)) $type = "flaot";
            else $type = "other";
            
            array_push($this->m_arrayEvents, ["from" => $from,  "type" => $type, "value" => $event]);
        }
        public function pop() {
           return array_pop($this->m_arrayEvents); 
        }
        public function peek() {
            $event = array_pop($this->m_arrayEvents);
            array_push($this->m_arrayEvents, $event);

            return $event;
        }
        public function count() {
            return count($this->m_arrayEvents);
        }

        protected $m_arrayEvents;
    };

?>