
	<!--start contact section -->
	<section class="contact_form_area contact_form_other_style section_padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="contact-details">
						<div class="hero-section-title">
							<!-- <i class="icon-snowflake"></i> -->
                            <img src="Modules/Assets/images/favicon.png">
							<h3>Edit Your Information</h3>
                            <?php
                                if(session()->getFlashdata('profile'))
                                {
                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                    echo session()->getFlashdata('profile');
                                    session()->remove('profile');
                                    echo "</div>";
                                }
                            ?>

						</div>
                        <form method="post">
                        <div class="form-group">
							<input type="text" name="first_name" class="input_mr input_half_width gray_bg" placeholder="First Name" class='form-control' value="<?= $data['first_name']; ?>">
                        </div>
                        <div>
                            <input type="text" name="last_name" class="input_mr input_half_width gray_bg" placeholder="Last Name" value="<?= $data['last_name']; ?>">
                        </div>
                        <div>
                            <input type="email" name="email" class="input_mr input_half_width gray_bg" placeholder="Email" disabled value="<?= $data['email']; ?>">
                        </div>
                        <div>
                            <input type="password" name="current_password" class="input_mr input_half_width gray_bg" placeholder="Current Password">
                        </div>
                        <div>
                            <input type="password" name="new_password" class="input_mr input_half_width gray_bg" placeholder="New Password">
                        </div>
                        <div>
                            <input type="phone" name="phone" class="input_mr input_half_width gray_bg" placeholder="Phone: 999-888-7777" value="<?= $data['phone']; ?>">
                        </div>
							<button class="btn-orange" type="submit" value="Request a Quote Now">Update</button>
                            <?php $validation = \Config\Services::validation(); ?>
                            <div class="text-danger">
                            <?= $validation->listErrors() ?>
                            <?= session()->getFlashdata('error'); ?>
                            </div>
						</form>
					</div><!--end .contact-details-->
				</div><!--end .col-md-8-->
            </div><!--end .row-->
        </div><!--end .container-->
	</section><!--end .contact_form_area-->
	<!--end contact section -->