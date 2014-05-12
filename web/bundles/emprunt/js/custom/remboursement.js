/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 jQuery.noConflict();
 */

jQuery.noConflict();

jQuery(document).ready(function() {
    jQuery("#action_block").hide();
    ///// DATE PICKER /////
    jQuery( "#datepickfrom, #datepickto" ).datepicker();
    // Générate Table de Remboursement
    jQuery("#generate_table").click(function() { 
        jAlert('<div class="notibar msgsuccess" ><a class="close"></a><p>Le Tableau de Remboursement du Tirage 1856 a été généré avec succès</p></div>',"Information");
//        jQuery(".msgsuccess").show();
    });
    
    // Consulter demande 
    jQuery("#contrat_id_2").change(function() {
        var id = getSelectValue('contrat_id_2');
        var url_display = "/app_dev.php/Remboursements.html/displayTirages/"+id;
        jQuery.ajax({
            url: url_display,
            success: function(data) {
                jQuery("#list_tirage").html(data);
                jQuery("#action_block").hide();
            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }                       
        });
    });
    
    // Consulter demande 
    jQuery("#contrat_id").change(function() {
        var id = getSelectValue('contrat_id');
        var url_display = "/app_dev.php/Remboursements.html/displayTiragesList/"+id;
        jQuery.ajax({
            url: url_display,
            success: function(data) {
                jQuery("#list_tirage").html(data);
                jQuery("#action_block").show();
            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }                       
        });
    });
    
    jQuery("#tirage_id").change(function() {
        alert("ok");
        var id = 1;
        var url_display = "/app_dev.php/Remboursements.html/afficherTableRemboursement/"+id;
        jQuery.ajax({
            url: url_display,
            success: function(data) {
                jQuery("#table_rembourssement").html(data);
                jQuery("#action_block").show();
            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }                       
        });
    });
    
});

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 