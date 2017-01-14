<?php
/**
 * @package Structured Data using Json
 * @copyright Copyright 2008-2016 Zen4All
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version 1.0 - 25 December 2016
 */
?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "<?php echo STORE_NAME; ?>",
  "url": "<?php echo HTTP_SERVER . DIR_WS_CATALOG; ?>",
  "alternateName": "<?php echo HEADER_SALES_TEXT; ?>",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'index.php?main_page=advanced_search&keyword='; ?>{keyword}",
    "query-input": "required name=keyword"
  }
}
</script>