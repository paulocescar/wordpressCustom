<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<style>
  h2 {
    font-size: 2rem;
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
    margin-right: 5%;
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
    background-color: green !important;
    color: white;
    cursor: pointer;
  }

  header {
    padding: 20px !important;
  }

  .site-main {
    margin: 0 !important;
    padding: 0 !important;
  }

  .site-main>* {
    margin: 0 10% !important;
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
<div class="product-slider">
  <?php
  the_post();

  // If no content, include the "No posts found" template.
  custom_products_by_category_querys(get_the_ID());
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


<?php
  else :
    // conteúdo a ser exibido caso não haja resultados na consulta
    echo 'Não há produtos para exibir.';
  endif;
  get_footer();

?>