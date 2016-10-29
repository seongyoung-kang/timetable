<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroup");
$query->setAction("select");
$query->setPriority("");

${'group_srl7_argument'} = new ConditionArgument('group_srl', $args->group_srl, 'equal');
${'group_srl7_argument'}->checkFilter('number');
${'group_srl7_argument'}->checkNotNull();
${'group_srl7_argument'}->createConditionValue();
if(!${'group_srl7_argument'}->isValid()) return ${'group_srl7_argument'}->getErrorMessage();
if(${'group_srl7_argument'} !== null) ${'group_srl7_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_group`', '`member_group`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`group_srl`',$group_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>