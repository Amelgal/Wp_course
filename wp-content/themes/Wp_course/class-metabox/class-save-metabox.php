<?php

namespace Metabox;
use Core\WPOrg_Meta_Box;

class SaveMetaBox extends WPOrg_Meta_Box
{
    private static string $key;

    public function __construct(string $key)
    {
        self::$key = $key;
        add_action('save_post', array(self::class,'save'));

    }
    public static function save( int $post_id ) {
        if ( array_key_exists( self::$key, $_POST ) ) {
            update_post_meta(
                $post_id,
                self::$key,
                $_POST[self::$key]
            );
        }
    }
}
