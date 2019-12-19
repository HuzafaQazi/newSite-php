$(document).ready(function () {
	$('.hiddenStep').css('display','none');
	$('a[href="#"]').click(function(event){

		event.preventDefault();
		var parent= $(this).closest('.step');
		//console.log(parent);
		var maincontent=$('.content >.step');
		//console.log(maincontent);
		var index=maincontent.index(parent)+1;
		//$('.container').css('display','none');
		parent.css('display','none');
		maincontent.eq(index).css('display','block');
	})

$('button').click(function(){

	validateMe();
})


});


function validateMe(){

		console.log('validate Me');
		$('label').css('color','black');
		var error=[];
		var emailreg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		$('#myForm input').each(function() {
			var inputName=$(this).attr('name');
			if ($(this).val().length>4) {

					if (inputName=='email' && !emailreg.test($(this).val())) {

						error.push($(this).attr('name'));




					}


			}


			

			else{

				error.push($(this).attr('name'));
			}	

		})

		if (error.length==0) {

			$('#myForm').submit();


		}
else{

	for(x=0;x<error.length;x++){

		$('label[for="'+error[x]+'"]').css('color','red');
		//$('input[name="'+error[x]+'"]').after('<span>Error</span>');


		console.log(error[x]);
	}
}
}

