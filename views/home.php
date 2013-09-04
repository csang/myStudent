    <form id='login'name="login" action="index.php?controllers=login&action=login" method="post" enctype="mulitipart/form-data" >
    	<fieldset>
        	<h1>Teacher Login</h1>
            <label for="firstname">First Name</label>
               <input type="text"name="firstname" id="loginFName" title-"Enter First Name"/>
           <label for="lastname">Last Name</label>
               <input type="text"name="lastname" id="loginLName"/>
            <label for="pass">Password</label>
                 <input type="password" name="pass" id="loginPass"/>
                 <input type="submit" value="Submit"/>
   		</fieldset>
   </form>
	<form id='studentLogin'name="login" action="index.php?controllers=login&action=studentLogin" method="post" enctype="mulitipart/form-data">
    	<h1>Student Login</h1>
   		<fieldset>
            <label for="firstname">First Name</label>
               <input type="text"name="firstname" id="loginFName"/>
           <label for="lastname">Last Name</label>
               <input type="text"name="lastname" id="loginLName"/>
            <label for="email">Email</label>
                 <input type="text" name="email" id="loginEmail"/>
                 <input type="submit" value="Submit"/>
        </fieldset>
    </form>
    <form id='register'name="register" action="index.php?controllers=login&action=register" method="post" enctype="mulitipart/form-data">
   		<fieldset>
        	<img src="img/registerNow.png"/>
            <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="registerFName"/>
            <label for="lastname">Last Name</label>
                <input type="text" name="lastname"/>
            <label for="pass">Password</label>
                <input type="password" name="pass" id="registerPass"/>
            <img src="cap.png" /><br/>
            <label for="captcha">Enter Captcha</label><br />
           		<input type="input"text name="captcha" id="captcha"/><br />
                <input type="submit" value="Register"/>
   		</fieldset>
   </form>