<div class="container dashboard-space-top">
<div class="row">
            <div class="col l12 s12 right-align">
                <a href="dashboard" class="back-button">&laquo; Dashboard</a>
                <a href="download-transactions" class="back-button"><i class="fa fa-download"></i> Download</a>
            </div>
            <div class="col l12 s12">
                <h3 class="dashboard_item_title">Transactions</h3>
            </div>
        </div>
        <div class="row">
            
            <div class="col l12 s12">
                <?php if(!empty($customer_records)): ?>
                    <div class="mobile-table-overflow">
                        <table class="centered striped " id="datatable-example2">
                            <thead>
                                <tr>
                                    
                                    <th>S/N</th>
                                    <th>Transaction Date</th>
                                    <th>Time</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($customer_records)):
                                    $count = 1;
                                    foreach ($customer_records as $ky => $record): ?>
                                <tr>
                                    <td><?= $count; ?></td>
                                    <td><?= date("M j, Y", strtotime($record["payment_date"])); ?></td>
                                    <td><?= date("g:i a", strtotime($record["payment_date"])); ?></td>
                                    <td><?=  ucfirst($record["product"]); ?></td>
                                    <td>NGN <?= $record["amount_paid"]; ?></td>
                                    
                                    
                                    
                                </tr>

                                <?php $count++; endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                <div class="left-align"><i>You have  no transactions yet</i></div>
                <?php endif; ?>
            </div>
            
        </div>

</div>