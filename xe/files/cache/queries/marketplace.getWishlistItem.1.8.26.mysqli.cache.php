<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getWishlistItem");
$query->setAction("select");
$query->setPriority("");

${'document_srl19_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl19_argument'}->checkFilter('number');
${'document_srl19_argument'}->checkNotNull();
${'document_srl19_argument'}->createConditionValue();
if(!${'document_srl19_argument'}->isValid()) return ${'document_srl19_argument'}->getErrorMessage();
if(${'document_srl19_argument'} !== null) ${'document_srl19_argument'}->setColumnType('number');

${'member_srl20_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl20_argument'}->checkFilter('number');
${'member_srl20_argument'}->checkNotNull();
${'member_srl20_argument'}->createConditionValue();
if(!${'member_srl20_argument'}->isValid()) return ${'member_srl20_argument'}->getErrorMessage();
if(${'member_srl20_argument'} !== null) ${'member_srl20_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`marketplace_wishlist`.*')
));
$query->setTables(array(
new Table('`xe_marketplace_wishlist`', '`marketplace_wishlist`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl19_argument,"equal", 'and')
,new ConditionWithArgument('`member_srl`',$member_srl20_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>