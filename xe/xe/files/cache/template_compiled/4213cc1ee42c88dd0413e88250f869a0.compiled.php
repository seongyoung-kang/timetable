<?php if(!defined("__XE__"))exit;?><!--#Meta:widgets/counter_status/skins/default/css/widget.css--><?php $__tmp=array('widgets/counter_status/skins/default/css/widget.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="widgetContainer<?php if($__Context->colorset=="black"){ ?> black<?php } ?>">
    <dl class="widgetCounter">
        <dt><?php echo $__Context->lang->today ?>:</dt>
        <dd><?php echo number_format($__Context->today_counter->unique_visitor) ?></dd>
        <dt><?php echo $__Context->lang->yesterday ?>:</dt>
        <dd><?php echo number_format($__Context->yesterday_counter->unique_visitor) ?></dd>
        <dt><?php echo $__Context->lang->total ?>:</dt>
        <dd><?php echo number_format($__Context->total_counter->unique_visitor) ?></dd>
    </dl>
</div>
