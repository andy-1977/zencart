<?php
/**
 * Page Template - Featured Categories listing
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2022 Apr 30 New in v1.5.8-alpha $
 * based on tpl_brands_default
 */
?>
<div class="centerColumn" id="featuredCategoryDefault">

<h1 id="featuredCateoryDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php
/**
 * display the category sort dropdown
 */

        $list_box_contents = [];
        $row = 0;
        $col = 0;
        foreach ($listing as $record) {
            $lc_text = '<a href="' . zen_href_link(FILENAME_DEFAULT, 'categories_id=' . $record['categories_id']) . '">';
            $lc_text .= '<a href="' . zen_href_link(FILENAME_DEFAULT, 'cPath='.  zen_get_generated_category_path_rev($record['categories_id'])). '">'
        . zen_image(DIR_WS_IMAGES . $record['categories_image'], $record['categories_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
            $lc_text .= '<div class="categoryName">' . $record['categories_name'] . '</div>';
            $lc_text .= '</a>';

            $list_box_contents[$row][$col] = [
                'params' => 'class="centerBoxContentsFeatured centeredContent back col130"',
                'text' => $lc_text,
            ];

            $col++;
            if ($col >= SHOW_PRODUCT_INFO_COLUMNS_FEATURED_CATEGORIES) {
                $col = 0;
                $row++;
            }
        }
        $title = '';
require $template->get_template_dir('tpl_columnar_display.php', DIR_WS_TEMPLATE, $current_page_base, 'common') . '/tpl_columnar_display.php';
?>
</div>
