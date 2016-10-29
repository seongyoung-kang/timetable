<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertSnsUser");
$query->setAction("insert");
$query->setPriority("");

${'id15_argument'} = new Argument('id', $args->{'id'});
${'id15_argument'}->checkNotNull();
if(!${'id15_argument'}->isValid()) return ${'id15_argument'}->getErrorMessage();
if(${'id15_argument'} !== null) ${'id15_argument'}->setColumnType('varchar');

${'service16_argument'} = new Argument('service', $args->{'service'});
${'service16_argument'}->checkNotNull();
if(!${'service16_argument'}->isValid()) return ${'service16_argument'}->getErrorMessage();
if(${'service16_argument'} !== null) ${'service16_argument'}->setColumnType('varchar');

${'regdate17_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate17_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate17_argument'}->isValid()) return ${'regdate17_argument'}->getErrorMessage();
if(${'regdate17_argument'} !== null) ${'regdate17_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`id`', ${'id15_argument'})
,new InsertExpression('`service`', ${'service16_argument'})
,new InsertExpression('`regdate`', ${'regdate17_argument'})
));
$query->setTables(array(
new Table('`xe_socialxe_user`', '`socialxe_user`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>