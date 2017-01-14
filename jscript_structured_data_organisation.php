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
  "@type": "Organization",
  "url": "<?php echo HTTP_SERVER . DIR_WS_CATALOG; ?>",
  "logo": "<?php echo HTTP_SERVER . DIR_WS_CATALOG . $template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base, 'images') . '/' . HEADER_LOGO_IMAGE; ?>",
  "contactPoint" : [{
    "@type" : "ContactPoint",
    "telephone" : "<?php echo STORE_TELEPHONE_CUSTSERVICE; ?>",
    "contactType" : "customer service",
    "availableLanguage" : ["Dutch", "English"]
  }],
  "sameAs" : [
    "https://nl.linkedin.com/in/erik-kerkhoven-46913020",
    "https://twitter.com/zen4all_nl"
  ]
}
</script>
