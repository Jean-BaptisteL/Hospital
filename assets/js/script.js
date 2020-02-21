$(function () {
    $('#showOrHideForm').click(function(){

            $('#modificationForm').toggle();
    });
    $('#patientsList').chosen({
        placeholder_text_single: 'Choisissez un patient',
        no_results_text: "Aucun résultat"
    });
    $('#deleteAppointmentModal').on('show.bs.modal', function(event){
       var deleteLink = $(event.relatedTarget);
       var appointmentId = deleteLink.data('id');
       $(this).find('.modal-footer #appointmentId').val(appointmentId);
    });
    $('#deletePatientModal').on('show.bs.modal', function(event){
       var deleteLink = $(event.relatedTarget);
       var patientId = deleteLink.data('id');
       $(this).find('.modal-footer #patientId').val(patientId);
    });
    $('#searchPatient').autocomplete({
       source : '../../models/patient.php'
    });
});

