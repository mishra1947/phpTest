<script type='text/template' id='signinTemplate'>
<div id="signup-form">
    <div id="signup-inner">
        <div class="clearfix" id="header">
            <img id="signup-icon" src="images/signup.png" alt=""/>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            <h1>User Sign In Form</h1>
        </div>

        <form>
            <p>
                <label for="email">Email <span style="color: red">*</span></label>
                <input id="logInEmail" type="text" name="email" value=""/>
            <div id="email_error" style="color: red"></div>
            </p>
            <p>
                <label for="password">Password <span style="color: red">*</span></label>
                <input id="logInPassword" type="password" name="password" value=""/>
            <div id="logInPassword_error" style="color: red"></div>
            <input type="checkbox" id="check" name="remember" value="1" style="width: 3%"/><b>Remember me</b>
            </p>

            <p>
                <button id="loginSubmit" type="button" >Submit</button>
                <a href="javascript:void(0)" id='btn-forget-password'>Forget password</a> | 
                <a href="http://bb-login.com/#signUp">New user register here</a>
            </p>
             <div id="signup-first"></div>

        </form>
    </div>
</div>
</script>
 
<script type='text/template' id='forgetPasswordTemplate'>
    <div id="signup-form">
     <div class="clearfix" id="header">
     <h1>Update Password</h1>
     </div>
 <form>
    <p>
        <label for="email">Email</label>
        <input id="logInEmail" type="text" name="email" value=""/>
        <div id="email_error"></div>
</p>
<p>
    <label for="password">New Password</label>
    <input id="newLogInPassword" type="password" name="newLogInPassword" value=""/>
    <div id="newLogInPassword_error"></div>
</p>

<p>
    <label for="password">Confirm New Password</label>
    <input id="cNewPassword" type="password" name="cNewPassword" value=""/>
    <div id="cNewPassword_error"></div>
</p>

<p>
    <button id="forgetPasswordSubmit" type="button" >Submit</button>
</p>

</form>
</div>
</script>
