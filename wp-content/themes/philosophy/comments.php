<div class="comments-wrap">

   <div id="comments" class="row">
         <div class="col-full">

            <h3 class="h2">
               <?php
               $philosophy_comment_number = get_comments_number();
               if($philosophy_comment_number<=1){
                  echo esc_html( $philosophy_comment_number). __("Comment","philosophy");
               }else{
                  echo esc_html( $philosophy_comment_number). __("Comments","philosophy");
               }
               ?>
            </h3>

            <!-- commentlist -->


            <ol class="commentlist">
               <?php
               require_once('class-wp-bootstrap-comment-walker.php');

               wp_list_comments( array(
                     'style'         => 'ul',
                     'max_depth'     => 4,
                     'short_ping'    => true,
                     'avatar_size'   => '50',
                     'walker'        => new Bootstrap_Comment_Walker(),
               ) );
               ?>

            </ol> <!-- end commentlist -->
            <div>
               <?php the_comments_pagination();?>
            </div>


            <!-- respond
            ================================================== -->
            <div class="respond">

               <h3 class="h2"><?php _e("Add Comment","philosophy");?></h3>

               <?php comment_form();?>

            </div> <!-- end respond -->

         </div> <!-- end col-full -->

   </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->