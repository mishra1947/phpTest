<script type='text/template' id='signupTemplate'>

        <!--BEGIN #signup-form -->
        <div id="signup-form">

            <!--BEGIN #subscribe-inner -->
            <div id="signup-inner">

                <div class="clearfix" id="header">

                    <img id="signup-icon" src="images/signup.png" alt="" />

                    <h1>User Sign Up Form</h1>
                </div>
                <form id="frm">
                    <p>
                        <label for="firstname">First Name <span class="error">*</span></label>
                        <input id="fname" type="text" name="fname" value=""/>
                        <div id="fname_error"></div>
                    </p>

                    <p>
                        <label for="lastname">Last Name <span class="error">*</span></label>
                        <input id="lname" type="text" name="lname" value="" />
                        <div id="lname_error"></div>
                    </p>

                    <p>
                        <label for="username">Username <span class="error">*</span></label>
                        <input id="uname" type="text" name="uname" value="" />
                        <div id="uname_error"></div>
                    </p>

                    <p>

                        <label for="email">Email <span class="error">*</span></label>
                        <input id="email" type="text" name="email" value=""/>
                        <div id="email_error"></div>
                    </p>

                    <p>
                        <label for="password">Password <span class="error">*</span></label>
                        <input id="password" type="password" name="password" value=""/>
                        <div id="password_error"></div>
                    </p>

                    <p>
                        <label for="confirm_password">Confirm-Password <span class="error">*</span></label>
                        <input id="c_password" type="password" name="c_password" maxlength="08" value=""/>
                        <div id="error_Cpassword"></div>
                    </p>

                    <p>

                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" maxlength="10" value="" />
                        <div id="phone_error"></div>
                    </p>
                    <p>
                        <label for="gender">Gender <span class="error">*</span></label>
                        <span><input type="radio" name="gender" value="male" id="gender" >Male</span>
                        <span><input type="radio" name="gender" value="female" id="gender">Female</span>
                        <div id="error_Gender"></div>
                    </p>

                    <p>
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="05" rows="05" maxlength="200"></textarea>
                        <sapn id="counter" style="font-size: smaller;color: #437182;"></span>
                    </p>

                    <p>

                       
                <input type='submit' value='Submit' class='button' id="submit"/>
                        <a href="http://bb-login.com/#signin">Already registered please sign in</a>
                    </p>

                </form>

                <div id="required">
                    <p><span class="error">*</span> <b>Required Fields</b><br/>
                        NOTE: You must activate your account after sign up</p>
                </div>


            </div>

            <!--END #signup-inner -->
        </div>

        <!--END #signup-form -->   
        </div>


</script>