<?php
if ($main->isPost()) {
    $main->setCss('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/gruvbox-dark.min.css');
    $main->setScript('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js');
    $main->setScript($main->theme()->url() . '/assets/js/post.js');
}
