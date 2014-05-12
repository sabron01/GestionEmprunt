/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 jQuery.noConflict();
 */

jQuery.noConflict();

jQuery(document).ready(function() {

        jQuery(".inline").colorbox({inline: true, width: '60%', height: '500px'});

        jQuery('select, input:checkbox').uniform();

//        var index = 0;        
//        var prototype = jQuery('ul.form-tirages').data('prototype');

        jQuery("#new_tirage").click(function() {
            alert("!!!!Une erreur interne s'est produite, Veuillez réessayer plus tard.","Attention!");

//            var newForm = prototype.replace(/__name__/g, index++);
//            jQuery("#btn_new_block_tirage").before(newForm);

//            var id = jQuery("#etap_empruntbundle_contrattype_nbrtirage").val();
//            id = parseInt(id) + 1;
//            var url_display = "/app_dev.php/Contrats.html/tirage/display/" + id;
//            jQuery.ajax({    
//                url: url_display,
//                success: function(data) {
//                    jQuery("#btn_new_block_tirage").before(data);
//                    jQuery("#etap_empruntbundle_contrattype_nbrtirage").val(id);
//                },
//                error: function(data) {
//                    jAlert("!!!!Une erreur interne s'est produite, Veuillez réessayer plus tard.","Attention!");
//                }
//            });
        });           
        
	jQuery('.add_banque').click(function(){
                var url_display = "/app_dev.php/banque/ajouter";
                jQuery.ajax({
                    url: url_display,
                    success: function(data) {    
                        jAlert(data,"Nouvelle Banque",function (){  });
                        jQuery('#popup_ok').bind('click',function(){
//                            jQuery('#form_bank').submit();
                            jQuery.ajax({
                                type: "POST",
                                url: url_display,
                                data: jQuery('#form_bank').serialize(),
                                dataType: 'txt',
                                success: function(data) {
                                    if(data == 1)
                                    {
                                        jAlert('<div class="notibar msgsuccess"><a class="close"></a><p>La Banque a été ajoutée.</p></div>');
                                        location.reload(true);    
                                    }
                                },
                                error: function(data) {
                                    jAlert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                                    location.reload(true);    
                                }
                            });
                            
//                            jQuery.post(
//                                url_display,
//                                jQuery("#form_bank").serialize(),
//                                function(data, textStatus, jqXHR)
//                                {
//                                    if(data == 1)
//                                    {
//                                        jAlert('<div class="notibar msgsuccess"><a class="close"></a><p>La Banque a été ajoutée.</p></div>');
//                                        location.reload(true);    
//                                    }
//                                }).fail(function(jqXHR, textStatus, errorThrown)
//                                {
//                                    jAlert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
//                                    location.reload(true);                                    
//                                });

                        });
                    },
                    error: function(data) {
                        jAlert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                    }
                });            
		
		return false;
	});

    });

    function deleteBloc(id) {
        jQuery("#tirage_" + id).remove();
        var id = jQuery("#etap_empruntbundle_contrattype_nbrtirage").val();
        id = parseInt(id) - 1;
        jQuery("#etap_empruntbundle_contrattype_nbrtirage").val(id);

    } 
   
jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
    jQuery("#loaders").css("display","none");
    //jQuery('#popup_ok').hide(); 
});

jQuery(document).ajaxStart(function(){
  jQuery("#loaders").css("display","absolute");
});
