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
  "@type": "ProfessionalService",
  "image": "<?php echo HTTP_SERVER . DIR_WS_CATALOG . $template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base, 'images') . '/' . HEADER_LOGO_IMAGE; ?>",
  "@id": "<?php echo HTTP_SERVER . DIR_WS_CATALOG; ?>",
  "name": "<?php echo STORE_NAME; ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Spaarnestraat 38",
    "addressLocality": "Amersfoort",
    "addressRegion": "UT",
    "postalCode": "3812HG",
    "addressCountry": "NL"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 52.1614620,
    "longitude": 5.3675910
  },
  "url": "<?php echo HTTP_SERVER . DIR_WS_CATALOG; ?>",
  "telephone": "<?php echo STORE_TELEPHONE_CUSTSERVICE; ?>",
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday"
      ],
      "opens": "9:00",
      "closes": "18:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Saturday",
      "opens": "10:00",
      "closes": "17:00"
    }
  ]
}
</script>