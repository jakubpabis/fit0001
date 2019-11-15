<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$colorCode = get_field('color', $product->get_ID()); 
$color = '';
switch($colorCode) {
	case strtolower('#501B73'):
		$color = 'purple';
		break;
	case strtolower('#FF8A00'):
		$color = 'orange';
		break;
	case strtolower('#00A3FF'):
		$color = 'blue';
		break;
	case strtolower('#A8CE38'):
		$color = 'green';
		break;
}
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$attributes = array();
$vars = array();
$cost = array();
if($product->is_type('variable')){
    foreach($product->get_available_variations() as $variation ){
		if(!in_array($variation['attributes']['attribute_pa_kalorycznosc'], $attributes)) {
			$attributes[] = $variation['attributes']['attribute_pa_kalorycznosc'];
		}
		$vars[] = $variation['attributes']['attribute_pa_ilosc-posilkow'];
		$cost[] = $variation['display_price'];
	}
	//var_dump($attributes);
	$cost = array_chunk($cost, sizeof($attributes));
	$vars = array_chunk($vars, sizeof($attributes));
	//var_dump($cost);
	$variationsArr = array();
	$i = 0;
	foreach($attributes as $item) {
		$cos = array_combine($vars[$i], $cost[$i]);
		$variationsArr[$item] = $cos;
		$i++;
	}
	//var_dump($variationsArr);
	
}
?>
<script defer>
	$variationsArr = <?= json_encode($variationsArr); ?>;
	$productID = <?= json_encode($product->get_ID()); ?>;
	console.log($productID);
</script>

