<?php

namespace Metabox;
use Core\WPOrg_Meta_Box;
require_once(DIR_PATH . '/core/class-meta-box.php');

class RegistrationMetaBox extends WPOrg_Meta_Box
{
    private static string $id;
    private static string $title;
    private static string $contenr;
    private static string $type;

    public function __construct(string $id, string $title, string $contenr, string $type)
     {
         self::$id = $id;
         self::$title = $title;
         self::$contenr = $contenr;
         self::$type = $type;
         add_action('add_meta_boxes', array(self::class, 'add'));
     }

    /**
     * Set up and add the meta box.
     */
    public static function add() {
        add_meta_box(
            self::$id,          // Unique ID
            self::$title, // Box title
            self::$contenr,   // Content callback, must be of type callable
            self::$type                  // Post type
//            'wporg_box_id',          // Unique ID
//            'Custom Meta Box Title', // Box title
//            'html',   // Content callback, must be of type callable
//            'swim'                  // Post type
        );
    }


}