# NSCMS - NoSQL Blog-CMS
__A blogging cms without SQL__ 

Current only work backend and basic backend system. Not for use. current

This project is for my private Blog. When ready then you can use for your projects, too.

## Examples 
- __Simple Hello World__
```php  
// example_helloworld.php 
<?php 
    require_once "backend/config/nc.config.php";
    require_once "frontend/nc.front.base.page.php";
    require_once "frontend/nc.front.blog.content.php";

    /**
     * The Simple example front page - we have null main content class,
     * we replace the variable in setvar manuel 
     */ 
    class nc_front_example_helloworld extends nc_front_base {
        
        public function __construct() {
            nc_front_base::__construct(null, 
                                       new nc_front_meta_infos($this),
                                       "example_helloworld" );
        }
        public function setvar() {
          // Set internal variables to the site
          nc_visual_modular::setvar();
          // We replace the var NC_SITE_MODULE_MAIN_CONTENT with "Hello World"
          $this->set_variable("NC_SITE_MODULE_MAIN_CONTENT", "Hello World"); 
      }
    };

    $site = new example_helloworld();
    print $site->setAndRender();
?>


```

### Hello World as Content

#### Example File Structur
Now we need 2 files:

##### example_content.htm
```html  
<section id="example" name="example" class="mb-2">
    <div class="row">
        <div class="col">
            <p>{_%_NC_EXAMPLE_MESSAGE_%_}</p>
        </div>
    </div>
</section>
```

##### example_content.php 
```php  
<?php 
require_once "backend/config/nc.config.php";
require_once "backend/base/nc.base.visual.site.mod.php";

require_once "frontend/nc.front.base.page.php";

/**
 * This is our main content of the site. As htm Template for this content we 
 * use "example_content.htm" from the root path. When we use a file from the skin dir 
 * then use 'nc_base_file_skin'  
 */ 
class nc_front_example extends nc_visual_modular {
    public function __construct($parent) {
        // Use example_content.htm from root dir
        nc_visual_modular::__construct(new nc_base_file("example_content.htm"), $parent );
        // use file from skin dir :
        // nc_visual_modular::__construct(new nc_base_file_skin("nc.page.main.content.htm"), $parent ); 
    }

    public function setvar() {
        nc_visual_modular::setvar();
        // Replace the variable '{_%_NC_EXAMPLE_MESSAGE_%_}' with "Hello World" 
        $this->set_variable("NC_EXAMPLE_MESSAGE", "Hello World"); 
    }
};

/**
 * This is the base page class of this example page
 */ 
class nc_front_example_main extends nc_front_base {
   /**
     * create ower example page, aside, header,footer etc pp are add to the page
     * the main content is our class 'nc_front_example'. As meta class we use 
     * the pre created class 'nc_front_meta_infos'. 
     * 'Example Content' is aur site name. This whil show in the title.
     * 
     * The content of object from nc_front_example replace the variable
     * '{_%_NC_SITE_MODULE_MAIN_CONTENT_%_}'
     */ 
    public function __construct() {
        nc_front_base::__construct(new nc_front_example($this), 
                                    new nc_front_meta_infos($this),
                                    "Example Content" );
    }
};

$site = new nc_front_main();
print $site->setAndRender();

?>

```

## Changelog
- __Version 0.05 26.11.2020 11:42__:
  - Make the widget system ready 
  - add a module-visual-bright 
  - update default template
  - update cfg system - see: "cfg/nc.main.infos.jsonc"


- __Version 0.01 24.11.2020 15:08__:
  - Basic backend and frontend work
  - the basic module system is in work 
