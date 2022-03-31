    <body class="bg-gradient-primary" id="<?php echo $bodyId ?>">

		<!-- Page Wrapper Begin -->
	  	<div id="wrapper">
			<?php 
			/**************************************
			 ** Para que muestre la fecha en local *
			**************************************/
			date_default_timezone_set('Europe/Madrid');

			?>
			<?php if ( isset($_SESSION["user_id"]) ) { ?>
			
			<?php } ?>
			
			<?php
			
				if ( isset($_SESSION["message"]) ) {

					$claseMensaje = "";
					
					if ( strpos($_SESSION["message"], "Error:") !== false )
						$claseMensaje = "alert alert-danger";
						
					if ( strpos($_SESSION["message"], "Info:") !== false )
						$claseMensaje = "alert alert-info";
			
			?>    		
			<!-- Mensajes de error o informativos -->
			<div id="message" class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_SESSION["message"] ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
			
					unset( $_SESSION["message"] );
				
				}
				
			?>