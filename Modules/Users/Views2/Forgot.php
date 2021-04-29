
	<!--start contact section -->
	<section class="contact_form_area contact_form_other_style section_padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="contact-details">
						<div class="hero-section-title">
							<!-- <i class="icon-snowflake"></i> -->
                            <img src="Modules/Assets/images/favicon.png">
							<h3>Forgot Password</h3>
                            <div class="text-danger">
                                <?php $validation = \Config\Services::validation(); 
                                    echo $validation->listErrors()
                                ?>
                            </div>
                            <?php
                                if(session()->getFlashdata('forgot'))
                                {
                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                    echo session()->getFlashdata('forgot');
                                    // session()->destory();
                                    echo "</div>";
                                }
                            ?>

						</div>
                        <form method="post">
                        <div>
                            <input type="email" name="email" class="input_mr input_half_width gray_bg" placeholder="Email">
                        </div>
							<button class="btn-orange" type="submit" value="Request a Quote Now">Remind Me</button>
                        </div>
                            <div>
                                <a href="user_register">Not Registered?</a><br>
                                <a href="user_login">Alread Registered?</a>
                            </div>
                            
                            
						</form>
					</div><!--end .contact-details-->
				</div><!--end .col-md-8-->
            </div><!--end .row-->
        </div><!--end .container-->
	</section><!--end .contact_form_area-->
	<!--end contact section -->