<div class="container">
    <div class="row">
        <div class="col l6 offset-l3 signup-form-area">
            
            <form id="msform" class=" signup-form-background login-space-around" method="POST" action=""> 
                <div class="row">
                    <div class="col l12">
                        <h4 class="title wow fadeInUp">Sign up</h4>
                        <p class="center-align">Please fill the form below to sign up.</p>
                    </div>

                </div>
                
                
                <div class="row">
                    <div class="col s12 l6 left-align">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" id="customer_name" class="browser-default"
                        placeholder="Enter your name" name="customer_name" required autofocus>
                        
                        <input type="hidden" name="register" value="1" />
                    </div>
                    <div class="col s12 l6 left-align">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="browser-default"
                        placeholder="Enter your phone" name="phone" required autofocus>
                    </div>
                    <div class="col s6 l6 left-align">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="browser-default"
                        placeholder="Choose a Username" name="username" required autofocus>
                    </div>

                    <div class="col s6 l6 left-align">
                        <label for="password"> Password</label>
                        <input type="password" id="password" name="password" class="browser-default" placeholder="Create password"
                            name="password" required autofocus>
                        
                        <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                      
                        
                    </div>
                    <div class="col s12 l12 left-align">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" id="dob" class="browser-default"
                        placeholder="Enter your Date of Birth" name="dob" required autofocus>
                        
                    </div>
                    
                </div>
            
                <div class="row">
                    <div class="col s12 signup-action">
                        <input type="submit" class="action-button" name="Submit" value="Sign up">
                    </div>
                    
                </div>
                
            
                    

            </form>
            
        </div>
    </div>
</div>
