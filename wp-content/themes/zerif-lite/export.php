<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 28-Sep-18
 * Time: 23:11
 */
get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->
<?php zerif_after_header_trigger(); ?>
<?php
$xml_data= file_get_contents('https://export.ticketon.kz/schedule');
echo $xml_data;
?>