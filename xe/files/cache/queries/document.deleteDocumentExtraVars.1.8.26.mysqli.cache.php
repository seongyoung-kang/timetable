<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl17_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl17_argument'}->checkFilter('number');
${'module_srl17_argument'}->checkNotNull();
${'module_srl17_argument'}->createConditionValue();
if(!${'module_srl17_argument'}->isValid()) return ${'module_srl17_argument'}->getErrorMessage();
if(${'module_srl17_argument'} !== null) ${'module_srl17_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl18_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl18_argument'}->checkFilter('number');
${'document_srl18_argument'}->createConditionValue();
if(!${'document_srl18_argument'}->isValid()) return ${'document_srl18_argument'}->getErrorMessage();
} else
${'document_srl18_argument'} = NULL;if(${'document_srl18_argument'} !== null) ${'document_srl18_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx19_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx19_argument'}->checkFilter('number');
${'var_idx19_argument'}->createConditionValue();
if(!${'var_idx19_argument'}->isValid()) return ${'var_idx19_argument'}->getErrorMessage();
} else
${'var_idx19_argument'} = NULL;if(${'var_idx19_argument'} !== null) ${'var_idx19_argument'}->setColumnType('number');
if(isset($args->lang_code)) {
${'lang_code20_argument'} = new ConditionArgument('lang_code', $args->lang_code, 'equal');
${'lang_code20_argument'}->createConditionValue();
if(!${'lang_code20_argument'}->isValid()) return ${'lang_code20_argument'}->getErrorMessage();
} else
${'lang_code20_argument'} = NULL;if(${'lang_code20_argument'} !== null) ${'lang_code20_argument'}->setColumnType('varchar');
if(isset($args->eid)) {
${'eid21_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid21_argument'}->createConditionValue();
if(!${'eid21_argument'}->isValid()) return ${'eid21_argument'}->getErrorMessage();
} else
${'eid21_argument'} = NULL;if(${'eid21_argument'} !== null) ${'eid21_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl17_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl18_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx19_argument,"equal", 'and')
,new ConditionWithArgument('`lang_code`',$lang_code20_argument,"equal", 'and')
,new ConditionWithArgument('`eid`',$eid21_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>