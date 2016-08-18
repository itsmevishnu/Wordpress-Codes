<?php
/*
 *  Template Name: My template
 *
 */
?>
<?php get_header();?>
<?php
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$qeury_args = array(
		'cat'	=> 0,
		'orderby'          => 'date',
		'paged' =>$paged,
		'posts_per_page' =>    3,
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish',
	);
	$query = new WP_Query($qeury_args);
	?>
	<table>
	<tr>
		<th>Num#</th>
		<th>Name</th>
		<th>Author</th>
	</tr>
	<?php if($query->have_posts()): ?>
	
		<?php while($query->have_posts()): ?>
			<?php $query->the_post();?>
			<tr>
				<td><?php echo get_the_ID(); ?></td>
				<td><?php echo get_the_title();?></td>
				<td><?php  echo get_the_author();?></td>
			</tr>
			
		<?php endwhile; ?>
		</table>
		<?php
		 // if ($query->max_num_pages > 1) {
		 // 	 echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages );
		 // 	 echo get_previous_posts_link( 'Newer Entries' );
		 // }
		 $pagination_args = array(
		  'base'            => get_pagenum_link(1) . '%_%',
		  'format'          => 'page/%#%',
		  'total'           => $query->max_num_pages,
		  'current'         => $paged,
		  'show_all'        => False,
		  'end_size'        => 1,
		  'mid_size'        => 2,
		  'prev_next'       => True,
		  'prev_text'       => __('&laquo;'),
		  'next_text'       => __('&raquo;'),
		  'type'            => 'plain',
		  'add_args'        => false,
  		  'add_fragment'    => ''
		);
		 $paginate_links = paginate_links($pagination_args);
		 if ($paginate_links) {
  echo "<nav class='custom-pagination'>";
    // echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $query->max_num_pages . "</span> ";
    echo $paginate_links;
  echo "</nav>";
}
		?>
	<?php endif; ?>


<?php get_footer();?>