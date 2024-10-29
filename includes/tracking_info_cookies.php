<?php

$posted_data['entryUrl']         = (isset($_COOKIE['_entryUrl']) ? esc_url($_COOKIE['_entryUrl']) : "");
$posted_data['referrerUrl']      = (isset($_COOKIE['_referringURL']) ? esc_url($_COOKIE['_referringURL']) : "");
$posted_data['refAffiliateCode'] = (isset($_COOKIE['refAffiliateCode']) ? esc_url( $_COOKIE['refAffiliateCode']) : "");