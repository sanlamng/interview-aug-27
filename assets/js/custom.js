// Instantiate slider
$(document).ready(function(){
    if($("#my-slider").length > 0) {
        $( '#my-slider' ).sliderPro({
            height: '640px',
            width:'100%',
            fade: false,
            autoplay:true,
            arrows: true,
            buttons: false,
            fadeDuration:1700,
            autoplayDelay:6000,
            autoScaleLayers: false,
            breakpoints: {
                500: {
                    height: '500px'
                }
            }
        });
    }
   
})


//show popup
if($('#homepopup').length >0 ){
    setTimeout(showPopupNow,3000);
}


function showPopupNow(){
    $('#white_content').show().css({'padding':'0', 'overflow':'hidden'});
    $('#black_overlay').show();
    $('#sic2').load('popup.php').css({'padding':'0'});
}



$('#testimonials').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


/*
======================================================================
date picker
=======================================================================
*/
var dt = new Date();
dt.setFullYear(new Date().getFullYear()-8);

$('#dob').datepicker({ 
    format: 'dd/mm/yyyy',
    autoHide: true,
    endDate: dt
});


$('#fromDate').datepicker({ 
    format: 'dd/mm/yyyy',
    autoHide: true
});

$('#toDate').datepicker({ 
    format: 'dd/mm/yyyy',
    autoHide: true
});

/*
=========================================================================
close modal
==============================================================================
*/
$('body').on('click', '#closebox', function(){
    $('.white_content').hide();
    $('.black_overlay').hide();
})

$('body').on('click', '#closebox2', function(){
    $('.white_content2').hide();
    $('.black_overlay2').hide();
    $('.white_content').hide();
    $('.black_overlay').hide();
})


//instantiate nav
$(".button-collapse").sideNav();


//initialize aos

AOS.init({ duration:1200 });

/*
=========================================================================
handle signup
==============================================================================
*/

//fetch all entries
$('.doconfirm').click(function(){
	fetchEntries();
})
function fetchEntries(){

	//get form values
	var fullname = $('#firstname').val() + " " + $('#surname').val();
	var email = $('#email').val();
    var phone = $('#phone').val();
    var country  = $('#country').children("option:selected").val();
    var degree  = $('#degree-program').children("option:selected").val();
    var comments = $('#comments').val();
	
	$('#display-fullname').text(fullname);
	$('#display-email').text(email);
	$('#display-phone').text(phone);
    $('#display-country').text(country);
    $('#display-degree-program').text(degree);
    $('#display-comments').text(comments);
}

function numberFormatJs(input){
	return input.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}


function processPayment()
{
    var amount = $('#fund_amount').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var data = {
        amount: amount,
        phone: phone,
        email: email,
        "log_payment": "1"
    }
	$('.preloader').show();
	$.ajax({
        type:'POST',
        url:'./process-wallet.php',
        dataType:'json',
        data: data,
        success:function(e)
        {
            payWithPaystack(e);
            $('.preloader').hide();
        },
        error:function(){
            $('.preloader').hide();
            alert("Unable to generate transaction id ");
        }
	})

}

function payWithPaystack(data){
	var data = data;
	var handler = PaystackPop.setup({
		key: 'pk_live_5e3b36dd365e60dadbdb90ef1dfa8f3f0800edec',
        currency: 'NGN',
		email: data.email,
		amount: data.amount *100,
        ref: data.transaction_id,
		callback: function(response){
			$.ajax({
                url:'process-wallet.php',
                type: 'POST',
                data: { 
                    "reference":response.reference, 
                    "confirm":"1",
                    "amount": data.amount,
                    "phone": data.phone
                },
                success: function(e){
                    $('#currentBalance').html('&#8358; '+ e);
                    $('#item-results2').html('');
                }
            })							
					
		},
		onClose: function(){
			alert('Click "Pay online now" to retry payment.');
		}
	});
	handler.openIframe();
}

$(document).ready(function() {
    $('select').material_select();
});


//datatable
$(document).ready( function () {
    if($('#datatable-example').length > 0){
        $('#datatable-example').DataTable({
            "lengthMenu": [ 10, 25, 50, 75, 100, 200 ],
            
            buttons: [
                'copy', 'excel', 'pdf', 
            ],
    
            dom:
            "<'ui grid'"+
               "<'row'"+
                  "<'four wide column'l>"+
                  "<'right aligned eight wide column'B>"+
                  "<'right aligned four wide column'f>"+
               ">"+
               "<'row dt-table'"+
                  "<'sixteen wide column'tr>"+
               ">"+
               "<'row'"+
                  "<'seven wide column'i>"+
                  "<'right aligned nine wide column'p>"+
               ">"+
            ">"
    
        });
    }
    
} );

function verifyOrder() {
    if(confirm("Are you sure you have verified all the items and picked up? This action is irreversible! Press OK to mark order as picked up.")){
        document.getElementById('verifyform').submit();
    }
}

function deliverItems() {
    if(confirm("Are you sure you have Delivered all the items? This action is irreversible! Press OK to confirm that you have delivered the items.")){
        document.getElementById('deliverform').submit();
    }
}

function transferFunds() {
    if(confirm("Are you sure the funds have been sent to the customer's bank account? This action is irreversible! Press OK to confirm that you have sent the funds.")){
        document.getElementById('deliverform').submit();
    }
}

function makePayment() {
    if(confirm("Are you sure the customer has made full payment for this order? This action is irreversible! Press OK to confirm that customer has made payment.")){
        document.getElementById('paymentform').submit();
    }
}


function createOrder() {
    if(confirm("Are you sure you have entered all details correctly? Press OK to confirm that all items have been added correctly.")){
        document.getElementById('order-form').submit();
    }
}

