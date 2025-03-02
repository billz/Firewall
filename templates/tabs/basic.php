<!-- basic settings tab -->
<div class="tab-pane active" id="firewallbasic">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="mt-3"><?php echo _("Client Firewall"); ?></h4>

      <?php if ( $fw_conf["firewall-enable"]) : ?>
         <i class="fas fa-circle me-2 service-status-up"></i><?php echo _("Firewall is ENABLED"); ?>
      <?php else : ?>
         <i class="fas fa-circle me-2 service-status-down"></i><?php echo _("Firewall is OFF"); ?>
      <?php endif ?>

      <div class="row">
        <div class="col-md-6">
          <p class="me-2">
            <small>
              <?php echo _("The default firewall will only allow outgoing and already established traffic."); ?><br />
              <?php echo _("No incoming UDP traffic is allowed."); ?><br />
              <?php printf(_("There are no restrictions for the access point <code>%s</code>."), $ap_device); ?>
            </small>
          </p>
        </div>
      </div>
        <h5><?php echo _("Exception: Service"); ?></h4>
        <div class="row">
          <div class="mb-3 col-md-6">
              <div class="form-check form-switch">
                  <input class="form-check-input" id="ssh-enable" type="checkbox" name="ssh-enable" value="1" aria-describedby="exception-description" <?php if ($fw_conf["ssh-enable"]) echo "checked"; ?> >
                  <label class="form-check-label" for="ssh-enable"><?php echo _("allow SSH access on port 22") ?></label>
              </div>
              <div class="form-check form-switch">
                  <input class="form-check-input" id="http-enable" type="checkbox" name="http-enable" value="1" aria-describedby="exceptions-description" <?php if ($fw_conf["http-enable"]) echo "checked"; ?> >
                  <label class="form-check-label" for="http-enable"><?php echo _("allow access to the RaspAP GUI on port 80 or 443") ?></label>
              </div>
              <p class="mb-0" id="exceptions-description">
                  <small><?php echo _("Allow incoming connections for some services from the internet side.") ?></small>
              </p>
          </div>
        </div>
        <h5><?php echo _("Exception: network device"); ?></h4>
        <div class="row">
          <div class="mb-3 col-md-6">
              <label for="excl-device"><?php echo _("Exclude device(s)") ?></label>
              <input class="form-control" id="excl-devices" type="text" name="excl-devices" value="<?php echo $fw_conf["excl-devices"] ?>" aria-describedby="exclusion-description"  >
              <p class="mb-0" id="exclusion-description">
                <small>
                  <?php echo _("Exclude the given network device(s) (separated by a blank or comma) from firewall rules."); ?><br />
                  <?php printf(_("Current client devices: <code>%s</code>"), $str_clients); ?><br />
                  <?php printf(_("The access point <code>%s</code> is per default excluded."), $ap_device); ?>
                </small>
              </p>
          </div>
        </div>
        <h5><?php echo _("Exception: IP-Address"); ?></h4>
        <div class="row">
          <div class="mb-3 col-md-6">
              <label for="excluded-ips"><?php echo _("Allow incoming connections from") ?></label>
              <input class="form-control" id="excluded-ips" type="text" name="excluded-ips" value="<?php echo $fw_conf["excluded-ips"] ?>" aria-describedby="excl-ips-description"  >
              <p class="mb-0" id="excl-ips-description">
                <small>
                  <?php echo _("For the given IP-addresses (separated by a blank or comma) the incoming connection (via TCP and UDP) is accepted."); ?><br />
                  <?php echo _("This is required for an OpenVPN via UDP or Wireguard connection."); ?><br />
                  <?php if ( !empty($vpn_ips) ) printf (_("The list of configured VPN server IP addresses: <code><b>%s</b></code>"), str_replace(" ", ", ", $vpn_ips)); ?>
                </small>
              </p>
          </div>

        </div>
    </div><!-- /.row -->
  </div><!-- /.tab-pane | basic tab -->
</div>

