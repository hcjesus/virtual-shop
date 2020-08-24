$(() => {
	$(document).on('submit', '.formRegistro', function(e) {
		e.preventDefault();
		const formulario = $(this);
		$('input').removeClass('invalid');
		$('label').removeClass('error_');
		$('.message').removeClass('msg_error');
		$('.message').removeClass('msg_success');
		$('.message').hide();
		$.ajax({
	      url: formulario.attr('action'),
	      type: 'POST',
	      data: {'arreglo': JSON.stringify(formulario.serializeArray())},
	      dataType:'json',
	      success: function(response) {
	      	console.log(response)
	      	if (response.status){
	      		//let items = [];
	      		$.each(response, function(index, val) {
	      			console.log(index);
	      			if(index != 'status'){
	      				$(`#${index}_label`).addClass('error_');
	      				$(`#${index}`).addClass('invalid');
	      				//items.push(`<li>${val}</li>`);
	      				M.toast({html:val,classes:'error-toast'});
	      			}	      			
	      		});	
	      		//$('.lista').html(items);
	      		//$('.message').addClass('msg_error');
	      		//$('.message').show();
	      		//M.toast({html:items,classes:'success-toast'});					
	      	}else{
	      		formulario.trigger('reset');
	      		$('.message').removeClass('msg_error');
	      		//$('.message').addClass('msg_success');
	      		//$('.message').show();
	      		//$('.lista').html("<li>Usuario creado</li>");
	      		M.toast({html:'Usuario creado',classes:'success-toast'});
	      		//window.location.href = '/home';
	      	}
	      },
	      error: function(error) {
	        console.log("error",error);
	      },
	    });

	});


	$('.addItem').on('click', function(event) {
		event.preventDefault();
		var id = $(this).attr('idI');
		console.log(id);
		$('.modal').modal();

		const url = window.location.origin + "/" + window.location.pathname.split('/')[1];

		$.ajax({
			url: `${url}/addToCart2`,
			type: 'POST',
			dataType:'json',
			data: {'idItem': id},
		})
		.done(function(response) {
			console.log(response);
			if(response){
				var base_url = window.location.host;
				$('.conteo').html(response['qty']);
				//$('.conteo').attr('hidden', false);				
				$('.titulo2').html(response['item']['item']);
				$('.imagenModal').attr('src',`${url}/assets/images/${response['item']['imagen']}`);
				$('.contenido').html(response['item']['descripcion']);
				$('.contenido2').html('Precio: $'+response['item']['precio']+'.00');
				$('.modal').modal('open');
			}
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
		});
		
		
		
	});

	$('.eliminarItem').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('idI');
		console.log(id);
		$.ajax({
			url: 'updateCart',
			type: 'POST',
			dataType: 'json',
			data: {'idItem': id},
		})
		.done(function(response) {
			console.log(response);
			if (response) {
				$('.conteo').html(response['qty']);
				$('.ct-total').html(response['qty']);
				$('.pr-total').html('$'+response['precioTotal']+'.00');
				if(response['qty'] == 0){
					$('.btn-pagar').attr('disabled', 'disabled');
				}
				
				$(`#item0${id}`).remove();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('.btn-carrousel').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var data = {};		 
		$('.carrao').each(function () {
			let id = $(this).attr('id');
			if ($(this).prop('checked')){				
				data[id] = '1';			
			}else {
				data[id] = '0';
			}
		});
		console.log(data);
		$.ajax({
			url: 'updateCarrousel',
			type: 'POST',
			dataType: 'json',
			data: {'arregloItem': JSON.stringify(data)},
		})
		.done(function(response) {
			console.log(response);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});

	$(window).scroll(function(){
		if(screen.width > 1024){
			let nbar = $('nav').height();
			if($(this).scrollTop()>=120){
				$('nav').removeClass("scr-fixed");
				$('nav').removeClass("nosticky");
				$('nav').addClass("sticky");

			}else{
				$('nav').removeClass("scr-fixed");
				$('nav').removeClass("sticky");
				$('nav').addClass("nosticky");
			}
		}else{
			$('nav').addClass('scr-fixed');
		}
		
	});
/*
	$(document).on('scroll', function(event) {
		event.preventDefault();
		/* Act on the event */

		/*
		if (window.scrollTop() >= nbar) {
		    $('nav').toggleClass("sticky");
		  } else {
		    $('nav').toggleClass("sticky");
		  }
	});
*/

	$('.agregarCantidad').change(function(event) {
		/* Act on the event */
		let cant = $(this).val();
		let id = $(this).attr('idI');
		const url = window.location.origin + "/" + window.location.pathname.split('/')[1];

		$.ajax({
			url: `${url}/addToCart2`,
			type: 'POST',
			dataType: 'json',
			data: {'idItem': id,'cant':cant},
		})
		.done(function(response) {
			console.log(response);
			$('.conteo').html(response['qty']);
				$('.ct-total').html(response['qty']);
				$('.pr-total').html('$'+response['precioTotal']+'.00');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('.inp-buscar').keyup(function(event) {
		/* Act on the event */
		console.log($(this).val().length);
		if($(this).val().length >= 3 ){
			$('.btn-buscar').removeAttr('disabled');
		}else if($(this).val().length < 3 ){
			$('.btn-buscar').attr('disabled','disabled');
		}
	});

	$('.seguir').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.modal').modal('close');
	});

	

	$('.carousel').carousel({
		fullWidth: true,
    	indicators: true
	});

	setInterval(() => {
	  $('.carousel').carousel('next');	  
	}, 3000);
	
	$(".dropdown-trigger").dropdown({coverTrigger:false});

	$('.tooltipped').tooltip();
	$('select').formSelect();
});

