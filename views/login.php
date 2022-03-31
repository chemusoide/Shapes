<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "login";
        $pageTitle = "Autentication page";

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");

?>
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
							<div class="col-lg-6 d-none d-lg-block pt-3"><img src="img/shapes-logo.jpg" alt="Shapes-logo" width="500"></div>
								<div class="col-lg-6">
									<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4"><?php echo $pageTitle ?></h1>
										</div>
								
										<div id="formLogin">
										
											<form class="ficha" method="post" action="index.php?controller=user&amp;option=login" onsubmit="return validarForm(this)">
												
												<fieldset>
													<p>
														<div class="form-group">
															<input type="text" name="user_name" id="user_name" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter your user name..." />
														</div>
													</p>
													<p>
														<div class="form-group">
															<input type="password" name="user_password" id="user_password"  class="form-control form-control-user" placeholder="Enter your password..."/>
														</div>
													</p>
													<p>
														<input type="submit" value="Enter" class="btn btn-primary btn-user btn-block"/>
													</p>
												</fieldset>

											</form>
										
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
<?php
        
        require_once(SKEL_DIR . "/bodyEnd.php");
        
        require_once(SKEL_DIR . "/pie.php");

    }

?>