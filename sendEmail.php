
		<?php
				
			function fillIn($field) {
				if (isset($_POST[$field])) {
					echo ' value="' . $_POST[$field] . '"';
				}
			}
			
			function showform() {
				echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
				
				<fieldset>
					<div>	
						<label for="name"><strong>name</strong></label>
						<input type="text" id="name"';
						if (isset($_POST['name'])) {
							echo ' value="' . $_POST['name'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="email"><strong>email address</strong></label>
						<input type="text" id="email"';
						if (isset($_POST['email'])) {
							echo ' value="' . $_POST['email'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="phone">phone number</label>
						<input type="text" id="phone"';
						if (isset($_POST['phone'])) {
							echo ' value="' . $_POST['phone'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="company">company name</label>
						<input type="text" id="company"';
						if (isset($_POST['company'])) {
							echo ' value="' . $_POST['company'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="how">How did you hear about Leisl Schrader?</label>
						<input type="text" id="how"';
						if (isset($_POST['how'])) {
							echo ' value="' . $_POST['how'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="currentsite">URL of current website (if any)</label>
						<input type="text" id="currentsite"';
						if (isset($_POST['currentsite'])) {
							echo ' value="' . $_POST['currentsite'] . '"';
						}
						echo '>
					</div>
				
					<div>
						<label for="details"><strong>Tell me all about your role or project.</strong></label>
					</div>
					
					<div>
						<textarea id="details">';
						if (isset($_POST['details'])) {
							echo stripslashes($_POST['details']);
						}
						echo '</textarea>
					</div>
					
					<input type="submit" id="submit" value="send message" />
				</fieldset>
			</form>';
			}
				
				
				if (isset($_POST['submit']))	{
					
					
					if (empty($_POST['name']))	{
						$_POST['name'] = FALSE; echo '<h5>Please include your name.</h5>';
					}
					
					if (empty($_POST['email']))	{
						$_POST['email'] = FALSE; echo '<h5>Please include your email address.</h5>';
					}
					
					if (empty($_POST['details']))	{
						$_POST['details'] = FALSE; echo '<h5>Please include a description of your role or project.</h5>';
					}
					
					if ($_POST['name'] && $_POST['email'] && $_POST['details']) {
				
						$datesent = date("l, F j G:i");
						
						$details = stripslashes($_POST['details']);
						
						$type = implode(", ", $_POST['type']);
					
						$body = "Name:  {$_POST['name']}\n
						Email Address: {$_POST['email']}\n
						Phone Number: {$_POST['phone']}\n
						Company Name: {$_POST['company']}\n
						How did you hear about Leisl Schrader? {$_POST['how']}\n\n	
						
						current site:\n
						{$_POST['currentsite']}\n\n
						
						details:\n					
						{$details}\n\n
						
						Date sent: {$datesent}";
					
						$headers = "From: {$_POST['email']}";
					
						mail('mail@leislschrader.com', 'Web Development Inquiry', $body, $headers);
					
						echo "<p><strong>Thank you for your inquiry.</strong> Your message has been sent.</p>";
				
						}
						
					else	{
						showform();
					}
				}
				
				else {
					showform();
				}
				
				?>