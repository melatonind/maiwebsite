var tongueHeight = 0;
var buffer = 5;

$(window).scroll(function() {
	buffer++;
	if (tongueHeight < 65 && buffer > 5) {
		tongueHeight ++ ;
		tongueHeight = tongueHeight + 2 ;
	}
	
	extendTongue(tongueHeight);
});

function extendTongue(tongueHeight){
	$('head').append('<style>#circle:before, #circle:after {height: '+ tongueHeight +'px; top: -' + tongueHeight + 'px;}</style>');
}

function resetTongue() {
	buffer = 0;
	tongueHeight = 0;
	extendTongue(tongueHeight);
}