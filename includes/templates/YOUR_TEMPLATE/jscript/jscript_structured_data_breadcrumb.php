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
  "@type": "BreadcrumbList",
  "itemListElement": [
<?php
foreach ($breadcrumb as $key => $value) {
  for ($i = 1, $n = sizeof($value); $i<$n; $i ++){
?>
  {
    "@type": "ListItem",
    "position": <?php echo $i; ?>,
    "item": {
      "@id": "<?php echo $value[$i]['link']; ?>",
      "name": "<?php echo $value[$i]['title']; ?>"
    }
<?php
    if ($i+1 != $n) {
?>
  },
<?php
    } else {
?>
  }
<?php
    }
  }
}
?>]
}
</script>