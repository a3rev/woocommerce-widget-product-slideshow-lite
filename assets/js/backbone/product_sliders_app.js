	// An Application object constructor function
	function WC_ProductSliders_Application(options) {

		// extend this instance with all the options provided
		_.extend(this, options);

		// a place to store initializer functions
		this._initializers = jQuery.Deferred();
	};

	// Application instance methods go here
	_.extend( WC_ProductSliders_Application.prototype, Backbone.Events, {
		addInitializer: function(initializer){
			this._initializers.done(initializer);
		},

		start: function(args){
			// get the complete args list as an array
			args = Array.prototype.slice.call(arguments);

			// resolve the initializers promise
			this._initializers.resolveWith(this, args);

			// trigger the start event
			this.trigger("start", args);
		}
	});

	var wc_product_sliders_app = new WC_ProductSliders_Application();