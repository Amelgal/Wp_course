<?php if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>
        <h2 class="comments-title">
            <?php
            $wp_course_comment_count = get_comments_number();
            if ('1' === $wp_course_comment_count) {
                printf(
                /* translators: 1: title. */
                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'wp_course'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $wp_course_comment_count, 'comments title', 'wp_course')),
                    number_format_i18n($wp_course_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style' => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'wp_course'); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().

    comment_form();
    ?>

</div><!-- #comments -->
