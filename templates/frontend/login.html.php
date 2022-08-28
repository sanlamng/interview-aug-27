<div class="row">
    <div class="col l4 offset-l4 signup-form-area">
        
        <form id="msform" class=" signup-form-background login-space-around" method="POST" action=""> 
            <div class="row">
                <div class="col l12">
                    <h4 class="title wow fadeInUp">Login</h4>
                </div>

            </div>
            
            
            <div class="row">
                <div class="col s12 left-align">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="browser-default"
                    placeholder="Enter your username" name="username" required autofocus>
                    
                    <input type="hidden" name="login" value="1" />
                </div>

                <div class="col s12 left-align">
                    <label for="password"> Password</label>
                    <input type="password" id="password" class="browser-default" placeholder="Enter password"
                        name="password" required autofocus>
                    
                    <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                    <!-- <div class="col l12 s12 left-align">
                        Forgot password? <a href="forgot-password">Click here</a>
                    </div> -->
                    
                </div>
                
            </div>
        
            <div class="row">
                <div class="col s12 signup-action">
                    <input type="submit" class="action-button" name="Submit" value="Login">
                </div>
                
                <div class="center-align signup-addition margin-top-20">Don't have a <?= site_name ?> account ? 
                    <a href="signup">Click here to sign up</a>
                </div>
            </div>
            
        
                

        </form>
        
    </div>
    <div class="clearfix"></div>
    
</div>