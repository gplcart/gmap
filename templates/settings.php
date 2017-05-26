<?php
/**
 * @package Google Map
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
        <label class="col-md-2 control-label"><?php echo $this->text('Key'); ?></label>
        <div class="col-md-6">
          <input name="settings[key]" class="form-control" value="<?php echo $this->escape($settings['key']); ?>">
          <div class="help-block"><?php echo $this->text('A key from <a href="@url">Google API Console</a>', array('@url' => 'https://developers.google.com/maps/documentation/javascript/get-api-key')); ?></div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4 col-md-offset-2">
          <div class="btn-toolbar">
            <a href="<?php echo $this->url("admin/module/list"); ?>" class="btn btn-default"><?php echo $this->text('Cancel'); ?></a>
            <button class="btn btn-default save" name="save" value="1"><?php echo $this->text('Save'); ?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>