<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLogRecord");
$query->setAction("insert");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl1_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl1_argument'}->checkFilter('number');
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
} else
${'member_srl1_argument'} = NULL;if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');

${'category2_argument'} = new Argument('category', $args->{'category'});
${'category2_argument'}->checkNotNull();
if(!${'category2_argument'}->isValid()) return ${'category2_argument'}->getErrorMessage();
if(${'category2_argument'} !== null) ${'category2_argument'}->setColumnType('varchar');

${'content3_argument'} = new Argument('content', $args->{'content'});
${'content3_argument'}->checkNotNull();
if(!${'content3_argument'}->isValid()) return ${'content3_argument'}->getErrorMessage();
if(${'content3_argument'} !== null) ${'content3_argument'}->setColumnType('text');

${'act4_argument'} = new Argument('act', $args->{'act'});
${'act4_argument'}->checkNotNull();
if(!${'act4_argument'}->isValid()) return ${'act4_argument'}->getErrorMessage();
if(${'act4_argument'} !== null) ${'act4_argument'}->setColumnType('varchar');

${'micro_time5_argument'} = new Argument('micro_time', $args->{'micro_time'});
${'micro_time5_argument'}->checkNotNull();
if(!${'micro_time5_argument'}->isValid()) return ${'micro_time5_argument'}->getErrorMessage();
if(${'micro_time5_argument'} !== null) ${'micro_time5_argument'}->setColumnType('varchar');

${'ipaddress6_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress6_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress6_argument'}->isValid()) return ${'ipaddress6_argument'}->getErrorMessage();
if(${'ipaddress6_argument'} !== null) ${'ipaddress6_argument'}->setColumnType('varchar');

${'regdate7_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate7_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate7_argument'}->isValid()) return ${'regdate7_argument'}->getErrorMessage();
if(${'regdate7_argument'} !== null) ${'regdate7_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`member_srl`', ${'member_srl1_argument'})
,new InsertExpression('`category`', ${'category2_argument'})
,new InsertExpression('`content`', ${'content3_argument'})
,new InsertExpression('`act`', ${'act4_argument'})
,new InsertExpression('`micro_time`', ${'micro_time5_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress6_argument'})
,new InsertExpression('`regdate`', ${'regdate7_argument'})
));
$query->setTables(array(
new Table('`xe_socialxe_log`', '`socialxe_log`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>