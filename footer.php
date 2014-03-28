<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package charlina
 */
?>

    </div><!-- #main -->

</div><!-- #page -->

<footer id="colophon" role="contentinfo">
    <div id="copyright">
		&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>
        <a href="http://meynedesign.com" rel="nofollow">Theme by Meyne Design</a>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?> 
</body>
</html>