function deleteRecord(id){
    if(confirm("Are you sure you want to delete this record?")){
        document.getElementById(id).submit();
    }
}

function submitForm(id, question=""){
    if(!question){
        document.getElementById(id).submit();
    }
    else if (confirm(question)){
        document.getElementById(id).submit();
    }
}

//handle referral id
if($('#referral_id').length > 0) {
    $('body').on('blur', '#referral_id', function(){
        let data  = {
            referral_id: $('#referral_id').val()
        }
        fetchPage('./referral.php', '#referral-id-name', data);
    })
}



/*
=========================================================================
toggle password visibility
==============================================================================
*/
$(".toggle-password").click(function() {
    
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});


if($('#display-order-details').length >0 ){
    placeOrderOnline();
}

function fetchPage(url, output, data={}) {
    $.ajax({
        type:'POST',
        url: url,
        data: data,
        beforeSend: function(){
            $('.preloader').show();
        },
        success: function(s) {
            $('.preloader').hide();
            $(output).html(s);
        },
        error:function(s){
            $('.preloader').hide();
            alert("Please refresh this page");
        }
    })
}

function placeOrderOnline(){
    fetchPage('./order2.php', '#display-order-details');
}

function placeOrderOffline(){
    fetchPage('./order6.php', '#display-order-details');
}


function selectOrderType(){
    fetchPage('./order1.php', '#display-order-details');
}

function proceedToDetails(){
    fetchPage('./order5.php', '#display-order-details');
}

function removeCartItem(id) {
    let data = { id }
    fetchPage('./order4.php', '#item-results',data);
}

function addAccountNumber() {
    fetchPage('./add-account.php', '#item-results');
}


function withdrawMoney() {
    fetchPage('./withdraw-money.php', '#item-results3');
}

function fundWallet() {
    fetchPage('./fund-wallet.php', '#item-results2');
}

function hideArea(id){
    $('#'+id).html('');
}

function copyText(){
    const textToCopy = document.querySelector('#referral-link').value;
    navigator.clipboard.writeText(textToCopy).then(
        function() {
            $('#showbox').html('Link copied successfully').fadeIn('slow').delay(2000).fadeOut();
        }, 
        function() {
            window.alert('Opps! Your your referral ID could not be copied')
        }
    )
}

function addToOrder(){
    let itemId = $('#item-name').val();
    let quantity = $('#quantity').val();
    let price = $('#item-name').children("option:selected").attr("valuePrice");
    price = quantity * price;
    let itemName = $('#item-name').children("option:selected").attr("valueTitle");
    console.log(itemName);
    let data = {
        itemId,
        quantity,
        price,
        itemName
    }
    if(!itemId || !quantity){
        alert('Please select an item and quantity');
    }
    else {
        fetchPage('./order3.php', '#item-results',data);
    }
}

function addToOrder2(){
    let itemId = $('#item-name').val();
    let quantity = $('#quantity').val();
    let price = $('#item-name').children("option:selected").attr("valuePrice");
    price = quantity * price;
    let itemName = $('#item-name').children("option:selected").attr("valueTitle");
    console.log(itemName);
    let data = {
        itemId,
        quantity,
        price,
        itemName
    }
    if(!itemId || !quantity){
        alert('Please select an item and quantity');
    }
    else {
        fetchPage('./order3a.php', '#item-results',data);
    }
}


$('body').on('change', '#item-name', function(){
    let price = $('#item-name').children('option:selected').attr('valuePrice');
    $('#amount').val(price);
})

$('body').on('change', '#quantity', function(){
    let quantity  = $('#quantity').val();
    let price = $('#item-name').children('option:selected').attr('valuePrice');
    price = !price ? 0: price;
    $('#amount').val(price*quantity);
})


//admin invoice
function addToOrder3(){
    let itemId = $('#item-name').val();
    let quantity = $('#quantity').val();
    let price = $('#amount').val();
    let itemName = $('#item-name').children("option:selected").attr("valueTitle");
    let note = $('#note').val();
    let data = {
        itemId,
        quantity,
        price,
        itemName,
        note
    }
    if(!itemId || !quantity || !price){
        alert('Please select an item, quantity and price');
    }
    else {
        $('#note').val('');
        fetchPage('./order3b.php', '#item-results',data);
    }
}


function submitOrder(){
    let phone = $('#phone').val();
    let email = $('#email').val();
    let customer_name = $('#customer_name').val();
    let pickup_address = $('#pickup_address').val();
    let data = {
        phone,
        email,
        customer_name,
        pickup_address
    }
    if(!phone || !email || !customer_name || !pickup_address ){
        alert('Please complete all details correctly');
    }
    else {
        fetchPage('./submit-cart.php', '#display-order-details', data);
    }
}


function submitOrder2(){
    let phone = $('#phone').val();
    let email = $('#email').val();
    let customer_name = $('#customer_name').val();
    let pickup_address = $('#pickup_address').val();
    let data = {
        phone,
        email,
        customer_name,
        pickup_address
    }
    if(!phone || !email || !customer_name || !pickup_address ){
        alert('Please complete all details correctly');
    }
    else {
        fetchPage('./submit-cart2.php', '#display-order-details', data);
    }
}



//whatsapp

$(function () {
    if($('#WAButton').length >0) {
        let phone =$('#whatsapp_button').val();
        $('#WAButton').floatingWhatsApp({
            phone: phone, 
            headerTitle: 'Chat with us on WhatsApp', 
            popupMessage: 'Hello, how can we help you?',
            showPopup: true, 
            buttonImage: '<img src="assets/floating-whatsapp/whatsapp.svg" />',
            //headerColor: 'crimson', //Custom header color
            //backgroundColor: 'crimson', //Custom background button color
            position: "right",
            size: "50px" 
    
        });
    }
    
}); 
