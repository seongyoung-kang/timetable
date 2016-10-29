<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLoginlog");
$query->setAction("insert");
$query->setPriority("");

${'log_srl2_argument'} = new Argument('log_srl', $args->{'log_srl'});
${'log_srl2_argument'}->checkFilter('number');
${'log_srl2_argument'}->checkNotNull();
if(!${'log_srl2_argument'}->isValid()) return ${'log_srl2_argument'}->getErrorMessage();
if(${'log_srl2_argument'} !== null) ${'log_srl2_argument'}->setColumnType('number');

${'member_srl3_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl3_argument'}->checkFilter('number');
${'member_srl3_argument'}->checkNotNull();
if(!${'member_srl3_argument'}->isValid()) return ${'member_srl3_argument'}->getErrorMessage();
if(${'member_srl3_argument'} !== null) ${'member_srl3_argument'}->setColumnType('number');

${'ipaddress4_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress4_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress4_argument'}->isValid()) return ${'ipaddress4_argument'}->getErrorMessage();
if(${'ipaddress4_argument'} !== null) ${'ipaddress4_argument'}->setColumnType('varchar');

${'is_succeed5_argument'} = new Argument('is_succeed', $args->{'is_succeed'});
${'is_succeed5_argument'}->checkNotNull();
if(!${'is_succeed5_argument'}->isValid()) return ${'is_succeed5_argument'}->getErrorMessage();
if(${'is_succeed5_argument'} !== null) ${'is_succeed5_argument'}->setColumnType('char');

${'platform6_argument'} = new Argument('platform', $args->{'platform'});
${'platform6_argument'}->ensureDefaultValue('Unknown');
if(!${'platform6_argument'}->isValid()) return ${'platform6_argument'}->getErrorMessage();
if(${'platform6_argument'} !== null) ${'platform6_argument'}->setColumnType('varchar');

${'browser7_argument'} = new Argument('browser', $args->{'browser'});
${'browser7_argument'}->ensureDefaultValue('Unknown');
if(!${'browser7_argument'}->isValid()) return ${'browser7_argument'}->getErrorMessage();
if(${'browser7_argument'} !== null) ${'browser7_argument'}->setColumnType('varchar');

${'regdate8_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate8_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate8_argument'}->isValid()) return ${'regdate8_argument'}->getErrorMessage();
if(${'regdate8_argument'} !== null) ${'regdate8_argument'}->setColumnType('date');
if(isset($args->user_id)) {
${'user_id9_argument'} = new Argument('user_id', $args->{'user_id'});
if(!${'user_id9_argument'}->isValid()) return ${'user_id9_argument'}->getErrorMessage();
} else
${'user_id9_argument'} = NULL;if(${'user_id9_argument'} !== null) ${'user_id9_argument'}->setColumnType('number');
if(isset($args->email_address)) {
${'email_address10_argument'} = new Argument('email_address', $args->{'email_address'});
if(!${'email_address10_argument'}->isValid()) return ${'email_address10_argument'}->getErrorMessage();
} else
${'email_address10_argument'} = NULL;if(${'email_address10_argument'} !== null) ${'email_address10_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`log_srl`', ${'log_srl2_argument'})
,new InsertExpression('`member_srl`', ${'member_srl3_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress4_argument'})
,new InsertExpression('`is_succeed`', ${'is_succeed5_argument'})
,new InsertExpression('`platform`', ${'platform6_argument'})
,new InsertExpression('`browser`', ${'browser7_argument'})
,new InsertExpression('`regdate`', ${'regdate8_argument'})
,new InsertExpression('`user_id`', ${'user_id9_argument'})
,new InsertExpression('`email_address`', ${'email_address10_argument'})
));
$query->setTables(array(
new Table('`xe_member_loginlog`', '`member_loginlog`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>