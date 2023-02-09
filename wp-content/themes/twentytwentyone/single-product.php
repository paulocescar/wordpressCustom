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
    .container {
      display: flex;
      justify-content: left;
      align-items: left;
      height: 100%;
    }

    .left-section {
      width: 20%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-right: 20px;
    }

    .left-section img {
      width: 50px;
      height: 50px;
      margin-bottom: 20px;
      cursor: pointer;
    }

    .main-section {
	  height: 60%;
      width: auto;
      text-align: left;
    }

    .main-section img {
      width: 100%;
      height: 500px;
    }

    .right-section {
      width: 35%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-left: 50px;
    }

    .product-details {
      margin-top: 0px;
    }

    .buy-button {
      margin-top: 50px;
      padding: 10px 20px;
      background-color: green;
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

  </style>
<div class="container">
    <div class="left-section">
      <img src="<?php echo esc_html(get_post_meta(get_the_ID(), 'image', true)); ?>" />
      <img src="<?php echo esc_html(get_post_meta(get_the_ID(), 'image', true)); ?>" />
      <img src="<?php echo esc_html(get_post_meta(get_the_ID(), 'image', true)); ?>" />
    </div>
    <div class="main-section">
      <img src="<?php echo esc_html(get_post_meta(get_the_ID(), 'image', true)); ?>" />
    </div>
    <div class="right-section">
      <div class="product-details">
        <h2><?php echo esc_html(get_post_meta(get_the_ID(), 'title', true)); ?></h2>
		<p><?php echo esc_html(get_post_meta(get_the_ID(), 'quantity', true)); ?></p>
        <p>Description: <?php echo esc_html(get_post_meta(get_the_ID(), 'description', true)); ?></p>
        <p>Price: <?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?></p>
      </div>
      <div class="buy-button">
	  	Comprar
      </div>
    </div>
  </div>
  

<?php
get_footer();

?>