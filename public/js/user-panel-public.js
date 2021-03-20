(function( $ ) {
	$(document).ready(function(){
		$('.tab-select').on('click',function(){
			var content = $(this).data('content');
			$('.content-panel').not($(content)).removeClass('content-active').slideUp(400,function(){
				$(content).addClass('content-active').slideDown();
			});
			$('.tab-select').not($(this)).removeClass('tab-active');
			$(this).addClass('tab-active');
		});	
	});

	/**
	 * Profile image
	 */
	$(document).ready(function(){
		$('#profile_image').on('change',function(){
			$('#image-profile').submit();
		});
	});

	$(document).ready(function(){
		$('.open-form-edit').on('click',function(){
			$(this).hide(400,function(){
				$('#image-profile').css('display','flex');
			});
		});
	})
})( jQuery );
