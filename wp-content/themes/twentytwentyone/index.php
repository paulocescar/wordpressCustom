<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->
<?php endif; ?>
<style>
	h2 {
		font-size: 2rem;
	}
	.catgory-list {
		list-style: none;
	}

	.catgory-list li {
		width: 200px;
		cursor: pointer;
	}

	.catgory-list li:hover {
		background-color: rgba(255,255,255,.5);
	}

	.product-slider {
		width: 100%;
		height: 400px;
		display: flex;
		overflow-x: auto;
		overflow-y: hidden;
		white-space: nowrap;
	}

	.product-card {
		display: inline-block;
		width: 20%;
		margin-right: 10%;
		text-align: center;
	}

	.product-card img {
		height: 45%;
		width: auto;
	}

	.product-price {
		font-weight: bold;
		margin-top: 1rem;
	}

	.buy-button {
		margin-top: 50px;
		padding: 10px 20px;
		background-color: green!important;
		color: white;
		cursor: pointer;
	}

	header {
		padding: 20px !important;
	}

	.site-main	{
		margin: 0 !important;
		padding: 0 !important;
	}

	.site-main > * {
		margin: 0 !important;
		padding: 0 !important;
	}

	@media (max-width: 1024px) {
		.product-card {
			height: 380px;
			width: 25%;
		}
		.product-card img {
			height: 35%;
			width: auto;
		}
	}

	@media (max-width: 768px) {
		.product-card {
			height: 380px;
			width: 25%;
		}
		.product-card img {
			height: 35%;
			width: auto;
		}
	}

	@media (max-width: 650px) {
		.product-card {
			width: 42%;
		}
		h2 {
			font-size: 1.5rem;
		}
	}

	@media (max-width: 425px) {
		.product-card {
			width: 50%;
		}
	}
</style>
<div class="container">
  <div class="left-section" style="float: left; width: 20%;">
  <!-- Conteúdo da seção da esquerda (categorias) -->
  <ul class="catgory-list">
	<?php
		$categories = custom_categories_cpt_querys();
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				$title = get_post_meta(get_the_ID(), 'title', true);
				$slug = get_post_meta(get_the_ID(), 'slug', true);
				$image = get_post_meta(get_the_ID(), 'image', true);
				$description = get_post_meta(get_the_ID(), 'description', true);
				if(get_the_ID() != 1){
					echo '<a href="/?post_type=category&p='.esc_html(get_the_ID()).'&preview=true"><li>' . esc_html($title) . '</li></a>';
				}
			endwhile;
		endif;
	?>
  </ul>
  </div>
  <div class="right-section" style="float: left; width: 80%;">
    <!-- Conteúdo da seção da direita (produtos) -->
	<div class="product-slider">
		<?php

		// If no content, include the "No posts found" template.
		custom_products_querys();
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				// exibir o conteúdo do produto aqui
				$title = get_post_meta(get_the_ID(), 'title', true);
				$slug = get_post_meta(get_the_ID(), 'slug', true);
				$image = get_post_meta(get_the_ID(), 'image', true);
				$quantity = get_post_meta(get_the_ID(), 'quantity', true);
				$description = get_post_meta(get_the_ID(), 'description', true);
				$price = get_post_meta(get_the_ID(), 'price', true);
		?>
				<div class="product-card">
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
					<h2><?php echo $title; ?></h2>
					<span class="product-price"><?php echo $price; ?></span><br>
					<button class="buy-button">Comprar</button><br>
					<a class="btn" href="/?product=<?php echo str_replace(" ", "-", $title); ?>">Detalhe</a>
				</div>
				<!-- Adicione mais cards de produtos aqui -->
			<?php
			endwhile;
			?>
	</div>
</div>
<?php
	else :
		// conteúdo a ser exibido caso não haja resultados na consulta
		echo 'Não há produtos para exibir.';
	endif;

	// get_template_part( 'template-parts/content/content-none' );

	get_footer();