<header class="header header__diet" style="border-color: <?= get_field('color', $product->get_ID()); ?>">
    <img class="bg-cover-abs lazy" data-src="<?= get_the_post_thumbnail_url($product->get_ID()); ?>" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1>
                    <?= get_the_title(); ?>
                </h1>
                <?php if(get_field('header_cta')) : ?>
                    <a href="<?= get_field('header_cta')['url']; ?>" class="btn btn__default"><?= get_field('header_cta')['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section class="diets__diet <?= $color; ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<?= get_field('intro_text', $product->get_ID()); ?>
			</div>
			<div class="col-lg-9">
				<a href="#order" class="btn btn__border <?= $color; ?> slideTo">Zamów teraz!</a>
			</div>
		</div>
	</div>
</section>

<section class="diets__order" id="order">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9 text-center">
				<h2 class="<?= $color; ?>">
					Zamów swoją dietę w<br/>
					<span class="text-size-xxxxlarge">
						5 prostych krokach
					</span>
				</h2>
			</div>
			<div class="col-lg-6">
				<form id="order__form" class="diets__order-form" action="<?php echo admin_url('admin-post.php'); ?>" method="post">
					<input type="hidden" name="productID" value="<?= $product->get_ID(); ?>">
					<div class="owl-carousel order owl-theme">
						<div class="diets__order-card <?= $color; ?>" data-no="1">
							<div class="card-header">
								<h3>Wybierz wariant kaloryczny</h3>
							</div>
							<div class="card-body">
								<div class="inputs">
									<?php foreach($variationsArr as $cal => $val) : 
										$e = end($val);
										$c = array_shift($val);
									?>
										<div class="input">
											<div class="pretty p-default p-round">
												<input type="radio" name="calories" value="<?= $cal ?>"/>
												<div class="state">
													<label><?= $cal ?> kcal <small>(<?= $c; ?> - <?= $e; ?> zł/dzień)</small></label>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="diets__order-card <?= $color; ?>" data-no="2">
							<div class="card-header">
								<h3>Wybierz jakie posiłki chcesz otrzymać <small>(min. 3)</small></h3>
							</div>
							<div class="card-body">
								<div class="inputs">
									<input type="hidden" name="meals" value="3">
									<div class="input">
										<div class="pretty p-default p-curve">
											<input type="checkbox" name="mealType" value="sniadanie1" data-perc="25"/>
											<div class="state">
												<label>Śniadanie</label>
											</div>
										</div>
									</div>
									<div class="input">
										<div class="pretty p-default p-curve">
											<input type="checkbox" name="mealType" value="sniadanie2" data-perc="15"/>
											<div class="state">
												<label>II Śniadanie</label>
											</div>
										</div>
									</div>
									<div class="input">
										<div class="pretty p-default p-curve">
											<input type="checkbox" name="mealType" value="obiad" data-perc="30"/>
											<div class="state">
												<label>Obiad</label>
											</div>
										</div>
									</div>
									<div class="input">
										<div class="pretty p-default p-curve">
											<input type="checkbox" name="mealType" value="podwieczorek" data-perc="15"/>
											<div class="state">
												<label>Podwieczorek</label>
											</div>
										</div>
									</div>
									<div class="input">
										<div class="pretty p-default p-curve">
											<input type="checkbox" name="mealType" value="kolacja" data-perc="15"/>
											<div class="state">
												<label>Kolacja</label>
											</div>
										</div>
									</div>
									<h6 class="result"></h6>
								</div>
								
							</div>
						</div>
						<div class="diets__order-card <?= $color; ?>" data-no="3">
							<div class="card-header">
								<h3>Wybierz kiedy chcesz otrzymywać posiłki</h3>
							</div>
							<div class="card-body">
								<div id="order__calendar"></div>
								<input type="hidden" name="quantity">
								<input type="hidden" name="orderDates">
								<input type="hidden" name="orderDatesHelper">
								<h5>
									<small>Sugerowana godzina dostawy</small>
								</h5>
								<div class="hours">
									<i class="fas fa-minus-circle"></i>
									<input name="hours" type="text" value="19:00" disabled>
									<i class="fas fa-plus-circle"></i>
								</div>
								<h6 class="remember"><small><i>Pamiętaj - zamówienia przywozimy dzień wcześniej.</i></small></h6>
								<h6 class="delivery"></h6>
								<h5 class="topay"></h5>
							</div>
						</div>
						<div class="diets__order-card <?= $color; ?>" data-no="4">
							<div class="card-header">
								<h3>Podaj adres dostawy</h3>
							</div>
							<div class="card-body">
								<div class="inputs">
									<div class="field">
										<label for="addressStreet">Ulica <span>*</span></label>
										<input type="text" name="addressStreet" placeholder="nazwa ulicy i nr domu" required>
									</div>
									<div class="field">
										<label for="addressHouse">Nr mieszkania <small>(opcjonalne)</small></label>
										<input type="text" name="addressHouse" placeholder="numer lokalu">
									</div>
									<div class="field">
										<label for="addressZip">Kod pocztowy <span>*</span></label>
										<input type="text" name="addressZip" pattern="[0-9]{2}\-[0-9]{3}" required placeholder="__-___">
									</div>
									<div class="field">
										<label for="addressCity">Miejscowość <span>*</span></label>
										<input type="text" name="addressCity" required placeholder="np. Olkusz">
									</div>
								</div>
							</div>
						</div>
						<div class="diets__order-card <?= $color; ?>" data-no="5">
							<div class="card-header">
								<h4>Do zapłaty</h4>
								<h2 class="finalpay"></h2>
							</div>
							<div class="card-body">
								<div class="btns">
									<a href="#" id="buyNowButton" class="btn btn__full <?= $color; ?>">
										Zamów teraz
									</a>
									<small>lub</small>
									<a href="#" id="justAddToCartButton" class="btn btn__border <?= $color; ?>">Dodaj do koszyka</a>
									<small>i kontynuuj zamówienie</small>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="btn btn__full <?= $color; ?> next disabled">
								PRZEJDŹ DALEJ
								<i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="btn btn__full slim <?= $color; ?> back d-none">
								<i class="fas fa-chevron-left"></i>
								wstecz
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>
