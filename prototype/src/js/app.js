'use strict';

$.fn.datepicker.language['pl'] = {
    days: ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'],
    daysShort: ['Nie', 'Pon', 'Wto', 'Śro', 'Czw', 'Pią', 'Sob'],
    daysMin: ['Nd', 'Pn', 'Wt', 'Śr', 'Czw', 'Pt', 'So'],
    months: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec', 'Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
    monthsShort: ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'],
    today: 'Dzisiaj',
    clear: 'Wyczyść',
    dateFormat: 'yyyy-mm-dd',
    timeFormat: 'hh:ii:aa',
    firstDay: 1
};

var swieta = ['25/12/2019', '26/12/2019', '27/12/2019', '31/12/2019', '1/1/2020', '2/1/2020', '6/1/2020', '7/1/2020', '12/4/2020', '13/4/2020', '14/4/2020', '1/5/2020', '2/5/2020', '3/5/2020', '4/5/2020', '31/5/2020', '1/6/2020', '11/6/2020', '12/6/2020', '15/8/2020', '16/8/2020', '1/11/2020', '2/11/2020', '11/11/2020', '12/11/2020', '25/12/2020', '26/12/2020', '27/12/2020', '31/12/2020', '1/1/2021', '2/1/2021'];

var $cities = {
	'32-310': Array(
		'Klucze',
		'Bydlin'
	),
	'32-340': 'Wolbrom',
	'32-075': 'Trzebienice',
	'32-353': Array(
		'Trzyciąż',
		'Milonki'
	),
	'32-045': 'Wielmoża',
	'32-043': 'Skała', 
	'32-047': 'Ojców', 
	'32-048': 'Sąspów',
	'32-064': 'Dubie',
	'32-065': 'Krzeszowice',
	'32-067': 'Rudno',
	'32-540': 'Bolęcin',
	'32-500': 'Chrzanów',
	'32-501': 'Chrzanów',
	'32-502': 'Chrzanów',
	'32-503': 'Chrzanów',
	'32-530': 'Trzebinia',
	'32-540': 'Trzebinia',
	'32-541': 'Trzebinia',
	'32-543': Array(
		'Myślachowice',
		'Czyżówka'
	),
	'32-332': 'Bukowno',
	'32-329': Array(
		'Bolesław',
		'Hutki'
	)
};

var $orderDO;

if(typeof($variationsArr) != "undefined" && $variationsArr !== null) {
    $orderDO = {
		variations: $variationsArr,
		mealsNo: 0,
		mealsPerc: 0,
		meals: []
	}
}

if(typeof($variationsArrAll) != "undefined" && $variationsArrAll !== null) {
    $orderDO['all'] = $variationsArrAll;
}

function arrayRemove(arr, value) 
{
	return arr.filter(function(ele){
		return ele != value;
	});
}


function slideTo($el)
{

}

// function slideNext() 
// {
// 	$('.btn.next').on('click', function(e) {
// 		e.preventDefault();
// 		var $data = $(this).data('no');
// 		$('.diets__order-card[data-no="'+$data+'"]')
// 	});
// }

function unDisable()
{
	$(document).on('change', 'input', function() {
		$('.btn.next').removeClass('disabled');
	});
}

function lazyImages()
{

	$('.lazyset').each(function() {
		if(!$(this).hasClass('loaded')) {
			$(this).attr('srcset', $(this).data('srcset')).removeAttr('data-srcset').addClass('loaded');
		}
	});
	$('.lazy').each(function() {
		if(!$(this).hasClass('loaded')) {
			$(this).attr('src', $(this).data('src')).removeAttr('data-src').addClass('loaded');
		}	
	});
	
	$(window).on('scroll', function() {
	
		$('.lazyset').each(function() {
			if($(this).visible( true ) && !$(this).hasClass('loaded')) {
				$(this).attr('srcset', $(this).data('srcset')).removeAttr('data-srcset').addClass('loaded');
			}
		});
		$('.lazy').each(function() {
			if($(this).visible( true ) && !$(this).hasClass('loaded')) {
				$(this).attr('src', $(this).data('src')).removeAttr('data-src').addClass('loaded');
			}	
		});

	});

}

