
	<!--start contact section -->
	<section class="contact_form_area contact_form_other_style section_padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="contact-details">
						<div class="hero-section-title">
							<!-- <i class="icon-snowflake"></i> -->
                            <img src="Modules/Assets/images/favicon.png">
							<h3>Log-In</h3>
                            <?php
                                if(session()->getFlashdata('login'))
                                {
                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                    echo session()->getFlashdata('login');
                                    // session()->destory();
                                    echo "</div>";
                                }
                                if(session()->getFlashData('error'))
                                {
                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                    echo session()->getFlashdata('error');
                                    // session()->destory();
                                    echo "</div>";
                                }
                            ?>

						</div>
                        <form method="post">
                        <div>
                            <input type="email" name="email" class="input_mr input_half_width gray_bg" placeholder="Email">
                        </div>
                        <div>
                            <input type="password" name="password" class="input_mr input_half_width gray_bg" placeholder="Password">
                        </div>
							<button class="btn-orange" type="submit" value="Request a Quote Now">Login</button>
                            <div><a href="user_forgot">Forgot Password?</a></div>
                            <div><a href="user_register">Not Registered?</a></div>
                            <?php $validation = \Config\Services::validation(); ?>
                            <div class="text-danger">
                            <?= $validation->listErrors() ?>
                            </div>
						</form>
					</div><!--end .contact-details-->
				</div><!--end .col-md-8-->
            </div><!--end .row-->
        </div><!--end .container-->
	</section><!--end .contact_form_area-->
	<!--end contact section -->