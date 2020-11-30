<?php 
    require_once dirname(__FILE__) . "/../stage/backend/config/nc.config.php";
    require_once dirname(__FILE__) . "/../stage/backend/base/nc_base_vfile.php";

    require_once dirname(__FILE__) . "/../stage/frontend/nc.front.base.page.php";
    require_once dirname(__FILE__) . "/../stage/frontend/nc.front.blog.content.php";

    /**
     * Variant two, see comments from class 'nc_example_content' for details of this class
     */ 
    class nc_example_variantTwoWithClass extends nc_visual_modular {
      public function __construct($parent) {
            nc_visual_modular::__construct(
                new nc_base_vfile('Gert!', "", null), $parent );
        }
    };
    /**
     * This is ower content for the main sektion of the site
     * We use for content the 'nc_base_vfile' file-template. 
     * Whit content 'Hello-World {_%_NC_EXAMPLE_REPLACE_%_}' 
     * 
     * {_%_NC_EXAMPLE_REPLACE_%_} is a variable. We can override with a string,
     * from a other object, use function 
     * '$this->add_module($variableWithout{_%}signes, $theContentObject)' in the __construct
     * 
     * or with function 'set_variable($variableWithout{_%}signes, $newContentAsString)' in function
     * 'public function setvar()'. 
     * 
     * 
     */ 
    class nc_example_content extends nc_visual_modular {
        public function __construct($parent) {
            nc_visual_modular::__construct(
                new nc_base_vfile('<h1>Hello-World {_%_NC_EXAMPLE_REPLACE_%_}</h1>', "", null), $parent );

                // Variant with module
                $this->add_module('NC_EXAMPLE_REPLACE',  // The varible for this object without the '{_%}' signs
                    new nc_example_variantTwoWithClass($this) ); // The object for the varible, the Parent class is this
        }
        public function setvar() {
            nc_visual_modular::setvar();

            
            //Variant with set_variable, 
            //For use comment out: Variant with module and remove this comments
            //$this->set_variable('NC_EXAMPLE_REPLACE', 'Tom!');
            
        }
    }

    /**
     * The class for this site. A site have N-'nc_visual_site_mod's 
     * (nc_visual_modular <- nc_visual_object.). The main content site 
     * we the nc_example_content object and as meta the nc_front_meta_infos 
     * object - this use the standarts from the json config. 
     * 
     * You can extends the nc_front_meta_infos class and override function
     * 'get_key($key) for user info or complett own implantations. 
     */
    class nc_front_example_helloworld extends nc_front_base {
        
        public function __construct() {
            nc_front_base::__construct(new nc_example_content($this),   // The content for main
                                       new nc_front_meta_infos($this), // meta class for the head
                                       "example", // The title of this site
                                       null ); // This is the root object
        }
    };

    // Create the object 
    $site = new nc_front_example_helloworld();
    // Set the variables all used pieces of the site, and create the site.
    // Then print it. All sites are virtual and created dynamic
    print $site->setAndRender();
?>