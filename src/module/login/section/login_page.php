<div class="vertical-center">
	<section id="admin-login-container" class="clear-after">
		<div id="admin-login-logo-column" class="float-left">
			<span class="typer">|</span>
			<span>Quality content manager</span>
			<h1>quaco</h1>
		</div>
		<div id="login-form-column" class="float-right">
			<div class="box blue-bg shadow-medium float-right bg-detail-1">
				<form id="admin-login" class="default-layout clear-after">
					<div class="form-row-full-width border-light">
						<label for="field-username">
							<i class="la la-user"></i>
						</label>
						<div class="label-overflow"></div>
						<input id="field-username" type="text" name="cool_username" placeholder="Username.." />
					</div>
					<div class="form-row-full-width border-light">
						<label for="field-password">
							<i class="la la-lock"></i>
						</label>
						<div class="label-overflow"></div>
						<input id="field-password" type="password" name="scary_password" placeholder="Password.." />
					</div>
					<div class="submit-button icon-after border-light float-left"
                         onclick="load_xml('SIGN_IN', false, '#admin-login')">
						Sign in
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