$(document).ready(function() {

	if(typeof($variationsArr) != "undefined" && $variationsArr !== null) {

		var $order = $('.owl-carousel.order');
		$order.owlCarousel({
			loop: false,
			margin: 0,
			nav: false,
			items: 1,
			dots: false,
			mouseDrag: false,
			touchDrag: false,
			pullDrag: false,
			autoHeight: true,
			animateOut: 'fadeOutLeft',
			animateIn: 'fadeInRight',
		});

		$(document).find('.btn.next').click(function() {
			if(!$(this).hasClass('disabled')) {
				$order.trigger('next.owl.carousel');
			}
		});

		$(document).find('.btn.back').click(function() {
			$order.trigger('prev.owl.carousel');
		});

		var $pos = 0;
		$order.on('change.owl.carousel', function(event) {
			$pos = event['item']['index'];
			$('.btn.next').addClass('disabled');
		});
		$order.on('changed.owl.carousel', function(event) {
			$pos = event['item']['index'];
			if($pos > event['item']['index']) {
				if(event['item']['index'] < 1) {
					$('.btn.back').addClass('d-none');
				}
			} else {
				if(event['item']['index'] > 0) {
					$('.btn.back').removeClass('d-none');
				}
			}
			console.log($pos);
			switch($pos) {
				case 0:
					if($('*[data-no="1"]').find('input[name="calories"]').is('checked')) {
						$('.btn.next').removeClass('disabled');
					}
					break;
				case 1:
					if($orderDO['mealsNo'] >= 3) {
						$('.btn.next').removeClass('disabled');
					}
					break;
				case 2:
					if($orderDO['dates']) {
						$('.btn.next').removeClass('disabled');
					}
					break;
				case 3:
					$('.btn.next').removeClass('d-none');
					if ($orderDO['addressStreet'] && $orderDO['addressZip'] && $orderDO['addressCity']) {
						$('.btn.next').removeClass('disabled').removeClass('d-none');
					}
					break;
				case 4:
						$('.btn.next').addClass('d-none');
					break;
			}
		});


		$('input[name="calories"]').on('click', function(e) {
			$orderDO['caloriesSet'] = parseInt($(this).val());
			$('.btn.next').removeClass('disabled');
		}); 

		$('input[name="mealType"]').on('click', function() {
			if($(this).is(':checked')) {
				$orderDO['mealsNo']++;
				$orderDO['mealsPerc'] = $orderDO['mealsPerc'] + $(this).data('perc');
				$orderDO['meals'].push($(this).val());
			} else {
				$orderDO['mealsNo']--;
				$orderDO['mealsPerc'] = $orderDO['mealsPerc'] - $(this).data('perc');
				$orderDO['meals'] = arrayRemove($orderDO['meals'], $(this).val());
			}
			if($orderDO['mealsNo'] >= 3) {
				var $arr = $orderDO['variations'][$orderDO['caloriesSet']];
				$price = $arr[$orderDO['mealsNo']];
				$orderDO['pricePerDay'] = $arr[$orderDO['mealsNo']];
				$('h6.result').html('Cena za dzień: <strong>'+$orderDO['pricePerDay']+' zł</strong>,<br/>Kaloryczność: ok. <strong>'+$orderDO['caloriesSet'] * $orderDO['mealsPerc'] / 100+' kcal</strong>');
				$order.trigger('refresh.owl.carousel', [1]);
				$('.btn.next').removeClass('disabled');
			} else {
				$('h6.result').html('Wybierz więcej posiłków...');
				$order.trigger('refresh.owl.carousel', [1]);
				$('.btn.next').addClass('disabled');
			}
			console.log($orderDO);
			//
			if($orderDO['dates'] && $orderDO['pricePerDay']) {
				$orderDO['priceFull'] = $orderDO['pricePerDay'] * $orderDO['dates'].length;
			}
			if($orderDO['priceFull']) {
				$('h5.topay').html('Do zapłaty: <strong>'+$orderDO['priceFull']+'zł</strong>');
			}
			$('input[name="meals"]').val($orderDO['mealsNo']);
			//
		});
		
		var $todayDate = new Date();
		$todayDate.setDate($todayDate.getDate() + 3);
		var disabledDays = [0, 6];
		var $orderDates, $orderDatesHelper;
		$('#order__calendar').datepicker({
			language: 'pl',
			dateFormat: 'd/m/yyyy',
			inline: true,
			multipleDates: true,
			minDate: $todayDate,
			position: 'center center',
			onRenderCell: function (date, cellType) {
				if (cellType == 'day') {
					var day = date.getDay(),
						isDisabled = disabledDays.indexOf(day) != -1,
						todayDat = parseInt(date.getUTCDate())+'/'+parseInt(date.getUTCMonth()+1)+'/'+date.getFullYear();
						if(swieta.indexOf(todayDat) != -1) {
							//console.log(todayDat);
							isDisabled = true;
						}
					return {
						disabled: isDisabled
					}
				}
			},
			onChangeMonth: function (month, year) {
				$order.trigger('refresh.owl.carousel', [1]);
			},
			onSelect: function (formattedDate, date, inst) {
				$('input[name="orderDates"]').val(formattedDate);
				$('input[name="orderDatesHelper"]').val(date);
				$orderDates = $('input[name="orderDates"]').val().split(',');
				$orderDatesHelper = $('input[name="orderDatesHelper"]').val().split(',');
				$orderDates.sort();
				//
				$orderDO['dates'] = $orderDates.sort();
				if($orderDO['dates'] && $orderDO['pricePerDay']) {
					$orderDO['priceFull'] = $orderDO['pricePerDay'] * $orderDO['dates'].length;
				}
				//
				if($orderDates.length > 0 && $orderDatesHelper[0] != "") {
					//console.log($orderDates);
					for(var i=0; i<$orderDatesHelper.length; i++) {
						var $d = new Date($orderDatesHelper[i]);
						$d.setDate($d.getDate() - 1);
						$orderDatesHelper[i] = parseInt($d.getDate())+'/'+parseInt($d.getMonth()+1)+'/'+$d.getFullYear();
					}
					$orderDO['firstDelivery'] = $orderDatesHelper.sort()[0];
				} else {
					delete $orderDO['firstDelivery'];
					delete $orderDO['dates'];
				}
				$orderDO['hour'] = $('input[name="hours"]').val();
				orderNotice();
			}
		});

		$('select').niceSelect();

		$('.hours').find('i').on('click', function() {
			var $input = $('.hours').find('input');
			var $val = parseInt($input.val().split(':')[0]);
			if($(this).hasClass('fa-minus-circle') && $val > 16) {
				$input.val($val-1+':00');
			} else if($(this).hasClass('fa-plus-circle') && $val < 22) {
				$input.val($val+1+':00');			
			}
			//
			$orderDO['hour'] = $input.val();
			//
			orderNotice();
		});

		function orderNotice() 
		{
			$orderDO['hour'] = $('.hours').find('input').val();
			if($orderDO['firstDelivery']) { 
				$('h6.delivery').html('Spodziewaj się pierwszej dostawy: <strong>'+$orderDO['firstDelivery']+'</strong>, około godziny <strong>'+$orderDO['hour']+'</strong>');
				$('h5.topay').html('Do zapłaty: <strong>'+$orderDO['priceFull']+'zł</strong>');
				$('h2.finalpay').html($orderDO['priceFull'].toFixed(2)+' <small>zł</small>');
				$('.btn.next').removeClass('disabled');
			} else {
				$('h6.delivery').html('');
				$('h5.topay').html('');
				$('h2.finalpay').html('');
				$('.btn.next').addClass('disabled');
			}
			$order.trigger('refresh.owl.carousel', [1]);
			$('input[name="quantity"]').val($orderDO['dates'].length);
		}

		var $addressCheck1 = 0;
		var $addressCheck2 = 0;
		var $addressCheck3 = 0;
		$('.inputs').find('.field').find('input').on('keyup', function() {
			switch($(this).attr('name')) {
				case 'addressStreet':
					if($(this).val().length >= 3 && $addressCheck1 == 0) {
						$addressCheck1 = 1;
						$orderDO['addressStreet'] = $(this).val();
					} else if($(this).val().length < 3 && $addressCheck1 > 0) {
						$addressCheck1 = 0;
						delete $orderDO['addressStreet'];
					}
					break;
				case 'addressZip':
					if($cities[$(this).val()] && $addressCheck2 == 0) {
						$addressCheck2 = 1;
						$orderDO['addressZip'] = $(this).val();
						$(this).tooltip('hide');
					}  else if($(this).val().length > 5 && !$cities[$(this).val()]) {
						$addressCheck2 = 0;
						delete $orderDO['addressZip'];
						//$(this).parent().append('<span style="color: red;">Niestety nie dowozimy jeszcze do Twojej miejscowości...</span>');
						$(this).tooltip({
							placement: 'bottom',
							html: true,
							title: 'Niestety nie dowozimy jeszcze do Twojej miejscowości...<br/><a href="/o-nas#mapa"><strong><u>Zobacz gdzie dowozimy</u></strong></a>',
							trigger: 'manual',
						});
						$(this).tooltip('show');
						break;
					} else if($(this).val().length < 6 && !$cities[$(this).val()] && $addressCheck2 > 0) {
						$addressCheck2 = 0;
						delete $orderDO['addressZip'];
						$(this).tooltip('hide');
					}
					break;
				case 'addressCity':
					if($(this).val().length >= 3 && $addressCheck3 == 0) {
						$addressCheck3 = 1;
						$orderDO['addressCity'] = $(this).val()
					} else if($(this).val().length < 3 && $addressCheck3 > 0) {
						$addressCheck3 = 0;
						delete $orderDO['addressCity'];
					}
					break;
			}
			if ($addressCheck1+$addressCheck2+$addressCheck3 == 3) {
				$('.btn.next').removeClass('disabled');
			} else {
				$('.btn.next').addClass('disabled');
			}
		});

	}

	$('#justAddToCartButton, #buyNowButton').on('click', function(e) {
		e.preventDefault();
		if($(this).attr('id') == 'buyNowButton') {
			var $base = 'zamowienie/?add-to-cart=';
		} else {
			var $base = '?add-to-cart=';
		}
		var $productID = $('input[name="productID"]').val();
		var $quantity = $('input[name="quantity"]').val();
		$orderDO['productID'] = $productID;

		for(var i=0; i<$orderDO['all'].length; i++) {
			var $calories = $orderDO['all'][i]['attributes']['attribute_pa_kalorycznosc'];
			var $servings = $orderDO['all'][i]['attributes']['attribute_pa_ilosc-posilkow'];
			//console.log($calories);
			//console.log($servings);
			if(parseInt($calories) == $orderDO['caloriesSet'] && parseInt($servings) == $orderDO['mealsNo']) {
				var $variationID = $orderDO['all'][i]['variation_id'];
				$orderDO['variationID'] = $variationID;
				$orderDO['attrSelected'] = {
					'attribute_pa_kalorycznosc': $orderDO['caloriesSet'],
					'attribute_pa_ilosc-posilkow': $orderDO['mealsNo']
				};
				var $variationsString = '&attribute_pa_kalorycznosc='+$orderDO['caloriesSet']+'&attribute_pa_ilosc-posilkow='+$orderDO['mealsNo'];
				break;
			}
		}
		var $dates = $orderDO['dates'].join(';');
		var $meals = $orderDO['meals'].join(';');
		var $street = $('input[name="addressStreet"]').val();
		var $house = $('input[name="addressHouse"]').val();
		var $zip = $('input[name="addressZip"]').val();
		var $city = $('input[name="addressCity"]').val();
		var $finalURL = $base+$productID+'&quantity='+$quantity+'&variation_id='+$orderDO['variationID']+$variationsString+'&dates='+$dates+'&meals='+$meals+'&dateshour='+$orderDO['hour']+'&addressStreet='+$street+'&addressHouse='+$house+'&addressZip='+$zip+'&addressCity='+$city;

		console.log($orderDO);

		window.location.href = $finalURL;

		//$('#order__form').append('<input type="hidden" name="action" value="my_add_to_cart_button" />');
		//$('#order__form').submit();
	});

	var $wooNotice = $(document).find('.woocommerce-notices-wrapper');
	if(!$wooNotice.is(':empty')) {
		$('.woocommerce-notices-wrapper').addClass('vis');
	}

	$(document).on('change', '.woocommerce-notices-wrapper', function() {
		if(!$(this).is(':empty')) {
			$(this).addClass('vis');
		}
	});

	$(document).on('click', '.woocommerce-notices-wrapper', function(e) {
		var $el = e.target;
		console.log($el);
		if($($el).hasClass('woocommerce-notices-wrapper')){
			$(this).removeClass('vis');
		}
	});

	//slideNext();

	// var options = {
	// 	prefetch: true,
	// 	cacheLength: 10,
	// 	onStart: {
	// 		duration: 500, // Duration of our animation
	// 		render: function ($container) {
	// 			// Add your CSS animation reversing class
	// 			$container.addClass('is-exiting');
	// 			// Restart your animation
	// 			smoothState.restartCSSAnimations();
	// 		}
	// 	},
	// 	onReady: {
	// 		duration: 500,
	// 		render: function ($container, $newContent) {
	// 			// Remove your CSS animation reversing class
	// 			$container.removeClass('is-exiting');
	// 			// Inject the new content
	// 			$container.html($newContent);
	// 		}
	// 	},
	// 	onAfter: function () {
	// 		lazyImages();
	// 	}
	// },
	// smoothState = $('#wrapper').smoothState(options).data('smoothState');

});

$(window).on('load', function() {

	lazyImages();

});