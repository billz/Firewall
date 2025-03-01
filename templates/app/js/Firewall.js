// Hanlder for firewall modal dialog
$('#firewallModal').on('show.bs.modal', function (event) {
    const $triggerButton = $(event.relatedTarget);
    action = $triggerButton.data('firewall-action');
    $('#firewall-action').val(action);
});

$('#js-firewall').on('click', function () {
  $('#frm-firewall').submit();
});

