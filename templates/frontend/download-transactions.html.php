<div class="container dashboard-space-top">
<div class="row">
            <div class="col l12 s12 right-align">
                <a href="dashboard" class="back-button">&laquo; Dashboard</a>
            </div>
            
        </div>
        <div class="row">
            
            <div class="col l6 offset-l3 s12">
                
                <h3 class="dashboard_item_title">Download Transactions</h3>
                
                <form id="msform" class="remove-top-margin" method="POST" action=""> 
            
                    <div class="row remove-row-bottom">
                        <div class="col s6 l6 left-align">
                            <label for="customer_name"><i class="fa fa-calendar"></i> From:</label>
                            <input type="text" id="fromDate" class="browser-default"
                            placeholder="Select Date" name="fromDate" required autofocus>
                            
                            <input type="hidden" name="register" value="1" />
                        </div>
                        <div class="col s6 l6 left-align">
                            <label for="phone"><i class="fa fa-calendar"></i> To:</label>
                            <input type="text" id="toDate" class="browser-default"
                            placeholder="Select Date" name="toDate" required autofocus>
                        </div>
                        <div class="col s12 l12 left-align">
                            <label for="download_format">Download Format</label>
                            <select name="download_format" class="browser-default">
                                <option value="excel">Excel Format</option>
                                <option value="pdf">PDF Format</option>
                            </select>
                        </div>

                        
                    </div>
                
                    <div class="row">
                        <div class="col s12 signup-action">
                            <input type="hidden" name="download_record" value="1" />
                            <input type="submit" class="action-button" name="Submit" value="DOWNLOAD">
                        </div>
                        
                    </div>
                    
                
                        

                </form>
            </div>
            
        </div>

</div>