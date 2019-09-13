<form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
  <div class="input-group">
    <input type="search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Keresés', 'sage'); ?>" required>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('Ok', 'sage'); ?></button>
    </span>
  </div>
</form>
