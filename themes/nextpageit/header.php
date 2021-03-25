<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<header>

	<div class="top-notification-bar">
		<p>Get Free Giftcard For online Shoping</p>
	</div>

	<div class="header-container">
		<div class="left-container">
			<div class="logo-container">
				<div class="site-logo">
					<a href=<?php echo home_url();?>>
						<img  alt="Site logo" src="<?php echo get_template_directory_uri()?>/images/site-logo.png">
					</a>
				</div>
			</div>
		</div>

		<div class="right-container">
			<div class="links-container">
				<?php 
				if(class_exists('Menu_Model')){
					$arrMenu = Menu_Model::getMainByMenu('main-menu-desktop');
					if(count($arrMenu)>0){
						foreach ($arrMenu as $arrMenuItems){	
							?>
							<a class="<?php  echo $arrMenuItems['page_id'] === $post->ID ? "active-menu" : "";?>" id="<?php echo $arrMenuItems['ID']?>" href="<?php echo $arrMenuItems['url']?>">
								<?php echo $arrMenuItems['title']?>
							</a>
						<?php }
					}
				}
				?>
			</div>

			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<div>
					<input class="search-box" type="text" value="" name="s" id="s" placeholder="Search" />
						<!-- <input type="submit" id="searchsubmit" value="Search" /> -->
				</div>
			</form>
			
			<div class = "cart-icon-container">
				<a href="<?php echo wc_get_cart_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/cart-icon.svg" alt="cart Icon"></a>
			</div>
		</div>
	</div>
</header>
<body>