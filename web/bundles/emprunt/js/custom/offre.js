/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 $o.noConflict();
 
 $o(document).ready(function() {
 $o("#action_block").hide();        
 
 $o("#demande_id").change(function() {
 var id = getSelectValu
 */

$o = jQuery.noConflict();

$o(document).ready(function() {

//    $d("select").css("min-width","0%");
    $o("#action_block").hide();

    // Consulter offre 
    $o("#offre_id").change(function() {
        var id = getSelectValue('offre_id');           
        $o.ajax({
            url: "/app_dev.php/OpportunitesFinancement.html/offre/display/" + id,
            success: function(data) {
                $o("#form_offre").html(data);
                $o("input").prop('disabled', true);
                $o("select").prop('disabled', true);
                $o("#offre_id").prop('disabled', false);
                $o("#action_block").show();
                $o( "#etap_empruntbundle_offretype_dateoffre" ).datepicker();
                $o("#save_edit").hide();
                $o("#offre_form").attr('action','/app_dev.php/OpportunitesFinancement.html/offre/ModifierOffre/'+id)                
            },
            error: function(data) {
                            alert("Une erreur interne s'est produite, Veuillez réessayer plus tard.");
                        }  
        });

    });
    
    //Modifier offre     
    $o("#update_form").click(function() {
        $o("input").prop('disabled', false);
        $o("select").prop('disabled', false);
        $o("#offre_id").prop('disabled', true);
        $o("#update_form").prop('disabled', 'disabled');
        $o("#update_form").prop('disabled', false);
        $o("#save_edit").show();
        $o( "#etap_empruntbundle_offretype_dateoffre" ).datepicker();           
    });    

    //Enregistrer Modification
    $o("#save_edit").click(function() {
        $o("#offre_form").submit();
    });
});

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 