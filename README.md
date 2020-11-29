# NSCMS - NoSQL Blog-CMS
__A blogging cms without SQL__ 

Current only work backend and basic backend system. Not for use. current
This project is for my private Blog. When ready then you can use for your projects, too.

## Examples 
- __Simple Hello World__
```php  
// example_helloworld.php 
<?php 
    require_once dirname(__FILE__) . "/logic/backend/config/nc.config.php";
    require_once dirname(__FILE__) . "/logic/backend/base/nc_base_vfile.php";

    require_once dirname(__FILE__) . "/logic/frontend/nc.front.base.page.php";
    require_once dirname(__FILE__) . "/logic/frontend/nc.front.blog.content.php";

    class nc_example_content extends nc_visual_modular {
        public function __construct($parent) {
            nc_visual_modular::__construct(
                new nc_base_vfile("Hello World", "", null), $parent );
        }
    }
    class nc_front_example_helloworld extends nc_front_base {
        
        public function __construct() {
            nc_front_base::__construct(new nc_example_content($this), 
                                       new nc_front_meta_infos($this), "example",
                                       null );
        }
        public function setvar() {
          // Set internal variables to the site
          nc_visual_modular::setvar();
          // We replace the var NC_SITE_MODULE_MAIN_CONTENT with "Hello World"
          $this->set_variable("NC_SITE_MODULE_MAIN_CONTENT", "Hello World"); 
      }
    };

    $site = new nc_front_example_helloworld();
    print $site->setAndRender();
?>
```

## Changelog
- __Version 0.51 29.11.2020 18:32__:
  - base system are working
  - reorder root 
  - set base vars 
  
- __Version 0.05 26.11.2020 11:42__:
  - Make the widget system ready 
  - add a module-visual-bright 
  - update default template
  - update cfg system - see: "cfg/nc.main.infos.jsonc"


- __Version 0.01 24.11.2020 15:08__:
  - Basic backend and frontend work
  - the basic module system is in work 
