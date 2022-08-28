<?php 
//admin
$permission_list = ["1"]; if(in_array($_SESSION["access_level"],$permission_list)): 
?>
    <div class="container dashboard-space-top">
        <div class="row">
            <div class="col l12">
                <h3 class="dashboard_item_title">Dashboard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col l3 s12">
                <div class="dashboard-item">
                    <h3><?= $pending_pickups; ?></h3>
                    <div class="title">Pending Pick ups</div>
                    <div><a href="pickups" class="action">View Pick Ups</a></div>
                </div>
            </div>
            <div class="col l3 s12 ">
                <div class="dashboard-item">
                    <h3><?= $pending_deliveries; ?></h3>
                    <div class="title">Pending Deliveries</div>
                    <div><a href="pending-deliveries" class="action">View Deliveries</a></div>
                </div>
            </div>
            <div class="col l3 s12">
                <div class="dashboard-item">
                    <h3><?= $withdrawals; ?></h3>
                    <div class="title">Referral Withdrawal Requests</div>
                    <div><a href="withdrawal-requests" class="action">View All</a></div>
                </div>
            </div>
            
            <div class="col l3 s12 ">
                <div class="dashboard-item">
                    <h3><?= $customers; ?></h3>
                    <div class="title">Customers</div>
                    <div><a href="customers" class="action">View Customers</a></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>




<?php 
//customer
$permission_list = ["2"]; if(in_array($_SESSION["access_level"],$permission_list)): 
?>
    <div class="container dashboard-space-top">
        <div class="row">
            <div class="col l12">
                <h3 class="dashboard_item_title">Dashboard</h3>
                <h5 class="page-texts">Hello, <b><?= $_SESSION["customer_name"] ?></b>, welcome to your dashboard!</h5>
            </div>
        </div>
        <div class="row">

            <div class="col l4 s12 ">
                <div class="dashboard-item">
                    <h3><i class="fa fa-credit-card"></i></h3>
                    <h3>&#8358;<?= number_format($wallet_balance,2); ?></h3>
                    <div class="title">Account Balance</div>
                    <!-- <div><a href="transactions" class="action">View Transactions</a></div> -->
                </div>
            </div>
            <div class="col l4 s12 ">
                
                
                <div class="dashboard-item">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="title">Assets/Investments Summary</div>
                    <div><a href="transactions" class="action">View Transactions</a></div>
                </div>
            </div>
            <!-- <div class="col l3 s12 ">
                <div class="dashboard-item">
                    <h3><i class="fa fa-credit-card"></i></h3>
                    <div class="title">Make New Payment</div>
                    <div><a href="place-order" class="action">New Payment</a></div>
                </div>
            </div> -->
            
        </div>
    </div>
<?php endif; ?>