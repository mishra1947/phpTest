<script type='text/template' id='signupTemplate'>
    <h2> User Details</h2>
<form id='signup'>
    <div class='signup name'> 
        <div>Name:</div><input type='text' name='full_name' id='full_name' value=''/> <br />
        <div class="error-name" style='color: red'></div>
    </div>
    <div class='signup email'> 
        <div>Email:</div><input type='email' name='email' id='email' /> <br />
        <div class="error-email" style='color: red'></div>
    </div>
    <div class='signup phone'> 
        <div>Phone:</div><input type='text' name='phone' id='phone' /> <br />
        <div class="error-phone" ></div>
    </div>
    <div class='signup address'> 
        <div>Address:</div><textarea id='address' name='address' rows='05' cols= '20'></textarea> <br />
        <div class="error-address"></div>
    </div>
    <input type='submit' value='Submit' class='button' />
</form>
</script>
<script ype='text/template' id='listTemplate'>
<style>
    table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td, tr {
                padding: 15px;
                text-align: center;
            }
            table{
                width: 100%;
            }
</style>
<div>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Option</th>
        </tr>
        <% $.each(details, function( key, value ) { %>  
        <tr width="100%" style="border: 2px solid black;">
            <td><%= details[key]['id'] %></td>
            <td><%= details[key]['full_name'] %></td>
            <td><%= details[key]['email'] %></td>
            <td><%= details[key]['phone'] %></td>
            <td><%= details[key]['address'] %></td>
            <td><span id="edit"><a href="http://bb-app.com/#updateContact/<%= details[key]['id'] %>">Edit</a></span>
                <span id="add"><a href="http://bb-app.com/#addContact">Add</a></span>
                <span id="delete"><a href="http://bb-app.com/#deleteContact/<%= details[key]['id'] %>">Delete</a></span>
            </td>
        </tr>
        <% }); %>
    </table> 
</div>
</script>

<script type='text/template' id='updateTemplate'>
    <h2>Update User Details</h2>
<form id='signup'>
    <div class='signup name'> 
        <div>Name:</div><input type='text' name='full_name' id='full_name' value='<%= detail['full_name'] %>'/> <br />
        <div class="error-name" style='color: red'></div>
    </div>
    <div class='signup email'> 
        <div>Email:</div><input type='email' name='email' id='email' value='<%= detail['email'] %>' /> <br />
        <div class="error-email" style='color: red'></div>
    </div>
    <div class='signup phone'> 
        <div>Phone:</div><input type='text' name='phone' id='phone' value='<%= detail['phone'] %>' /> <br />
        <div class="error-phone" ></div>
    </div>
    <div class='signup address'> 
        <div>Address:</div><textarea id='address' name='address' rows='05' cols= '20'><%= detail['address'] %></textarea> <br />
        <div class="error-address"></div>
    </div>
    <div>
        <input type='submit' value='Update-<%= detail['id'] %>' class='updateButton' name='updateButton' />
        <a href="http://bb-app.com/#listContact">Cancel</a>
    </div>            
</form>
</script>
