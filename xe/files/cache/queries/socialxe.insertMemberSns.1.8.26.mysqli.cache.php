<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMemberSns");
$query->setAction("insert");
$query->setPriority("");

${'member_srl1_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl1_argument'}->checkFilter('number');
${'member_srl1_argument'}->checkNotNull();
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');

${'service2_argument'} = new Argument('service', $args->{'service'});
${'service2_argument'}->checkNotNull();
if(!${'service2_argument'}->isValid()) return ${'service2_argument'}->getErrorMessage();
if(${'service2_argument'} !== null) ${'service2_argument'}->setColumnType('varchar');

${'id3_argument'} = new Argument('id', $args->{'id'});
${'id3_argument'}->checkNotNull();
if(!${'id3_argument'}->isValid()) return ${'id3_argument'}->getErrorMessage();
if(${'id3_argument'} !== null) ${'id3_argument'}->setColumnType('varchar');

${'name4_argument'} = new Argument('name', $args->{'name'});
${'name4_argument'}->checkNotNull();
if(!${'name4_argument'}->isValid()) return ${'name4_argument'}->getErrorMessage();
if(${'name4_argument'} !== null) ${'name4_argument'}->setColumnType('varchar');
if(isset($args->email)) {
${'email5_argument'} = new Argument('email', $args->{'email'});
if(!${'email5_argument'}->isValid()) return ${'email5_argument'}->getErrorMessage();
} else
${'email5_argument'} = NULL;if(${'email5_argument'} !== null) ${'email5_argument'}->setColumnType('varchar');
if(isset($args->profile_image)) {
${'profile_image6_argument'} = new Argument('profile_image', $args->{'profile_image'});
if(!${'profile_image6_argument'}->isValid()) return ${'profile_image6_argument'}->getErrorMessage();
} else
${'profile_image6_argument'} = NULL;if(${'profile_image6_argument'} !== null) ${'profile_image6_argument'}->setColumnType('varchar');
if(isset($args->profile_url)) {
${'profile_url7_argument'} = new Argument('profile_url', $args->{'profile_url'});
if(!${'profile_url7_argument'}->isValid()) return ${'profile_url7_argument'}->getErrorMessage();
} else
${'profile_url7_argument'} = NULL;if(${'profile_url7_argument'} !== null) ${'profile_url7_argument'}->setColumnType('varchar');
if(isset($args->profile_info)) {
${'profile_info8_argument'} = new Argument('profile_info', $args->{'profile_info'});
if(!${'profile_info8_argument'}->isValid()) return ${'profile_info8_argument'}->getErrorMessage();
} else
${'profile_info8_argument'} = NULL;if(${'profile_info8_argument'} !== null) ${'profile_info8_argument'}->setColumnType('text');
if(isset($args->access_token)) {
${'access_token9_argument'} = new Argument('access_token', $args->{'access_token'});
if(!${'access_token9_argument'}->isValid()) return ${'access_token9_argument'}->getErrorMessage();
} else
${'access_token9_argument'} = NULL;if(${'access_token9_argument'} !== null) ${'access_token9_argument'}->setColumnType('text');
if(isset($args->refresh_token)) {
${'refresh_token10_argument'} = new Argument('refresh_token', $args->{'refresh_token'});
if(!${'refresh_token10_argument'}->isValid()) return ${'refresh_token10_argument'}->getErrorMessage();
} else
${'refresh_token10_argument'} = NULL;if(${'refresh_token10_argument'} !== null) ${'refresh_token10_argument'}->setColumnType('text');

${'linkage11_argument'} = new Argument('linkage', $args->{'linkage'});
${'linkage11_argument'}->ensureDefaultValue('N');
if(!${'linkage11_argument'}->isValid()) return ${'linkage11_argument'}->getErrorMessage();
if(${'linkage11_argument'} !== null) ${'linkage11_argument'}->setColumnType('char');

${'regdate12_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate12_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate12_argument'}->isValid()) return ${'regdate12_argument'}->getErrorMessage();
if(${'regdate12_argument'} !== null) ${'regdate12_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`member_srl`', ${'member_srl1_argument'})
,new InsertExpression('`service`', ${'service2_argument'})
,new InsertExpression('`id`', ${'id3_argument'})
,new InsertExpression('`name`', ${'name4_argument'})
,new InsertExpression('`email`', ${'email5_argument'})
,new InsertExpression('`profile_image`', ${'profile_image6_argument'})
,new InsertExpression('`profile_url`', ${'profile_url7_argument'})
,new InsertExpression('`profile_info`', ${'profile_info8_argument'})
,new InsertExpression('`access_token`', ${'access_token9_argument'})
,new InsertExpression('`refresh_token`', ${'refresh_token10_argument'})
,new InsertExpression('`linkage`', ${'linkage11_argument'})
,new InsertExpression('`regdate`', ${'regdate12_argument'})
));
$query->setTables(array(
new Table('`xe_socialxe`', '`socialxe`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>