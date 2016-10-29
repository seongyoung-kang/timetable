<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMarketplaceItemInfo");
$query->setAction("insert");
$query->setPriority("");

${'document_srl18_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl18_argument'}->checkFilter('number');
${'document_srl18_argument'}->checkNotNull();
if(!${'document_srl18_argument'}->isValid()) return ${'document_srl18_argument'}->getErrorMessage();
if(${'document_srl18_argument'} !== null) ${'document_srl18_argument'}->setColumnType('number');

${'thumbnails_srl19_argument'} = new Argument('thumbnails_srl', $args->{'thumbnails_srl'});
${'thumbnails_srl19_argument'}->checkFilter('number');
${'thumbnails_srl19_argument'}->checkNotNull();
if(!${'thumbnails_srl19_argument'}->isValid()) return ${'thumbnails_srl19_argument'}->getErrorMessage();
if(${'thumbnails_srl19_argument'} !== null) ${'thumbnails_srl19_argument'}->setColumnType('number');
if(isset($args->product_name)) {
${'product_name20_argument'} = new Argument('product_name', $args->{'product_name'});
if(!${'product_name20_argument'}->isValid()) return ${'product_name20_argument'}->getErrorMessage();
} else
${'product_name20_argument'} = NULL;if(${'product_name20_argument'} !== null) ${'product_name20_argument'}->setColumnType('varchar');
if(isset($args->original_price)) {
${'original_price21_argument'} = new Argument('original_price', $args->{'original_price'});
if(!${'original_price21_argument'}->isValid()) return ${'original_price21_argument'}->getErrorMessage();
} else
${'original_price21_argument'} = NULL;if(${'original_price21_argument'} !== null) ${'original_price21_argument'}->setColumnType('number');
if(isset($args->price)) {
${'price22_argument'} = new Argument('price', $args->{'price'});
if(!${'price22_argument'}->isValid()) return ${'price22_argument'}->getErrorMessage();
} else
${'price22_argument'} = NULL;if(${'price22_argument'} !== null) ${'price22_argument'}->setColumnType('number');
if(isset($args->item_condition)) {
${'item_condition23_argument'} = new Argument('item_condition', $args->{'item_condition'});
if(!${'item_condition23_argument'}->isValid()) return ${'item_condition23_argument'}->getErrorMessage();
} else
${'item_condition23_argument'} = NULL;if(${'item_condition23_argument'} !== null) ${'item_condition23_argument'}->setColumnType('varchar');
if(isset($args->used_month)) {
${'used_month24_argument'} = new Argument('used_month', $args->{'used_month'});
if(!${'used_month24_argument'}->isValid()) return ${'used_month24_argument'}->getErrorMessage();
} else
${'used_month24_argument'} = NULL;if(${'used_month24_argument'} !== null) ${'used_month24_argument'}->setColumnType('number');
if(isset($args->priority_area)) {
${'priority_area25_argument'} = new Argument('priority_area', $args->{'priority_area'});
if(!${'priority_area25_argument'}->isValid()) return ${'priority_area25_argument'}->getErrorMessage();
} else
${'priority_area25_argument'} = NULL;if(${'priority_area25_argument'} !== null) ${'priority_area25_argument'}->setColumnType('varchar');
if(isset($args->delivery)) {
${'delivery26_argument'} = new Argument('delivery', $args->{'delivery'});
if(!${'delivery26_argument'}->isValid()) return ${'delivery26_argument'}->getErrorMessage();
} else
${'delivery26_argument'} = NULL;if(${'delivery26_argument'} !== null) ${'delivery26_argument'}->setColumnType('char');
if(isset($args->direct_dealing)) {
${'direct_dealing27_argument'} = new Argument('direct_dealing', $args->{'direct_dealing'});
if(!${'direct_dealing27_argument'}->isValid()) return ${'direct_dealing27_argument'}->getErrorMessage();
} else
${'direct_dealing27_argument'} = NULL;if(${'direct_dealing27_argument'} !== null) ${'direct_dealing27_argument'}->setColumnType('char');
if(isset($args->safe_dealing)) {
${'safe_dealing28_argument'} = new Argument('safe_dealing', $args->{'safe_dealing'});
if(!${'safe_dealing28_argument'}->isValid()) return ${'safe_dealing28_argument'}->getErrorMessage();
} else
${'safe_dealing28_argument'} = NULL;if(${'safe_dealing28_argument'} !== null) ${'safe_dealing28_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`document_srl`', ${'document_srl18_argument'})
,new InsertExpression('`thumbnails_srl`', ${'thumbnails_srl19_argument'})
,new InsertExpression('`product_name`', ${'product_name20_argument'})
,new InsertExpression('`original_price`', ${'original_price21_argument'})
,new InsertExpression('`price`', ${'price22_argument'})
,new InsertExpression('`item_condition`', ${'item_condition23_argument'})
,new InsertExpression('`used_month`', ${'used_month24_argument'})
,new InsertExpression('`priority_area`', ${'priority_area25_argument'})
,new InsertExpression('`delivery`', ${'delivery26_argument'})
,new InsertExpression('`direct_dealing`', ${'direct_dealing27_argument'})
,new InsertExpression('`safe_dealing`', ${'safe_dealing28_argument'})
));
$query->setTables(array(
new Table('`xe_marketplace_items`', '`marketplace_items`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>