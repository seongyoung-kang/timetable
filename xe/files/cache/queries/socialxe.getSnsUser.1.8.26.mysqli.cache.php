<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSnsUser");
$query->setAction("select");
$query->setPriority("");

${'id13_argument'} = new ConditionArgument('id', $args->id, 'equal');
${'id13_argument'}->checkNotNull();
${'id13_argument'}->createConditionValue();
if(!${'id13_argument'}->isValid()) return ${'id13_argument'}->getErrorMessage();
if(${'id13_argument'} !== null) ${'id13_argument'}->setColumnType('varchar');
if(isset($args->service)) {
${'service14_argument'} = new ConditionArgument('service', $args->service, 'equal');
${'service14_argument'}->createConditionValue();
if(!${'service14_argument'}->isValid()) return ${'service14_argument'}->getErrorMessage();
} else
${'service14_argument'} = NULL;if(${'service14_argument'} !== null) ${'service14_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_socialxe_user`', '`socialxe_user`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`id`',$id13_argument,"equal")
,new ConditionWithArgument('`service`',$service14_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>