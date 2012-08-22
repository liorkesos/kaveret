<?php
/**
 * @file views-view-grid.tpl.php
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 * - $class contains the class of the table.
 * - $attributes contains other attributes for the table.
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="<?php print $class; ?>"<?php print $attributes; ?>>
  <div>
    <?php foreach ($rows as $row_number => $columns): ?>
      <?php
        $row_class = 'row-' . ($row_number + 1);
        if ($row_number == 0) {
          $row_class .= ' row-first';
        }
        if (count($rows) == ($row_number + 1)) {
          $row_class .= ' row-last';
        }
      ?>
      <div class="<?php print $row_class; ?>">
      
        <?php foreach ($columns as $column_number => $item): ?>
          <?php
            $col_class = 'colum-'. ($column_number + 1);
          if ($column_number == 0) {
            $col_class .= ' colum-first';
          }
         if (count($columns) == ($column_number + 1)) {
            $col_class .= ' colum-last';
          }
        ?>
          <div class="<?php print $column_classes[$row_number][$column_number]. " " .$col_class ;?> span-8 ">
            <?php print $item; ?>
          </div>
        <?php endforeach; ?>
        
        
      </div>
    <?php endforeach; ?>
  </div>
</div>