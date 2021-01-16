
<!DOCTYPE html>
<html>
<head>

  <title>Formulaire d'authentification</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_elter.css">
	<script src="js/jquery_min.js"></script>
	
		<link rel="stylesheet" type="text/css" href="css/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/css/demo-login.css" />
		<link rel="stylesheet" type="text/css" href="css/css/set1.css" />
		
</head>

<body  background="images/wl.jpg" >



<div class="login-cont">
	<div class="login-form">
		<div class="t">
			<div class="l">
				<img src="images/env.png" ></img>
			</div>
		</div>
		
		<div class="titre">
				<h4>Welcome back!</h4><br>
			</div>
			<div class="par" >You can sign in to Esip Project with your existing Esip account</div>
			
				<div class="square-log">
				
					<form action="login.php" method="post" >
							<span class="input input--juro"> <!--- modify in set1.css - juro model-->
								<input name="login" class="input__field input__field--juro" type="text" id="input-28" />
								<label  class="input__label input__label--juro" for="input-28">
									<span    class="input__label-content input__label-content--juro">User Name</span>
								</label>
							</span>
							<span class="input input--juro">
								<input name="pwd" class="input__field input__field--juro" type="password" id="input-29" />
								<label   class="input__label input__label--juro" for="input-29">
									<span    class="input__label-content input__label-content--juro">Password</span>
								</label>
							</span>
						<div class="b">
							<input class="button button2" type="submit" value="Sign In"><br>
 						</div>
					</form>
					
					<!-- 
					
					<form  class="login" action="login.php" method="post">
					Votre login : <input type="text" name="login">
					<br />
					Votre mot de passé : <input type="password" name="pwd"><br/>
					<input type="submit" value="Connexion"><br>
					</form>
					
					
					-->
					
				</div>

			</div>
	</div>

			<div class="login-footer"> 
				<div class="fott-div">
				<a href="#"> Terms & Conditions </a> | <a href="#">  License  </a> |<a href="#">  Help  </a> 
				<p>© 2017 Esip Project. Trademarks and brands are the property of their respective owners.</p>
				</div> 
			</div>

	 <script src="js/classie.js"></script>
	 <script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
		
</body>
</html>