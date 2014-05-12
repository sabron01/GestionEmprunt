/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 $u.noConflict();
 */

$u = jQuery.noConflict();

$u(document).ready(function() {

    $u("#action_block").hide();
        
    // Consulter utilisateur 
    $u("#utilisateur_id").change(function() {
        
        var id = getSelectValue('utilisateur_id');
        var url_display = "/app_dev.php/Utilisateurs.html/display/"+id;
        $u.ajax({
            url: url_display,
            success: function(data) {             
                $u("#form_user").html(data);
                $u("input").prop('disabled', true);
                $u("select").prop('disabled', true);                
                $u("#utilisateur_id").prop('disabled', false);               
                $u("#action_block").show();
                $u("#save_edit").hide();
                $u("#delete_form").hide();
                $u("#user_form").attr('action','/app_dev.php/Utilisateurs.html/modifierUtilisateur/'+id);
                $u("#delete_form").attr('href','/app_dev.php/Utilisateurs.html/supprimerUtilisateur/'+id);
            },
            error: function(data) {
                            jAlert("Une erreur interne s'est produite, Veuillez réessayer plus tard.","Attention !!!");
                        }                       
        });
    });
    
    //Modifier utilisateur 
    
    $u("#update_form").click(function() {
        $u("input").prop('disabled', false);
        $u("select").prop('disabled', false);
        $u("#utilisateur_id").prop('disabled', true);
        $u("#save_edit").show();
        $u("#delete_form").show();        
        $u("#update_form").prop('disabled', 'disabled');
    });    

    //Enregistrer Modification
    $u("#save_edit").click(function() {
        $u("#user_form").submit();
    });
    
        ///// Initialide Date widget /////
    $u( "#etap_empruntbundle_utilisateurtype_dateutilisateur" ).datepicker();    
});

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
    return selectElmt.options[selectElmt.selectedIndex].value;
} 