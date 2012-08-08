<p><?= lang('about.gender') ?></p>
<p><?= $thislang; ?></p>
<p><?= anchor($this->lang->switch_uri('fr'), 'Display French'); ?></p>
<p><?= anchor($this->lang->switch_uri('en'), 'Display English'); ?></p>
<p><?= anchor('music', 'Shania Twain') ?></p>
<p>
    <?php
    echo site_url('about/my_work');
    echo "<br/>";
// http://mywebsite.com/en/about/my_work


    echo site_url('css/styles.css');
    ?>
</p>