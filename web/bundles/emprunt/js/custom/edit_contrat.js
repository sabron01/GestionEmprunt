$d = jQuery.noConflict();

$d(document).ready(function() {

    $d("select").css("min-width","0%");
    $d(".hasDatepicker").datepicker();
    $d("input").prop('disabled', true);
    $d("select").prop('disabled', true);
    $d("#save_edit").hide();
    //$d("#update_form").show();

    // Consulter contrat 
    $d("#contrat_id").change(function() {
        var id = getSelectValue('contrat_id');
        var url_display = "/app_dev.php/Contrats.html/consulterContrat/"+id;
        window.location = url_display;
    });

    //Modifier contrat     
    $d("#update_form").click(function() {        
        $d(".buttonNext").prop('disabled', false);
        $d("input").prop('disabled', false);
        $d("select").prop('disabled', false);
        $d("#update_form").prop('disabled', false);
        $d("#save_edit").show();         
    });

    //Enregistrer Modification
    $d("#save_edit").click(function() {  
        var id = $d("#current_id").html();
        $d("#contrat_form").attr('action','/app_dev.php/Contrats.html/modifierContrat/'+id);
        $d("#contrat_form").submit();
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