<?php
print $rows; 
$prod_details = node_load(arg(1));

$ref = '';
if(!empty($prod_details->field_api_docs_swagger[LANGUAGE_NONE])){
  foreach($prod_details->field_api_docs_swagger[LANGUAGE_NONE] as $key => $value){
	$swag = node_load($value['nid']);
	$ref .= '<li class="upswag" data-file-name="'.file_create_url($swag->field_swagger_ui[LANGUAGE_NONE][0]['uri']).'">'.$swag->title.'</li>';
  }
  echo $ref;
}

if(!empty($prod_details->field_soap_api_docs[LANGUAGE_NONE])){
  foreach($prod_details->field_soap_api_docs[LANGUAGE_NONE] as $key => $value){
	$ref_soap .= '<li>'.l($value['entity']->label,"soap_apis/".$value['target_id'], array('attributes' => array('target' => '_blank'))).'</li>';
  }
  echo $ref_soap;
}