(function( $ ) {
	'use strict';

	var vhm_toc_el = jQuery(scripts_var.elementList);
	var vhm_toc = jQuery("#vhm-toc");
	
	if (vhm_toc_el.length > 0) {
		vhm_toc_el.each(function(i){
			jQuery(this).attr('id', 'section-' + i);
			var item = jQuery('#vhm-toc-items').append('<li class="' + scripts_var.elementItems + '"><a href="#section-' + i + '">' + jQuery(this).text() + '</a></li>' );
		});
		vhm_toc.show();
	}

})( jQuery );
