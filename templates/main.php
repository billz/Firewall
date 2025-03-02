<?php ob_start() ?>
  <?php if (!RASPI_MONITOR_ENABLED) : ?>
    <input type="hidden" name="firewall-action" id="firewall-action" value="" />
    <?php if ($__template_data['serviceStatus'] === "up") : ?>
        <input type="submit" class="btn btn-outline btn-primary" value="<?php echo _("Apply changes"); ?>" name="apply-firewall" />
        <button type="button" class="btn btn-warning firewall-apply" data-firewall-action="firewall-disable" data-bs-toggle="modal" data-bs-target="#firewallModal"/>
          <?php echo _("Disable Firewall") ?>
        </button>
    <?php else : ?>
        <input type="submit" class="btn btn-outline btn-primary" value="<?php echo _("Save settings"); ?>" name="save-firewall" />
        <button type="button" class="btn btn-success firewall-apply" data-firewall-action="firewall-enable" data-bs-toggle="modal" data-bs-target="#firewallModal"/>
          <?php echo _("Enable Firewall") ?>
        </button>
    <?php endif; ?>
  <?php endif; ?>
<?php $buttons = ob_get_clean(); ob_end_clean() ?>

<div class="row">
  <div class="col-lg-12">
    <div class="card">

      <div class="card-header">
        <div class="row">
          <div class="col">
            <i class="fas <?php echo $__template_data['icon']; ?> me-2"></i><?php echo _($__template_data['title']); ?>
          </div>
          <div class="col">
            <button class="btn btn-light btn-icon-split btn-sm service-status float-end">
              <span class="icon text-gray-600"><i class="fas fa-circle service-status-<?php echo $__template_data['serviceStatus'] ?>"></i></span>
              <span class="text service-status"><?php echo $__template_data['serviceName'];?> <?php echo $__template_data['serviceStatus'] ?></span>
            </button>
          </div>
        </div><!-- /.row -->
      </div><!-- /.card-header -->

      <div class="card-body">
        <?php $status->showMessages(); ?>
        <form id="frm-firewall" action="<?php echo $__template_data['action']; ?>" method="POST">
          <?php echo CSRFTokenFieldTag(); ?>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" id="firewallbasictab" href="#firewallbasic" aria-controls="basic" data-bs-toggle="tab"><?php echo _("Basic"); ?></a></li>
           <li class="nav-item"><a class="nav-link" id="firewallabouttab" href="#firewallabout" data-bs-toggle="tab"><?php echo _("About"); ?></a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <?php echo renderTemplate("tabs/basic", $__template_data, $__template_data['pluginName']) ?>
            <?php echo renderTemplate("tabs/about", $__template_data, $__template_data['pluginName']) ?>
          </div><!-- /.tab-content -->

          <?php echo $buttons ?>
        </form>
      </div><!-- /.card-body -->

      <div class="card-footer"> <?php echo _("Information provided by iptables"); ?></div>
    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<!-- Custom Plugin JS -->
<script src="/app/js/plugins/Firewall.js"></script>

<!-- Modal -->
<div class="modal fade" id="firewallModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="ModalLabel">
          <i class="fas fa-fire-alt me-2"></i><?php if($__template_data['serviceStatus'] === "up") echo _("Disable Firewall"); else echo _("Enable Firewall"); ?>
        </div>
      </div>
      <div class="modal-body">
        <div class="col-md-12 mb-3 mt-1">
          <?php echo _("Changing the firewall status may disrupt or allow incoming traffic. Choose <strong>Proceed</strong> to continue."); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?php echo _("Cancel"); ?></button>
        <button type="button" id="js-firewall" data-action="execute" class="btn btn-outline btn-primary"><?php echo _("Proceed"); ?></button>
      </div>
    </div>
  </div>
</div>

