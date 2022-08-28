<div class="row">
    <div class="col l4 offset-l4 signup-form-area">
        <div id="msform" class="signup-form-background login-space-around">
        <h4>Change Password</h4>
            <form id="resetform" action="" method="POST">
                <input type="hidden" name="reset_now" value="yes">
                <p>Enter your reset code and new password below. 
                If you did not receive your password reset code, 
                then <a href="javascript:;" 
                onclick="document.getElementById('resetform').submit();">click here</a> to resend it.</p>
            </form>
            <form  action="" method="POST"  >
                <input type="text" name="resetcode" 
                    placeholder="Enter reset code" required 
                    class="validate browser-default" autofocus>
                
                <input type="password" name="password" 
                    placeholder="Enter your new password" required 
                    id="password" class="validate browser-default" autofocus>
                <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                <div class="signup-action margin-bottom-50">
                    <input type="hidden" name="change_password" value="1" class="waves-effect">
                    <input type="submit"  name="Submit" value="SAVE NEW PASSWORD" class="action-button" style="width:150px;">
                </div>
                
            </form>

        </div>
        
    </div>
    <div class="clearfix"></div>
    <div class="center-align s12 signup-addition margin-top-20 margin-bottom-50">Already have a <?= site_name ?> account ? 
        <a href="login">Click here to login</a>
    </div>
</div>