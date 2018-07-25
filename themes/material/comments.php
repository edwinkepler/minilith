<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = "<?php echo $main->appUrl(); ?>";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = <?php echo $main->post()->id(); ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://yourname.disqus.com/embed.js'; // Change this line!
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>