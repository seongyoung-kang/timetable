<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMarketplaceItem");
$query->setAction("select");
$query->setPriority("");

${'document_srl1_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl1_argument'}->checkFilter('number');
${'document_srl1_argument'}->checkNotNull();
${'document_srl1_argument'}->createConditionValue();
if(!${'document_srl1_argument'}->isValid()) return ${'document_srl1_argument'}->getErrorMessage();
if(${'document_srl1_argument'} !== null) ${'document_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`documents`.*')
,new SelectExpression('`items`.*')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
,new JoinTable('`xe_marketplace_items`', '`items`', "left outer join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`documents`.`document_srl`','`items`.`document_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`document_srl`',$document_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>