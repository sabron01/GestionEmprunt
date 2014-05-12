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

    // Consulter demande 
    jQuery("#besoin_id").change(function() {
        var id = getSelectValue('besoin_id');
        var url_display = "/app_dev.php/Projets.html/besoin/display/"+id;
        jQuery.ajax({
            url: url_display,
            success: function(data) {
                jQuery("#form_besoin").html(data);
                jQuery("input").prop('disabled', true);
                jQuery("select").prop('disabled', true);
                jQuery("#besoin_id").prop('disabled', false);
                jQuery("#action_block").show();

            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }                       
        });
    });
    
    //Modifier demande 
    
    jQuery("#update_form").click(function() {
        jQuery("input").prop('disabled', false);
        jQuery("select").prop('disabled', false);
        jQuery("#demande_id").prop('disabled', true);
        jQuery("#update_form").prop('disabled', 'disabled');
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