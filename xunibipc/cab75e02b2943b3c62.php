<?php
header("Content-Type: text/html; charset=UTF-8");
/* echo "success";
die(); */
error_reporting(0);
date_default_timezone_set('PRC');

$domain = "www.26bi.com";//填写网站域名
$queues = array(
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/dnc_cny',
	'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/gooc_cny',
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/zet_cny',
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/ltc_cny',
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/doge_cny',
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/etc_cny',
    'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/eth_cny',
	'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/btc_cny',
	'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/plc_cny',
	'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/blk_cny',
	'home/Queue9ce2472db8c3b3d94511365004ce8468/upTrade_zhisucom_8a201aa602cd9448/market/lyc_cny',
);
for ($i = 0; $i < count($queues); $i++) {
    http_get($domain . "/" . $queues[$i]);
}
echo "successautotrade";

file_put_contents(dirname(__FILE__)."\autotradetime.html", date("Y-m-d H:i:s",time()));

function http_get($url)
{
    $oCurl = curl_init();
    if (stripos($url, "https://") !== FALSE) {
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
    }
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    $sContent = curl_exec($oCurl);
    $aStatus = curl_getinfo($oCurl);
    curl_close($oCurl);
    if (intval($aStatus["http_code"]) == 200) {
        return true;
    } else {
        return false;
    }
}


?>