/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 $d.noConflict();
 */

$d = jQuery.noConflict();

$d(document).ready(function() {
    
//    $d("select").css("min-width","0%");
    $d("#action_block").hide();
        
    // Consulter demande 
    $d("#demande_id").change(function() {
        var id = getSelectValue('demande_id');
        var url_display = "/app_dev.php/OpportunitesFinancement.html/demande/display/"+id;
        $d.ajax({
            url: url_display,
            success: function(data) {
                $d("#form_request").html(data);
                $d("input").prop('disabled', true);
                $d("select").prop('disabled', true);
                $d("#demande_id").prop('disabled', false);
                $d("#action_block").show();
                $d("#save_edit").hide();
                $d("#demande_form").attr('action','/app_dev.php/OpportunitesFinancement.html/demande/ModifierDemande/'+id);
            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }                       
        });
    });
    
    //Modifier demande     
    $d("#update_form").click(function() {
        $d("input").prop('disabled', false);
        $d("select").prop('disabled', false);
        $d("#demande_id").prop('disabled', true);
        $d("#update_form").prop('disabled', 'disabled');
        $d("#update_form").prop('disabled', false);
        $d("#save_edit").show();
        $d( "#etap_empruntbundle_demandetype_datedemande" ).datepicker();            
    });    

    //Enregistrer Modification
    $d("#save_edit").click(function() {
        $d("#demande_form").submit();
    });
    
        ///// Initialide Date widget /////
//    $d( "#etap_empruntbundle_demandetype_datedemande" ).datepicker();    
});

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 