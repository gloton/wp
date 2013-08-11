jQuery(document).ready( function ($){
          //NO no no no.
	$("input[name='cccomm_cc_email']").blur(function(){
		$.ajax({
			type:"POST", 
			data:"cccomm_cc_email="+(this)attr("value")+"&action=cccomm_email_check",
			url:ajaxurl, //ajaxurl es una variable que wp establece por nosotros
			beforesend:function(){//beforesend que es lo que va a pasar antes que hagamos la llamada a la funcion
				 $("#emailInfo").html("Comprobando Correo...");
			},
			success:function(data){//success lo que devuelve la funcion php
				if(data == "valid") {
					$("#emailInfo")html("Email valido");
				} else {
					$("#emailInfo")html("Email no vallido");
				}
			}
		});
	});
});
