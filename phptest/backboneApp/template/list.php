<script ype='text/template' id='editTemplate'>
<style>
    th,td{
        text-align: center;
    }
    table{
         border-collapse: collapse;
         width: 50%;
         border: 2px solid black;
    }
</style>
<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <tr width="100%" style="border: 2px solid black;">
                <td><%= id %> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><span class="row buttons"></span>
                    <span class="row buttons"></span>
                    <span class="row buttons"></span>
                    <span class="row buttons"></span></td>
            </tr>
        </tbody>
    </table> 
</div>
</script>