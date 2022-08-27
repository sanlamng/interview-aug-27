function formatMoney(number) {
    return new Intl.NumberFormat("en-NG", { style: "currency", "currency":"NGN" }).format(number)
}

$("#export").click(function () {
    $("#table1").table2excel({
        exclude: ".noExport",
        filename: "Transactions"
    });
});



function get_dashboard_info() {

    if (localStorage.getItem('fbn_token') === ''){
        location.href= 'login.html';
    }else{
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'http://localhost/fbn_insurance/transactions/getAllTransactions', // the url where we want to POST
            processData: false,
            contentType: 'application/json',
            cache: false,
            headers: { "Authorization": 'Bearer ' + localStorage.getItem('fbn_token') },
            data: JSON.stringify( {
                "api_key" : "V0VCX1NFQ1JFVF9LRVktRk9SX0lTU19DT05ORUNU"}),

            dataType: 'json', // what type of data do we expect back from the server
        })
            // using the done promise callback
            .done(function (data, textStatus, jqXHR) {
                console.log(data.data);
                var i = 1;

                Object.values(data.data).forEach(value => {
                    var html = "<tr><td>"+ i +"</td><td>"+value.payment_date+"</td><td>"+formatMoney(value.amount)+"</td><td>"+value.product_name+"</td><td>"+value.transaction_reference+"</td><td><button class='btn-info'>Details</button></td></tr>";

                    $("#table1").find('tbody').append(html);
                    i++;
                });

                $('#table1 tr').click(function(e) {

                    var reference_code = $(e.target).closest('tr').find('td:eq(4)').text();

                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'http://localhost/fbn_insurance/transactions/getTransactionByReference', // the url where we want to POST
                        processData: false,
                        contentType: 'application/json',
                        cache: false,
                        headers: { "Authorization": 'Bearer ' + localStorage.getItem('fbn_token') },
                        data: JSON.stringify( {
                            "api_key" : "V0VCX1NFQ1JFVF9LRVktRk9SX0lTU19DT05ORUNU",
                            "transaction_reference" : reference_code
                        }),

                        dataType: 'json', // what type of data do we expect back from the server
                    })
                        // using the done promise callback
                        .done(function (data, textStatus, jqXHR) {

                            console.log(data.data);
                            if (data.data.transaction_status == 1){
                                status = 'Successful';
                            }else{
                                status= 'Unsuccessful';
                            }
                            $('#payment_date').text(data.data.payment_date);
                            $('#tranx_amount').text(data.data.amount);
                            $('#product_type').text(data.data.product_name);
                            $('#ref_code').text(data.data.transaction_reference);
                            $('#submitted_date').text(data.data.submitted_at);
                            $('#product_details').text(data.data.product_details);
                            $('#trans_status').text(status);

                        });
                    $('#transaction_detals').modal('show');

                });


                if (!data.status) {
                    window.location.replace('dashboard.html');
                } else {
                    $('#first_name').text(data.data[0].last_name +', ' + data.data[0].first_name)

                }
            });


        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'http://localhost/fbn_insurance/transactions/getSumAndCount', // the url where we want to POST
            processData: false,
            contentType: 'application/json',
            cache: false,
            headers: { "Authorization": 'Bearer ' + localStorage.getItem('fbn_token') },
            data: JSON.stringify( {
                "api_key" : "V0VCX1NFQ1JFVF9LRVktRk9SX0lTU19DT05ORUNU"}),

            dataType: 'json', // what type of data do we expect back from the server
        })
            // using the done promise callback
            .done(function (data, textStatus, jqXHR) {
                // console.log(data.data[0]);
                if (!data.status) {
                    window.location.replace('dashboard.html');
                } else {
                    $('#amount_total').text(formatMoney(data.data[0].total_amount));
                    $('#investment_total').text(data.data[0].total_investment);
                }
            })


    }



}