</div>
<!-- End Main -->


<!-- Sidebar -->
<?php 
	
	// Don't show the sidebar with attachments
	if(!is_attachment()){
		include (TEMPLATEPATH . '/sidebar.php'); 
	}
	
?>

</div><!-- .row -->


<!-- Footer -->
<div id="footer" class="row">
	<hr>
	<p class="subheader text-center">
		All content &copy; <?php echo date("Y"); ?> by <?php bloginfo('name'); ?>, School of Architecture, <a href="http://www.cmu.edu">Carnegie Mellon University</a>
	</p>
</div>

</div><!-- .row -->

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/script.js"></script>

</body>
</html>
