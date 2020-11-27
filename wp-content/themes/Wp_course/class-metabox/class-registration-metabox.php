<?php

namespace Metabox;
use Core\WPOrg_Meta_Box;
require_once(DIR_PATH . '/core/class-meta-box.php');

class RegistrationMetaBox extends WPOrg_Meta_Box
{
    private  string $id;
    private  string $title;
    private  string $contenr;
    private  string $type;
    private  string $align;

    public function __construct(string $id, string $title, string $contenr, string $type, string $align = 'advanced')
     {
         $this->id = $id;
         $this->title = $title;
         $this->contenr = $contenr;
         $this->type = $type;
         $this->align = $align;
         add_action('add_meta_boxes', array($this, 'add'));
     }

    /**
     * Set up and add the meta box.
     */
    public function add() {
        add_meta_box(
            $this->id,      // Unique ID
            $this->title,   // Box title
            $this->contenr, // Content callback, must be of type callable
            $this->type,    // Post type
            $this->align
        );
    }

}