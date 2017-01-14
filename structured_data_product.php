<?php
/**
 * @package Structured Data using Json
 * @copyright Copyright 2008-2016 Zen4All
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version 1.0 - 25 December 2016
 */

// defines
define('STRUCTURED_DATA_CONDITION', 'NewCondition'); // DamagedCondition, NewCondition, RefurbishedCondition, UsedCondition
define('STRUCTURED_DATA_STOCK', 'InStock'); // Discontinued, InStock, InStoreOnly, LimitedAvailability, OnlineOnly, OutOfStock, PreOrder, PreSale, SoldOut

$reviewQuery = "SELECT r.reviews_id, r.customers_name, r.reviews_rating, r.date_added, rd.reviews_text
                FROM " . TABLE_REVIEWS . " r
                LEFT JOIN " . TABLE_REVIEWS_DESCRIPTION . " rd ON rd.reviews_id = r.reviews_id
                WHERE products_id = " . (int)$product_info->fields['products_id'];
$review = $db->Execute($reviewQuery);
while (!$review->EOF) {
  $reviewArray[] = array(
    'reviewId' => $review->fields['reviews_id'],
    'customerName' => $review->fields['customers_name'],
    'reviewRating' => $review->fields['reviews_rating'],
    'dateAdded' => $review->fields['date_added'],
    'reviewText' => $review->fields['reviews_text'],
    );
  $review->MoveNext();
}
$ratingSum = array();

if ($reviewArray != '') {
  foreach ($reviewArray as $value) {
    $ratingSum[] = $value['reviewRating'];
  }
} else {
  $ratingSum = 0;
}

$reviewCount = sizeof($reviewArray);
if ($reviewCount != 0) {
  $ratingValue = array_sum($ratingSum) / $reviewCount;
} else {
  $ratingValue = 0;
}

$reviewHighestRatingQuery = "SELECT reviews_id, reviews_rating
                             FROM " . TABLE_REVIEWS . "
                             WHERE products_id = " . (int)$product_info->fields['products_id'] . "
                             ORDER BY reviews_rating DESC LIMIT 1";
$reviewHighestRating = $db->Execute($reviewHighestRatingQuery);

$reviewLowestRatingQuery = "SELECT reviews_id, reviews_rating
                             FROM " . TABLE_REVIEWS . "
                             WHERE products_id = " . (int)$product_info->fields['products_id'] . "
                             ORDER BY reviews_rating ASC LIMIT 1";
$reviewLowestRating = $db->Execute($reviewLowestRatingQuery);
?>
<?php $i=0 ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?php echo $products_name; ?>",
  "image": "<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ) . '/' . DIR_WS_IMAGES . $product_info->fields['products_image']; ?>",
  "description": "<?php echo htmlspecialchars(zen_clean_html(stripslashes(zen_get_products_description((int)$product_info->fields['products_id'], $_SESSION['languages_id']))), ENT_QUOTES); ?>",
  "mpn": "<?php echo $products_model; ?>",
  "brand": {
    "@type": "Thing",
    "name": "<?php echo $manufacturers_name; ?>"
  },
<?php if($review->RecordCount() > 0) { ?>
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $ratingValue; ?>",
    "bestRating" : "<?php echo $reviewHighestRating->fields['reviews_rating'] ?>",
    "worstRating" : "<?php echo $reviewLowestRating->fields['reviews_rating'] ?>",
    "reviewCount": "<?php echo $reviewCount; ?>"
  },
<?php } ?>
  "offers": {
    "@type": "Offer",
    "priceCurrency": "<?php echo $_SESSION['currency']; ?>",
    "price": "<?php echo $products_price = (round(zen_get_products_base_price($product_info->fields['products_id']),2)); ?>",
    "priceValidUntil": "2020-11-05",
    "itemCondition": "http://schema.org/<?php echo STRUCTURED_DATA_CONDITION; ?>",
    "availability": "http://schema.org/<?php echo STRUCTURED_DATA_STOCK; ?>",
    "seller": {
      "@type": "Organization",
      "name": "<?php echo STORE_NAME; ?>"
    }
  },
<?php if($review->RecordCount() > 0) { ?>
  "review" : [
  <?php for ($i = 0, $n = sizeof($reviewArray); $i<$n; $i ++) {?>
  {
    "@type" : "Review",
    "author" : {
      "@type" : "Person",
      "name" : "<?php echo $reviewArray[$i]['customerName']; ?>"
    },
    "reviewBody" : "<?php echo $reviewArray[$i]['reviewText']; ?>",
    "datePublished" : "<?php echo zen_date_short($reviewArray[$i]['dateAdded']); ?>",
    "reviewRating" : {
      "@type" : "Rating",
      "ratingValue" : "<?php echo $ratingValue; ?>",
      "bestRating" : "<?php echo $reviewHighestRating->fields['reviews_rating'] ?>",
      "worstRating" : "<?php echo $reviewLowestRating->fields['reviews_rating'] ?>"
    }
<?php if ($i+1 != $n) { ?>
  },
  <?php } else { ?>
  }
  <?php } ?>
  <?php } ?>
  ]
<?php } ?>
}
</script>