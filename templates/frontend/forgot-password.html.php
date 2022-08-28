<div class="row">
    <div class="col l4 offset-l4 signup-form-area">
        
        <form id="msform" action=""  method="POST" class="signup-form-background login-space-around">
            <h4 class="title">Reset Password</h4>
            <p class="left-align">Enter your email address below to reset your <br><?= site_name; ?> password</p>
            <div class="">
                <input type="text" placeholder="Enter your email address" name="email" class="browser-default" required  autofocus>
                
            </div>
            <div class="signup-action margin-bottom-50">
                <input type="hidden" name="check_email" value="1" class="waves-effect">
                <input type="submit" name="submit" value="VERIFY" class="action-button">
            </div>
        </form>
        
    </div>
    <div class="clearfix"></div>
    <div class="center-align s12 signup-addition margin-top-20 margin-bottom-50">Already have a <?= site_name ?> account ? 
        <a href="login">Click here to login</a>
    </div>
</div>