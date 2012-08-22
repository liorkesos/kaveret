<form method="get" class="searchform clearfix" action="<?php bloginfo('url'); ?>/">
 <input type="text" value="<?php if ('' == get_search_query()) { _e('חיפוש...', 'arras'); } else { the_search_query(); } ?>" name="s" class="s" onfocus="this.value=''" />
 <input type="submit" class="searchsubmit" value="<?php _e('חיפוש', 'arras') ?>" title="<?php printf( __('חיפוש %s', 'arras'), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
</form>
