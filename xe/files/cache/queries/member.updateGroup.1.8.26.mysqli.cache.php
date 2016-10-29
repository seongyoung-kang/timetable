<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateGroup");
$query->setAction("update");
$query->setPriority("");

${'title1_argument'} = new Argument('title', $args->{'title'});
${'title1_argument'}->checkNotNull();
if(!${'title1_argument'}->isValid()) return ${'title1_argument'}->getErrorMessage();
if(${'title1_argument'} !== null) ${'title1_argument'}->setColumnType('varchar');

${'is_default2_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default2_argument'}->ensureDefaultValue('N');
${'is_default2_argument'}->checkNotNull();
if(!${'is_default2_argument'}->isValid()) return ${'is_default2_argument'}->getErrorMessage();
if(${'is_default2_argument'} !== null) ${'is_default2_argument'}->setColumnType('char');

${'description3_argument'} = new Argument('description', $args->{'description'});
${'description3_argument'}->ensureDefaultValue('');
if(!${'description3_argument'}->isValid()) return ${'description3_argument'}->getErrorMessage();
if(${'description3_argument'} !== null) ${'description3_argument'}->setColumnType('text');

${'image_mark4_argument'} = new Argument('image_mark', $args->{'image_mark'});
${'image_mark4_argument'}->ensureDefaultValue('');
if(!${'image_mark4_argument'}->isValid()) return ${'image_mark4_argument'}->getErrorMessage();
if(${'image_mark4_argument'} !== null) ${'image_mark4_argument'}->setColumnType('text');
if(isset($args->list_order)) {
${'list_order5_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order5_argument'}->isValid()) return ${'list_order5_argument'}->getErrorMessage();
} else
${'list_order5_argument'} = NULL;if(${'list_order5_argument'} !== null) ${'list_order5_argument'}->setColumnType('number');

${'group_srl6_argument'} = new ConditionArgument('group_srl', $args->group_srl, 'equal');
${'group_srl6_argument'}->checkFilter('number');
${'group_srl6_argument'}->checkNotNull();
${'group_srl6_argument'}->createConditionValue();
if(!${'group_srl6_argument'}->isValid()) return ${'group_srl6_argument'}->getErrorMessage();
if(${'group_srl6_argument'} !== null) ${'group_srl6_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title1_argument'})
,new UpdateExpression('`is_default`', ${'is_default2_argument'})
,new UpdateExpression('`description`', ${'description3_argument'})
,new UpdateExpression('`image_mark`', ${'image_mark4_argument'})
,new UpdateExpression('`list_order`', ${'list_order5_argument'})
));
$query->setTables(array(
new Table('`xe_member_group`', '`member_group`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`group_srl`',$group_srl6_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>