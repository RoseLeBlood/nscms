<?php 
    require_once "backend/module/nc.module.event.list.php";

    abstract class  nc_interface_module  {
        public function __construct() { 
            $this->m_eventList = new nc_module_event_list();
        }
        public abstract function get_visual_object();

        public function add_event($from, $event) {
            $this->m_eventList->push($from, $event);
        }
        public function get_event() {
            return $this->m_eventList->pop();
        }
        protected $m_eventList;
    };
?>   