<?php
// echo '<pre>';
// print_r($block);
// echo '</pre>';

// Create class attribute allowing for custom "className"
$class_name = 'ish-team-members-wrapper wp-block-group alignfull  is-layout-constrained';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Add any ACF generated classes
$margin_top = get_field('remove_margin_top');
if ($margin_top) {
  $class_name .= ' margin-block-start-0';
}

// Support block "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Look for wp block styles and add them inline
$style = '';

?>


<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style) ?>">




  <?php
  $team_members = get_field('team_members');
  if ($team_members) : ?>
    <div class="ish-team-members ">
      <?php foreach ($team_members as $team_member) :

        $title = get_the_title($team_member->ID);
        $role = get_field('role', $team_member->ID);
        $description = get_field('description', $team_member->ID);
        $head_shot = get_field('head_shot', $team_member->ID);
      ?>

        <div class="ish-team-member">





          <div class="ish-team-member__card">


            <div class="ish-team-member__card-head-shot">
              <?php echo wp_get_attachment_image($head_shot, 'large') ?>
            </div>

            <div class="ish-team-member__card-text">
              <small><?php echo  $description ?></small>
            </div>




          </div>

          <div class="ish-team-member__title-role">
            <div class="ish-team-member__title">
              <h3><?php echo  $title ?></h3>
            </div>

            <div class="ish-team-member__role">
              <h4><?php echo  $role ?></h4>
            </div>

          </div>


        </div>


      <?php endforeach; ?>
    </div>
  <?php endif; ?>


</div>