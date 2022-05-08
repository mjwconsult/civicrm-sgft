(function($) {

  document.addEventListener('DOMContentLoaded', function() {
    console.log('load c4');

    function lockFields() {
      // disable checkbox for installments field
      $('#is_recur').prop('disabled', true);

      // set installments to 12 and disable field
      var installmentsInput = $('#installments');
      installmentsInput.val(12);
      installmentsInput.prop('disabled', true);

      // target the date selector, add May 13th as option and force selection
      var dateSelectInput = $('#receive_date');
      var theThirteenth = '20220513030000';
      dateSelectInput.append(
        $('<option>', {
          value: theThirteenth,
          text: 'May 13th, 2022',
        })
      );
      dateSelectInput.val(theThirteenth);
      dateSelectInput.prop('disabled', true);
    }

    lockFields();
  });

}(CRM.$));
