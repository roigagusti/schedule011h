<?php
function findAirtable($table, $field, $value){
    $url = "https://api.airtable.com/v0/applVLtXI9jhnWeIB/".$table."?filterByFormula={".$field."}='".$value."'";
    $key = "Bearer keyVBM9rXFpJNDEIU";
    $header = ['Authorization: '.$key];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data;
}
function listAirtable($table){
    $url = "https://api.airtable.com/v0/applVLtXI9jhnWeIB/".$table;
    $key = "Bearer keyVBM9rXFpJNDEIU";
    $header = ['Authorization: '.$key];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data;
}
function timestampDate($date){
    $data = strtotime($date);
    return $data;
}

// Sort functions
function startSort($a, $b) {
    return strcmp($a->start, $b->start);
}
function pec_idSort($a, $b) {
    return strcmp($a->pec_id, $b->pec_id);
}
function squadSort($a, $b) {
    return strcmp($a->squad, $b->squad);
}
function iniciativaSort($a, $b) {
    return strcmp($a->iniciativa, $b->iniciativa);
}
function altnumSort($a, $b) {
    return strcmp($a->altnum, $b->altnum);
}
function dateSort($a, $b) {
    return strcmp($a->date, $b->date);
}
function nameSort($a, $b) {
    return strcmp($a->name, $b->name);
}
?>