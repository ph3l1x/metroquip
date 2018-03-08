<?php
namespace ContentBlocks;
?>

<?php if ( empty( $model ) ): ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php else: ?>
 	<section class="search-page">
 		
 		<?php // include the mobile nav ?>
 		<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>

 		<div class="search-page-container">
 			<div class="search-page-row">

 				<?php // include the top-to-bottom main nav ?>
 				<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

 				<div class="search-page-column">
 					<div class="search-page-title-container">
 						<h1 class="search-page-title">Search: &ldquo;<?php echo get_search_query(); ?>&rdquo;</h1>
 					</div>
 					<form class="search-page-input-container" action="/">
 						<input type="search" class="search-page-input" value="<?php echo get_search_query(); ?>" name="s" data-swplive="true" data-swpengine="default" data-swpconfig="searchpage" autocomplete="off">
 					</form>
 					<div class="search-page-filters-container">
 						<ul class="search-page-filters-list">
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Equipment Sales">Equipment Sales</a></li>
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Current Inventory">Current Inventory</a></li>
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Equipment Rentals">Equipment Rentals</a></li>
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Parts & Accessories">Parts/Accessories</a></li>
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Service">Service</a></li>
 							<li class="search-page-filter"><a class="search-page-filter-link" href="#" data-post-type="Bulletins & Tips">Bulletins/Tips</a></li>
 						</ul>
 					</div>
 				<?php if ( !empty( $model['search-page'] ) ): ?>
	 				<?php foreach ( $model['search-page'] as $postType => $searchResult ): ?>
	 				<?php
	 				// check on post type and output post type header if needed
	 				if ( !isset( $_SESSION['searchPageCurrentPostType'] ) || $_SESSION['searchPageCurrentPostType'] != $postType ) {

	 					echo '<div class="search-page-result-row no-hover" data-post-type="'.$postType.'">'.
	 							'<div class="search-page-result-column--full-width">'.
	 								'<h2 class="search-page-result-header">' . strtoupper( $postType ) . '</h2>'.
	 							'</div>'.
	 						 '</div>';
	 				}
	 				?>

	 					<?php foreach ( $searchResult as $post ): ?>
		 				<article class="search-page-result">
		 					
		 					<a class="search-page-result-row" href="<?php echo $post['permalink']; ?>" data-post-type="<?php echo $postType; ?>">
		 						<div class="search-page-result-column--left">
		 							<div class="search-page-result-image-container">
		 								<img class="search-page-result-image" src="<?php echo $post['featuredImageUrl']; ?>" alt="<?php echo $post['title']; ?>">
		 							</div>
		 						</div>
		 						<div class="search-page-result-column--right">						
			 						<header class="search-page-result-title"><?php echo $post['title']; ?></header>
			 						<div class="search-page-result-excerpt"><?php echo $post['excerpt']; ?></div>
		 						</div>
		 					</a>
		 				</article>
	 					<?php endforeach; ?>
	 				<?php endforeach; ?>
	 			<?php else: ?>
	 				<p class="search-page-result-none-text">No Results</p>
 				<?php endif; ?>
 				</div>

 				<?php // include the contact sidebar form ?>
 				<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>

 			</div>
 		</div>
 	</section>

 	<?php the_posts_navigation(); ?>
<?php endif; ?>