$(function () {
    $('#showOrHideForm').click(function(){

            $('#modificationForm').toggle();
    });
    $('#patientsList').chosen({
        placeholder_text_single: 'Choisissez un patient',
        no_results_text: "Aucun résultat"
    });
    
});

