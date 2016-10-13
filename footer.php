</div>
<!-- End Main -->


<!-- Sidebar -->
<?php 
	
	// Don't show the sidebar with attachments
	if(!is_attachment()){
		include (TEMPLATEPATH . '/sidebar.php'); 
	}
	
?>


<!-- Footer -->
<div id="footer">
	<p class="quiet">
		All content &copy; <?php echo date("Y"); ?> by <?php bloginfo('name'); ?>, <a href="http://www.cmu.edu">Carnegie Mellon University</a>
	</p>
</div>


</div><!-- container -->
</div><!-- container-inner -->


<?php wp_footer(); ?>

</body>
</html>
