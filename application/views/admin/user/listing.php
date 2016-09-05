<hmtl>
	<head>
		<title>Admin Dashboard</title>
	</head>
	<body>
		<?php
			$this->load->view('admin/styleHeader');
			$this->load->view('admin/header');
		?>
		<div class="container">
		<?php
			echo $pagination;
		?>
		</div>
		<?php
			$this->load->view('admin/jsFooter');
		?>
	</body>
</hmtl>