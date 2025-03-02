document.addEventListener('DOMContentLoaded', function () {
    const firewallModal = document.getElementById('firewallModal');
    const jsFirewall = document.getElementById('js-firewall');
    const firewallAction = document.getElementById('firewall-action');
    const frmFirewall = document.getElementById('frm-firewall');

    if (firewallModal) {
        firewallModal.addEventListener('show.bs.modal', function (event) {
            const triggerButton = event.relatedTarget;
            if (triggerButton) {
                const action = triggerButton.getAttribute('data-firewall-action');
                if (firewallAction) {
                    firewallAction.value = action;
                }
            }
        });
    }

    if (jsFirewall && frmFirewall) {
        jsFirewall.addEventListener('click', function () {
            frmFirewall.submit();
        });
    }
});

