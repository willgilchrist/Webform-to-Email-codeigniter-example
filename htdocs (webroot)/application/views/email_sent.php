	<!-- Begin page content -->
	<div class="container">
		<div class="page-header">
			<p>Email sent! <a href="/">Send another</a></p>
		</div>

		<div>
				<p><h3><u>Output</u></h3></p>
				To: <?php echo $emailaddress; ?><br />
				Subject: <?php echo $subject; ?><br />
				Email file path: <?php echo $upload_data["full_path"]; ?><br />
				Email body:
				<div><?php echo $emailbody; ?></div>
				<br />
		</div>
	</div>
