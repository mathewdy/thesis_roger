var check_in = $('#check_in');
var check_out = $('#check_out');

check_in.datepicker({
keyboardNavigation: false,
forceParse: false,
autoclose: true,
format: 'yyyy-mm-dd',
startDate: new Date()
});
check_out.datepicker({
keyboardNavigation: false,
forceParse: false,
format: 'yyyy-mm-dd',
autoclose: true,
});
check_in.on("changeDate", function(e) {
check_out.datepicker('setStartDate', e.date);
check_out.prop('disabled', false);
});