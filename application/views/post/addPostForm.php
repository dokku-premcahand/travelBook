<html>
	<head>
		<title>Add Post</title>
		<?php $this->load->view('styleHeader'); ?>
		<link href="<?php echo base_url('public/css/clean-blog.min.css'); ?>" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
			$this->load->view('header');
        	$this->load->view('subHeader');
		?>

	    <!-- Main Content -->
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	                <form class="form-horizontal" id="addPost" action="" method="POST"  enctype="multipart/form-data">
	                	<div class="form-group">
	                		<label class="col-lg-3">
	                			Experience : <br/><span style="font-size: 12px;color: #969696;">(in your beautiful words)</span>
	                		</label>
	                		<div class="col-lg-9">
	                			<textarea class="form-control" rows="10" id="experienceText"></textarea>
	                		</div>
	                	</div>
	                	<div class="form-group">
	                		<label class="col-lg-3">
	                			Place as you saw :
	                		</label>
	                		<div class="col-lg-9">
	                			
	                		</div>
	                	</div>
	                </form>
	            </div>
	        </div>
	    </div>

	    <?php $this->load->view('footer'); ?>
	    <?php $this->load->view('jsFooter'); ?>
	    <script type="text/javascript" src="<?php echo base_url('public/js/ckeditor/ckeditor.js'); ?>"></script>
	    <script type="text/javascript">
	    	CKEDITOR.replace('experienceText',{
	    		removeButtons: 'Source'
	    	});
	    </script>
	</body>
</html>