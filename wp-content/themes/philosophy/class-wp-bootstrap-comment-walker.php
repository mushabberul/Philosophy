<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 4 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Aymene Bourafai <bourafai.a@gmail.com> <www.aymenebourafai.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 * @link        https://v4-alpha.getbootstrap.com/layout/media-object/
 */

class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int    $depth   Depth of comments.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li ';

?>
		<<?php echo $tag; ?><?php  comment_class($this->has_children ? 'thread-alt depth-1 comment' : '' ); ?>>

<pre>
<?php
print_r($args);
?>
</pre>

					<div class="comment__avatar">
						<?php if ( $args['avatar_size'] != 0  ): ?>
						<a href="<?php echo get_comment_author_url(); ?>">
							<?php echo get_avatar( $comment, $args['avatar_size'],'mm','avator image', array('class'=>'avatar') ); ?>
						</a>
						<?php endif; ?>
					</div>

					<div class="comment__content">
						<div class="comment__info">
						<cite><?php the_author();?></cite>

						<div class="comment__meta">
							<time class="comment__time">
								<?php comment_date(); ?>,
								<?php comment_time(); ?>
							</time>
							<?php
								comment_reply_link( array_merge( $args, array(
									'add_below' => 'div-comment',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],

								) ) );
							?>
						</div>
						</div>

						<div class="comment__text">
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
							<?php endif; ?>
							<p>
								<?php comment_text(); ?>
							</p>
						</div>

					</div>
<?php
	}
}