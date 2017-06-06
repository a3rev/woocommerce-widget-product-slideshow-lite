(function($) {
$(function(){

	var wc_product_sliders_breakpoints = [
		{ name: 'mobile-portrait', point: 420, max_visible: 1 }, // Mobile Portrait: show 1 items on visible
		{ name: 'mobile-landscape', point: 680, max_visible: 2 }, // Mobile Landscape: show 2 items on visible
		{ name: 'tablet', point: 1024, max_visible: 3 } // Tablet: show 3 items on visible
	];

	var legacy_api_url = wc_product_slider_vars.legacy_api_url;
	var wc_product_sliders_localStorage = "wc-product-sliders-backbone";

	var wc_pslider_cache_timeout = 24;
	var wc_pslier_enable_cache = false;
	if ( typeof wc_product_slider_vars.cache_timeout !== 'undefined' ) {
		wc_pslider_cache_timeout = wc_product_slider_vars.cache_timeout;
	}
	if ( typeof wc_product_slider_vars.enable_cache !== 'undefined' && wc_product_slider_vars.enable_cache == 'yes' ) {
		wc_pslier_enable_cache = true;
	}

	//MVC for Product Slider
	var wc_product_slider = { apps:{}, models:{}, collections:{}, views:{} };

	_.templateSettings = {
  		evaluate: /[<{][%{](.+?)[%}][}>]/g,
    	interpolate: /[<{][%{]=(.+?)[%}][}>]/g,
    	escape: /[<{][%{]-(.+?)[%}][}>]/g
	}

	wc_product_slider.models.Slide = Backbone.Model.extend({
		defaults: {
			item_title: '',
			item_link: null,
			product_price: '',
			img_url: null,
			index_product: 1
		}
	});

	wc_product_slider.collections.Slides = Backbone.Collection.extend({
		model: wc_product_slider.models.Slide,

		totalSlides: function() {
			return this.length;
		}

	});

	wc_product_slider.views.SlideView = Backbone.View.extend({

		widgetItemTpl: _.template( $('#wc_product_slider_widget_item_tpl').html().replace( '/*<![CDATA[*/', '' ).replace( '/*]]>*/', '' ) ),
		mobileItemTpl: _.template( $('#wc_product_slider_mobile_item_tpl').html().replace( '/*<![CDATA[*/', '' ).replace( '/*]]>*/', '' ) ),
		cardItemTpl: _.template( $('#wc_product_slider_card_item_tpl').html().replace( '/*<![CDATA[*/', '' ).replace( '/*]]>*/', '' ) ),

		initialize: function() {
			this.listenTo( this.model, 'destroy', this.remove );
		},

		renderWidgetItem: function() {
			console.log('WC Product Slider - Rendering Slide ' + this.model.get('item_title') + ' on Widget Slider');
			this.setElement(this.widgetItemTpl(this.model.toJSON()));

			return this;
		},

		renderMobileItem: function() {
			console.log('WC Product Slider - Rendering Slide ' + this.model.get('item_title') + ' on Mobile Slider');
			this.setElement(this.mobileItemTpl(this.model.toJSON()));

			return this;
		},

		renderCardItem: function() {
			console.log('WC Product Slider - Rendering Slide ' + this.model.get('item_title') + ' on Card Slider');
			this.setElement(this.cardItemTpl(this.model.toJSON()));

			return this;
		}

	});

	wc_product_slider.views.SliderView = Backbone.View.extend({

		initialize: function() {
			this.listenTo( this.collection, 'add', this.addItem );

			this.sliderInited = false;
			this.sliderID = this.$el.attr('id');

			this.slider_skin_type = this.$el.data('slider-skin-type');

			this.slider_id = this.$el.data('slider-id');
			this.slider_settings = this.$el.data('slider-settings');
			this.sliders_localStorage = new Backbone.LocalStorage( wc_product_sliders_localStorage );
			this.slider = this.$('.wc-product-slider');
			this.slider_container = this.slider.parents('.wc-product-slider-' + this.slider_skin_type + '-skin-container');

			this.sliderIsVisible = false;

			if ( 'carousel' == this.slider_skin_type ) {
				windowWide = $(window).width();

				this.default_visible = this.slider.data('cycle-carousel-visible');
				var current_visible = this.default_visible;
				var sliderCarousel = this.slider;

				$.each( wc_product_sliders_breakpoints, function( i, breakpoint ) {
					if ( windowWide <= breakpoint.point && current_visible > breakpoint.max_visible ) {
						current_visible = breakpoint.max_visible;
						sliderCarousel.data('cycle-carousel-visible', breakpoint.max_visible );
						return false;
					}
				});

				var autoHeight = 'calc';
				if ( 1 == current_visible ) {
					autoHeight = 'container';
				}
				sliderCarousel.data('cycle-auto-height', autoHeight );

				this.current_visible = current_visible;
				this.sliderIsVisible = true;
				this.loadItems();

				$(window).resize( this, function( event ) {
					sliderview = event.data;
					clearTimeout( window[ 'resizedFinished' + sliderview.sliderID ] );
				    window[ 'resizedFinished' + sliderview.sliderID ] = setTimeout(function( sliderview ) {
						sliderview.carouselResize();
				    }, 250, sliderview );
				});
			} else {
				if ( $(window).width() <= 600 ) {
					if ( 'mobile' == this.slider_skin_type ) {
						this.sliderIsVisible = true;
						this.slider_container.show();
						this.loadItems();
					}
				} else {
					if ( 'mobile' != this.slider_skin_type ) {
						this.sliderIsVisible = true;
						this.slider_container.show();
						this.loadItems();
					}
				}

				$(window).resize( this, function( event ) {
					sliderview = event.data;
					sliderview.sliderResize();
				});
			}

		},

		sliderResize: function() {
			windowWide = $(window).width();

			// For mobile device
			if ( windowWide <= 600 ) {
				// Show slider has mobile skin and it has status is not visible
				if ( 'mobile' == this.slider_skin_type && false == this.sliderIsVisible ) {
					this.sliderIsVisible = true;
					this.slider_container.show();
					this.cycleReInit();

				// Hide slider without mobile skin and it has status is visible
				} else if ( 'mobile' != this.slider_skin_type && true == this.sliderIsVisible ) {
					this.sliderIsVisible = false;
					this.slider_container.hide();
					this.cycleDestroy();
				}

			// For tablet & desktop
			} else {
				// Show slider does not have mobile skin and it has status is not visible
				if ( 'mobile' != this.slider_skin_type && false == this.sliderIsVisible ) {
					this.sliderIsVisible = true;
					this.slider_container.show();
					this.cycleReInit();

				// Hide slider has mobile skin and it has status is visible
				} else if ( 'mobile' == this.slider_skin_type && true == this.sliderIsVisible ) {
					this.sliderIsVisible = false;
					this.slider_container.hide();
					this.cycleDestroy();
				}
			}
		},

		carouselResize: function() {
			windowWide = $(window).width();

			var default_visible = this.default_visible;
			var new_visible = this.current_visible;
			var isbreak = false;

			console.log( new_visible );

			$.each( wc_product_sliders_breakpoints, function( i, breakpoint ) {
				if ( windowWide <= breakpoint.point && default_visible > breakpoint.max_visible ) {
					new_visible = breakpoint.max_visible;
					isbreak = true;
					return false;
				}
			});

			console.log( isbreak );

			if ( false == isbreak ) {
				new_visible = default_visible;
			}

			if ( this.current_visible == new_visible ) return false;

			this.current_visible = new_visible;

			var autoHeight = 'calc';
			if ( 1 == new_visible ) {
				autoHeight = 'container';
			}

			this.slider.cycle('destroy');
			this.slider.cycle({
				'carouselVisible': new_visible,
				'autoHeight': autoHeight
			});
		},

		cycleDestroy: function() {
			this.slider.cycle('destroy');
		},

		cycleReInit: function() {
			if ( false == this.sliderInited ) {
				this.loadItems();
			} else {
				this.slider.cycle();
			}
		},

		loadItems: function() {
			console.log('WC Product Slider - Init');

			now = new Date();
			var data = this.sliders_localStorage.find( { id: this.slider_id } );

			if (data && data.value.length) {
				// clear cached if this data is older
				if ( wc_pslier_enable_cache === false || now.getTime().toString() > data.timestamp  ) {
					this.sliders_localStorage.destroy({ id: this.slider_id });
					data = false;
				}
			}

			if (data && data.value.length) {
				if($.fn.lazyLoadXT !== undefined) {
					console.log('WC Product Slider - cycle bootstrap');
					this.sliderInited = true;
					this.creatItems(data.value);
				} else {
					this.slider.on( 'cycle-bootstrap', function() {
						if ( false == this.sliderInited ) {
							console.log('WC Product Slider - cycle bootstrap');
							this.sliderInited = true;
							this.creatItems(data.value);
						}
					}.bind( this ));
					this.slider.cycle();
				}
			} else {
				var slider_lang = '';
				if ( typeof wc_product_slider_vars.slider_lang != 'undefined' ) {
					slider_lang = wc_product_slider_vars.slider_lang;
				}
				$.post( legacy_api_url, { action: 'get_slider_items', slider_id: this.slider_id, slider_lang: slider_lang, slider_settings: this.slider_settings }, function( itemsData ) {
					if($.fn.lazyLoadXT !== undefined) {
						console.log('WC Product Slider - cycle bootstrap');
						this.sliderInited = true;
						this.creatItems(itemsData);
					} else {
						this.slider.on( 'cycle-bootstrap', function() {
							if ( false == this.sliderInited ) {
								console.log('WC Product Slider - cycle bootstrap');
								this.sliderInited = true;
								this.creatItems(itemsData);
							}
						}.bind( this ));
						this.slider.cycle();
					}

					if ( wc_pslier_enable_cache === true ) {
						tomorrow = new Date(now.getTime() + (wc_pslider_cache_timeout * 60 * 60 * 1000)); // cached in 3 days
						tomorrow_str = tomorrow.getTime().toString();
						try {
							this.sliders_localStorage.create( { id: this.slider_id, value: itemsData, timestamp: tomorrow_str } );
						} catch (e) {
							console.log("Storage failed: " + e);
							this.emptyCached();
							this.sliders_localStorage.create( { id: this.slider_id, value: itemsData, timestamp: tomorrow_str } );
						}
					}
				}.bind( this ));
			}
		},

		creatItems: function ( itemsData ) {
			if ( itemsData.length > 0 ) {
				$.each( itemsData, function ( index, data ) {
					this.collection.add( data );
				}.bind( this ));
			} else {
				this.$el.hide();
			}

			if($.fn.lazyLoadXT !== undefined) {
				function a3_product_slider_removeLazyOverlay( slideID ) {
					setTimeout( function() {
						$('#' + slideID ).parent('div').find('.a3-cycle-lazy-hidden').remove();
					}, 700 );
				}
				function a3_product_slider_callCycleLazy( slideID ) {
					$('#' + slideID ).imagesLoaded().done( function( instance ) {
						//console.log('all images of this slider successfully loaded');
						$('#' + slideID ).children('.wc-product-slider').cycle();
						a3_product_slider_removeLazyOverlay( slideID );
					});
				}

				var slideID = this.sliderID;
				//$(window).bind("load", function() {
					var checkLoadAllImages = setInterval( function() {
						//console.log('Checking is relpace src of all images');
						if ( $('#' + slideID + ' img.cycle-wc-product-image.lazy-hidden').length < 1 ) {
							//console.log('Clear interval check replace src of all images');
							clearInterval(checkLoadAllImages);
							a3_product_slider_callCycleLazy( slideID );
						}
					}, 1000 );
				//});

				this.slider.find("img.cycle-wc-product-image.lazy-hidden").on('lazyload', function(){
					$('#' + slideID).find('img.cycle-wc-product-image.lazy-hidden').each(function(){
						if ( typeof $(this).attr('data-src') !== 'undefined' ) {
							$(this).attr("src", $(this).attr('data-src') );
							$(this).removeClass('lazy-hidden');
						}
					});
				}).lazyLoadXT({visibleOnly: false});
			}
		},

		addItem: function ( slideModel ) {
			console.log('WC Product Slider - Added Slide ' + slideModel.get('item_title') );
			var slideView = new wc_product_slider.views.SlideView({ model: slideModel });
			switch( this.slider_skin_type ) {
				case 'mobile':
					this.slider.append( slideView.renderMobileItem().el );
				break;

				case 'card':
				case 'carousel':
					this.slider.append( slideView.renderCardItem().el );
				break;

				default:
					this.slider.append( slideView.renderWidgetItem().el );
				break;
			}
		},

		emptyCached: function() {
			this.sliders_localStorage._clear();
			return false;
		}
	});

	wc_product_slider.apps.App = {
		initialize: function() {

			var wc_product_slider_containers = $( '.wc-product-slider-container' );
			if ( wc_product_slider_containers.length ) {
				$(".wc-product-slider-container").each( function() {
					collection = new wc_product_slider.collections.Slides;
					new wc_product_slider.views.SliderView( { collection: collection, el : this } );
				});
			}
		},

	};

	wc_product_sliders_app.addInitializer(function(){
		var wc_product_slider_app = wc_product_slider.apps.App;
		wc_product_slider_app.initialize();
	});

});
})(jQuery);
