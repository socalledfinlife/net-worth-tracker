<div class="wrap">
    <h2>My So-Called Financial Life Net Worth Tracker</h2>

    <h3>Add New Account</h3>
    <form id="net_worth_tracker" method="post" action="">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="account_name">Account Name:</label>
                    </th>
                    <td>
                        <input type="text" name="account_name" id="account_name" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="account_balance">Account Balance:</label>
                    </th>
                    <td>
                        <input type="text" name="account_balance" id="account_balance" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="account_description">Account Description (optional):</label>
                    </th>
                    <td>
                        <textarea name="account_description" id="account_description" rows="5" cols="30"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" id="submit" value="Add Account" class="button button-primary" />
        </p>
    </form>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            var ajax_request = $.ajax({
                url: ajaxurl,
                cache: false,
                dataType: "json",
                method: "POST",
                data: {
                    action: 'getNetWorth',
                }
            });

            ajax_request.done(function(msg){
                console.log(msg);
            });
            ajax_request.fail(function(msg){
                console.log(msg);
            });
            ajax_request.always(function(){
                console.log('hola');
            });
        });
    </script>
</div>