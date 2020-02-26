$(function () {
    $('#showOrHideForm').click(function () {
        $('#modificationForm').toggle();
    });
    $('#patientsList').chosen({
        placeholder_text_single: 'Choisissez un patient',
        no_results_text: "Aucun résultat"
    });
    $('#deleteAppointmentModal').on('show.bs.modal', function (event) {
        let deleteLink = $(event.relatedTarget);
        let appointmentId = deleteLink.data('id');
        $(this).find('.modal-footer #appointmentId').val(appointmentId);
    });
    $('#deletePatientModal').on('show.bs.modal', function (event) {
        let deleteLink = $(event.relatedTarget);
        let patientId = deleteLink.data('id');
        $(this).find('.modal-footer #patientId').val(patientId);
    });
});

