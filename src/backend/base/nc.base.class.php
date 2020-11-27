<?php 

    class nc_object {
        public function __construct($parent) {
            $this->m_ncParent = $parent;
        }

        public function get_parent() {
            return $this->m_ncParent;
        }
        public function get_root() {
            if($this->m_ncParent == null) 
                return $this;
            else 
                return $this->m_ncParent->get_root();
        }
        public function is_root() {
            return ($this->m_ncParent == null);
        }

        protected $m_ncParent;
    };
?>