$d = jQuery.noConflict();

$d(document).ready(function() {

    $d("select").css("min-width","0%");
    $d(".hasDatepicker").datepicker();
    $d("#save_edit").hide();
    $d("#update_form").hide();

    // Consulter contrat 
    $d("#contrat_id").change(function() {
        var id = getSelectValue('contrat_id');
        var url_display = "/app_dev.php/Contrats.html/consulterContrat/"+id;
        window.location = url_display;
    });

    //Modifier contrat     
    $d("#update_form").click(function() {
        $d("input").prop('disabled', false);
        $d("select").prop('disabled', false);
        $d("#update_form").prop('disabled', false);
        $d("#save_edit").show();         
    });
    //Save Add Tirage    
    $d("#save_add_tirage").click(function() {
        var link = $d("#link_add_save").html();
        $d("#form_convention").attr('action',link);
        $d("#form_convention").submit();
    });
    
    //Save Add Tirage for Edit   
    $d("#save_add_tirage_edit").click(function() {
        var link = $d("#link_add_save_edit").html();
        $d("#form_convention").attr('action',link);
        $d("#form_convention").submit();
    });    

    $d("#add_tirage").click(function() {
        var id = $d("#etap_empruntbundle_contrattype_nbrtirage").val();
        id = parseInt(id) + 1;
        var url_display = "/app_dev.php/Contrats.html/tirage/display/" + id;
        $d.ajax({
            url: url_display,
            success: function(data) {
                $d("#btn_new_block_tirage").before(data);
                $d("#etap_empruntbundle_contrattype_nbrtirage").val(id);
            },
            error: function(data) {
                jAlert("!!!!Une erreur interne s'est produite, Veuillez réessayer plus tard.", "Attention!");
            }
        });
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
                                    jAlert('<div class="notibar msgsuccess"><a class="close"></a><p>La Banque a été ajoutée.</p></div>');
//                                    jAlert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
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
    $d("#tirage_" + id).remove();
    var id = $d("#etap_empruntbundle_contrattype_nbrtirage").val();
    id = parseInt(id) - 1;
    $d("#etap_empruntbundle_contrattype_nbrtirage").val(id);

}

$d(document).ajaxComplete(function(event, xhr, settings) {
    $d("#loaders").css("display", "none");
    //$d('#popup_ok').hide(); 
});

$d(document).ajaxStart(function() {
    $d("#loaders").css("display", "absolute");
});    

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 