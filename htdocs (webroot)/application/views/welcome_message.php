	<!-- Begin page content -->
	<div class="container">
		<div class="page-header">
			<h1>Form which sends emails</h1>
			<?php echo validation_errors(); ?>
		</div>

		<div>
				<?php echo form_open_multipart('/'); ?>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<div class="form-group">
					<label for="email">Email address (multiple addresses should be seperated with a comma)</label>
					<input type="email" class="form-control" id="email" name="emailaddress" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
				</div>
				<div class="form-group">
					<label for="emailbody">Email body (HTML ALLOWED)</label>
					<textarea class="form-control" id="emailbody" rows="3" name="emailbody"><h1>Hello</h1>&nbsp;<h5>World!</h5></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">File input (images only jpg, gif or png format)</label>
					<input type="file" id="exampleInputFile" name="emailattachment">
					<p class="help-block">Press to send the email.</p>
				</div>
				<button type="submit" class="btn btn-default">Send email</button>
			</form>
		</div>
	</div>
