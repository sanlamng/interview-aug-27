/*
==================================================
Rave focus functions
1. close modals
2. approvals
3. initializations and general functions
4. classroom functions
5. chatroom functions
6. pagination
==================================================
*/ 

/*
===================================================
1. close modals
===================================================
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



/*
===================================================
3. initializations and general functions
===================================================
*/
//instantiate nav
$(".button-collapse").sideNav();

//collapsible
$('.collapsible').collapsible();


//activate tabs
$(document).ready(function(){
    $('ul.tabs').tabs();
})

//setup plyr js player
if($('.dmplayer').length > 0){
    const players = Plyr.setup('.dmplayer');
} 

//datatable
$(document).ready( function () {
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
} );


$(document).ready( function () {
    $('#datatable-example2').DataTable();
});


//activate wys
if($('.editorm').length >0 ){
    var editor = new Simditor({
        textarea: $('.editorm'),
        defaultImage: '../assets/simditor/assets/images/image.png',
        upload:{
          url: 'process-wysiwyg-image.php',
          params: {alt:'blog image'},
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: 'Uploading file'
        },
        pasteImage:true,
        cleanPaste: false,
        toolbar: [
        'title',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'fontScale',
        'color',
        'ol',            
        'ul',           
        'blockquote',
        'code'  ,         
        'table',
        'link',
        'image',
        'hr'  ,           
        'indent',
        'outdent',
        'alignment'
      ]
    });
    
}

//chosen select
// $(".chosen-select").chosen();

if($('.demo').length > 0 ){
    $('.demo').readmore({
        moreLink:"<span class='theme-color show-more'>Show more <i class='fa fa-angle-down'></i></span>",
        lessLink:"<span class='theme-color show-more'>Show less <i class='fa fa-angle-up'></i></span>",
        collapsedHeight:45
    })
}




/*
=================================================================
6. pagination and search
=================================================================
*/ 

function loadData(page, table_case, query=''){
    $.ajax({
        url  : "pagination.php",
        type : "POST",
        cache: false,
        data : {page_no:page, table_case:table_case, query:query},
        success:function(response){
            $("#table-data").html(response);
            $("#table-data .demo").readmore({
                moreLink:"<span class='theme-color show-more'>Show more <i class='fa fa-angle-down'></i></span>",
                lessLink:"<span class='theme-color show-more'>Show less <i class='fa fa-angle-up'></i></span>",
                collapsedHeight:45
            });
        }
    });
}

if($('.classroom-data').length >0){
    loadData("1", "1");//first record of classrooms
}

if($('.free-video-data').length >0){
    loadData("1", "2");//first record of free videos
}


// Pagination code
$(document).on("click", ".pagination li a", function(e){
    e.preventDefault();
    var pageId = $(this).attr("id");
    var table_case = $(this).attr("table_case");
    loadData(pageId, table_case);
});


//charts

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const data = {
    labels: labels,
    datasets: [{
      label: 'Investments 2022',
      backgroundColor: 'rgb(0, 179, 212)',
      borderColor: 'rgb(0, 179, 212)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};


const myChart = new Chart(
    document.getElementById('myChart'),
    config
);