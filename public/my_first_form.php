<?php
  var_dump($_GET);
  var_dump($_POST);
?>


<html>
<head>
	<title>My First Form</title>
</head>
<body>

	<hr>

	<h2>User Login</h2>
	<form action="/my_first_form.php" method="POST">

		<label for="mailing_list">
			<input type="checkbox" id="mailing_list" name="mailing_list">
			<label for="mailing_list">Sign up for the mailing list.</label>
		</label>

		<p>What operating systems have you used?</p>
			<label><input type="checkbox" id="os1" name="os[]" value="linux"> Linux</label>
			<label><input type="checkbox" id="os2" name="os[]" value="osx"> OS X</label>
			<label><input type="checkbox" id="os3" name="os[]" value="windows"> Windows</label>
		<div>
			<p>Where are you from?</p>
			<label>
			    <input type="radio" id="q1a" name="q1" value="houston">
			    Houston
			</label>
			<label>
			    <input type="radio" id="q1b" name="q1" value="dallas">
			    Dallas
			</label>
			<label>
			    <input type="radio" id="q1c" name="q1" value="austin">
			    Austin
			</label>
			<label>
			    <input type="radio" id="q1d" name="q1" value="san antonio">
			    San Antonio
			</label> 
		</div>

	    <p>
	        <label for="username">Username</label>
	        <input id="username" name="username" placeholder="input your username" type="text" autofocus>
	    </p>
	    <p>
	        <label for="password">Password</label>
	        <input id="password" name="password" type="password">
	    </p>
	    <p>
	    	<label for="reason">Why do you want to program?</label>
	    	<input id="reason" name="reason" type="text">
	    </p>
	    <p>
	        <input type="submit">
	    </p>
	</form>

	<hr>

	<h2>Compose an Email</h2>
	<form action="/my_first_form.php" method="POST">
		<p>
			<label for="to">To</label>
			<input id="to" name="to" type="text">
		</p>
		<p>
			<label for="from">From</label>
			<input id="from" name="from" type="text">
		</p>
		<p>
			<label for="subject">Subject</label>
			<input id="subject" name="subject" type="text" value="Hello from Codeup!">
		</p>
		<p>
			<textarea id="body" name="body" type="text" rows="15" cols="70" placeholder="Type your email here..."></textarea>
		</p>
		<label for="to_sent_folder">
			<input type="checkbox" id="to_sent_folder" name="to_sent_folder" checked>
			<label for="to_sent_folder">Save a copy to your sent folder.</label>
		</label>
		<p>
	        <input type="submit">
	    </p>
	</form>

	<hr>

	<h2>Multiple Choice Test</h2>
	<form action="/my_first_form.php" method="POST">
		<div>
			<ol type="1">
				<li>
					<p>What is 2+2?</p>
					<ol type="a">
						<li>
							<label>
							    <input type="radio" id="q1a" name="q1" value="1">
							    1
							</label>
						</li>
						<li>
							<label>
							    <input type="radio" id="q1b" name="q1" value="2">
							    2
							</label>
						</li>
						<li>
						<label>
						    <input type="radio" id="q1c" name="q1" value="3">
						    3
						</label>
						</li>
						<li>
						<label>
						    <input type="radio" id="q1d" name="q1" value="4">
						    4
						</label>
						</li>
					</ol>
				</li>

				<li>
					<p>What is 2+3?</p>
					<ol type="a">
						<li>
							<label>
							    <input type="radio" id="q2a" name="q2" value="2">
							    2
							</label>
						</li>
						<li>
							<label>
							    <input type="radio" id="q2b" name="q2" value="3">
							    3
							</label>
						</li>
						<li>
						<label>
						    <input type="radio" id="q2c" name="q2" value="4">
						    4
						</label>
						</li>
						<li>
						<label>
						    <input type="radio" id="q2d" name="q2" value="5">
						    5
						</label>
						</li>
					</ol>
				</li>

				<li>
					<p>What are the correct answers?</p>
					<ol type="a">
						<li>
							<label><input type="checkbox" id="q3a" name="q3[]" value="Eenie">Eenie</label>
						</li>
						<li>
							<label><input type="checkbox" id="q3b" name="q3[]" value="Meenie">Meenie</label>
						</li>
						<li>
							<label><input type="checkbox" id="q3c" name="q3[]" value="Mienee">Mienee</label>
						</li>
						<li>
							<label><input type="checkbox" id="q3d" name="q3[]" value="Mo">Mo</label>
						</li>
					</ol>
				</li>
			</ol>
		</div>

		<p>
	        <input type="submit">
	    </p>
	</form>

	<hr>
	
	<h2>Select Testing</h2>
	<form action="/my_first_form.php" method="POST">
		<label for="human">Are you human?</label>
		<select id="human" name="human">
		    <option value="1">Yes</option>
		    <option value="0">No</option>
		</select>

		<p>
	        <input type="submit">
	    </p>
	</form>



	
	

</body>
</html>