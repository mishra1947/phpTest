<script type='text/template' id='dashboardTemplate'>
<div id="dashboard">
            <div id="signup-inner">
                <div class="clearfix" id="header">
                    <div id=header></div>
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="javascript:void(0);" id="btn-dashboard-home">Home</a></li>
                        <li><a href="javascript:void(0);" id="btn-view-profile"> View Profile</a></li>
                        <ul><li><a href="javascript:void(0);" id="btn-edit-profile">Edit Profile</a></li>
                            <li><a href="uploadprofilepicture.php">Upload Profile Picture</a></li>
                            <li><a href="javascript:void(0);" id="btn-setting">Settings</a></li>
                        </ul>
                    </ul>
                </div>
                <div style="padding-top: 10px; padding-bottom: 30px">
                <div  id="dashboard-container">
                </div>
                <div id='upload-instruction'></div>
                </div>
                <div>
                  <div id="footer"></div>  
                </div>
            </div>
        </div>
</script>
<script type='text/template' id='headerTemplate'>
<header>
    <a href="http://bb-login.com/#dashboard"><img id="dashboard-icon" src="../images/homePage.jpg" alt=""/></a>   
    <h2><div>
           <span><img id="profile_icon" src="" alt=""/></span>
            <span>Username:
                <%= session_Username %>
            </span>    
            <a href="php/logout.php" id="logout">Log Out</a>
        </div></h2>
</header>
</script>

<script type='text/template' id='footerTemplate'>
        <footer>
<p style="font: 10px/20px Helvetica, Arial, sans-serif">Copyright @ <?php echo date("d/m/y") ?></p>
        </footer>
</script>

<script type="text/template" id="dashboardHomeTemplate">
    <div> <label><b>Special Instructions:</b></label></div>
                    <textarea name="user_instruction" id="user_instruction" cols="05" rows="05" maxlength="200"></textarea>
   <div> <input type='button' value='Post' id="submit_user_instructions"></div>
</script>
<script type="text/template" id="viewProfileTemplate">
<div id='view-profile'>
    <p>
        <label for="firstname">First Name: <span style="font-weight:normal"></span><%= firstName %> </label>

    </p>

    <p>
        <label for="lastname">Last Name:<span style="font-weight:normal"></span> <%= lastName %> </label>

    </p>

    <p>
        <label for="username">Username: <span style="font-weight:normal"></span><%= userName %></label>

    </p>

    <p>

        <label for="email">Email:<span style="font-weight:normal"></span><%= email %> </label>

    </p>
    <p>

        <label for="phone">Phone: <span style="font-weight:normal"></span><%= phoneNo %></label>

    </p>

    <p>
        <label for="gender">Gender:<span style="font-weight:normal"></span><%= gender %></label>

    </p>

    <p>
        <label for="address">Address: <span style="font-weight:normal"></span><%= address %></label>

    </p>

</div> 
</script>

<script type="text/template" id="editProfileTemplate">
<div id="edit-profile">
 <form id="frm">
    <p>
        <label for="firstname">First Name:  </label>
        <input id="fname" type="text" name="fname" value="<%= firstName %>" class="dashboard-input"/>
    </p>

    <p>
        <label for="lastname">Last Name: </label>
        <input id="lname" type="text" name="lname" value="<%= lastName %>"" class="dashboard-input"/>
    </p>

    <p>
        <label for="username">Username: </label>
        <input id="uname" type="text" name="uname" value="<%= userName %>"" class="dashboard-input"/>
    </p>

    <p>

        <label for="email">Email: </label>
        <input id="email" type="text" name="email" value="<%= email %>"" class="dashboard-input"/>
    </p>

    <p>

        <label for="phone">Phone: </label>
        <input id="phone" type="text" name="phone" maxlength="10" value="<%= phoneNo %>" class="dashboard-input" />
    </p>
    <p>
        <label for="address">Address: </label>
        <textarea name="address" id="address" cols="05" rows="05" maxlength="200" class="dashboard-input"><%= address %></textarea>
    <div id="counter" style="font-size: smaller;color: #437182;"></div>
    <!--</p>-->

    <p>
        <input type='button' value='Update' class='button' id="update-button"/>
    </p>
      <div id="update-successful"></div> 
    </form>
</div>
</script>

<script type="text/template" id="changePwdTemplate">
    <form id="frm">
    <p>
        <label>Old Password: </label>
        <input type="password" name="old-password" value="" id="old-password" class="dashboard-input"/>
    </p>
    <p>
        <label>New Password: </label>
        <input type="password" name="new-password" value="" id="new-password" class="dashboard-input"/>
    </p>
    <p>
        <label>Confirm New Password: </label>
        <input type="password" name="cnew-password" value="" id="cnew-password" class="dashboard-input"/>
    </p>
    <p>
        <input type='button' value='Change Password' class='button' id="setting-button"/>
    </p>
     <div id="setting-msg"></div> 
    </form>
</script>
