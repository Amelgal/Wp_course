<?php

namespace Metabox;
use Core\WPOrg_Meta_Box;

class SaveMetaBox extends WPOrg_Meta_Box
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
        add_action('save_post', array($this,'save'));

    }
    public function save( int $post_id ) {
        if ( array_key_exists( $this->key, $_POST ) ) {
            update_post_meta(
                $post_id,
                $this->key,
                $_POST[$this->key]
            );
        }
    }
}
