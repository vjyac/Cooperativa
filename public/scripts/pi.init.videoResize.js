jQuery(function($){

	//region Video Full Height
	var $w = $(window),
		$sections = $('.pi-section-video'),
		resizeTMT;

	$w.resize(function(){
		clearTimeout(resizeTMT);
		resizeTMT = setTimeout(function(){
			setVideoHeight();
		}, 100);
	});

	setVideoHeight();

	function setVideoHeight(){
		$sections.each(function(){
			var $el = $(this);
			$el.css({
				'minHeight': $el.parents('.pi-section-w').eq(0).height()
			});
		});
	}

	//endregion

});