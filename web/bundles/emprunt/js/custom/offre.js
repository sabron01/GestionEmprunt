/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 jQuery.noConflict();
 
 jQuery(document).ready(function() {
 jQuery("#action_block").hide();        
 
 jQuery("#demande_id").change(function() {
 var id = getSelectValu
 */

jQuery.noConflict();

jQuery(document).ready(function() {

    jQuery("#action_block").hide();


    // Consulter offre 

    jQuery("#offre_id").change(function() {
        var id = getSelectValue('offre_id');
        jQuery.ajax({
            url: "/app_dev.php/OpportunitesFinancement.html/offre/display/" + id,
            success: function(data) {
                jQuery("#form_offre").html(data);
                jQuery("input").prop('disabled', true);
                jQuery("select").prop('disabled', true);
                jQuery("#offre_id").prop('disabled', false);
                jQuery("#action_block").show();
                jQuery( "#etap_empruntbundle_offretype_dateoffre" ).datepicker();
            }
        });

    });
    
    //Modifier offre 
    
    jQuery("#update_form").click(function() {
        jQuery("input").prop('disabled', false);
        jQuery("select").prop('disabled', false);
        jQuery("#offre_id").prop('disabled', true);
        jQuery("#update_form").prop('disabled', 'disabled');
        jQuery( "#etap_empruntbundle_offretype_dateoffre" ).datepicker();
        jQuery("#action_block p").append('<button id="save_edit" class="stdbtn btn_blue">Enregistrer</button>');
    });    

    //Enregistrer Modification

    jQuery("#save_edit").click(function() {
        alert("click");
    });
});

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 