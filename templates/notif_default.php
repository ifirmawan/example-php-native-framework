<div class="alert alert-<?php echo (isset($status))? $status : '';?> alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong class="<?php echo (isset($icon))? $icon : '';?>"></strong>&nbsp<?php echo (isset($message))? $message : '' ;?>
</div>