var admin_id = "";
var active_data = "";
var i = 0;
var table = "";
var admin_id_value = "";

$(document).ready(function () {
  
  $(document).attr("title", "JDIS | Manage Admins");
  select_with_search_box();
  generate_default_username_password();
  load_data_tables();
  get_admin_table_cell_value()
});

//set do some stuff when confiramtion variable is changed
var confirmation = {
  aInternal: 10,
  aListener: function(val) {},
  set a(val) {
    this.aInternal = val;
    this.aListener(val);
  },
  get a() {
    return this.aInternal;
  },
  registerListener: function(listener) {
    this.aListener = listener;
  }
}

confirmation.registerListener(function(val) {
  alert_message();
});
//set do some stuff when confiramtion variable is changed end

// for select
function select_with_search_box()
{
  $('select').selectize({
    sortField: 'text'
});

$(".selectize-control").removeClass("form-control barangay-form")
}
// for select  end

//generate default user and password
function generate_default_username_password()
{
  $("#select_barangay").change(function(){ 
    var barangay_name = $("#select_barangay").text();
    barangay_name = barangay_name.replace(/ /g,"_");
    barangay_name = barangay_name.replace(/\./g, "");   
    barangay_name = barangay_name.toLowerCase();

    if(barangay_name.trim().length != 0)
    {
      $("#default_username").val("admin"+"_"+barangay_name);
      $("#default_password").val(barangay_name+":123");
    }
    else
    {
        $("#default_username").val("Please select a barangay.");
        $("#default_password").val("Please select a barangay.");
    }
    
});
}
//generate default user and password end

//reset barangay admin username and password
$( "#reset_admin" ).click(function() {

  admin_id = admin_id.toLowerCase(); 
  
  var reset_username = "admin"+"_"+admin_id;
  var reset_password = admin_id+":123";

  $.post("functions/reset-barangay-admin.php",
  {
    admin_id: admin_id_value,
    reset_username: reset_username,
    reset_password: reset_password
  },
  function(data, status){
    confirmation.a = data;
  });

});
//reset barangay admin username and password end

//delete a barangay admin record
$("#delete_barangay_admin_record").click(function()
{

  $.post("functions/delete-barangay-admin.php",
  {
    admin_id: admin_id_value
  },
  function(data, status){
   confirmation.a = data;
    
  });

})
//delete a barangay admin record end

//deactivate a barangay admin record
$("#deactivate_barangay_admin_record").click(function()
{
  $.post("functions/deactivate-barangay-admin.php",
  {
    admin_id: admin_id_value
  },
  function(data, status){
   confirmation.a = data;
  });

})
//deactivate a barangay admin record end

//activate a barangay admin record
$("#activate_barangay_admin_record").click(function()
{

  $.post("functions/activate-barangay-admin.php",
  {
    admin_id: admin_id_value
  },
  function(data, status){
   confirmation.a = data;
    
  });

})
//activate a barangay admin record end

//submit new barangay admin
$(  "#add_barangay_admin_btn" ).click(function() {
    var barangay_name = $("#select_barangay").text();
    var barangay_id = $("#select_barangay").val();
    var default_username = $("#default_username").val();
    var default_password = $("#default_password").val();

  if (barangay_id.trim().length === 0) //check if value is empty
  {
    $("#select_barangay").addClass("is-invalid");
    $(".selectize-control").addClass("is-invalid");
  }
  else
  {
    $.post("functions/add-barangay-admin.php",
    {
      select_barangay: barangay_id,
      barangay_name: barangay_name,
      default_username: default_username,
      default_password: default_password
    },
    function(data, status){
      confirmation.a = data;
      
    });

  }
});
//submit new barangay admin end


//erase input fields when x button is pressed
//add barangay
$("#close_add_barangay_admin").click(function()
{ 
  $("#default_username").val("Please select a barangay.");
  $("#default_password").val("Please select a barangay.");
  $("#select_barangay").val("");
  var $select = $('#select_barangay').selectize();
  var control = $select[0].selectize;
  control.clear();
})
//erase input fields when x button is pressed

//trigger error messages
function alert_message()
{
  var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer) 
    }
  });

if(confirmation.a == 1)
{
  $('#add-barangay-admin').modal('toggle');

  $("#default_username").val("Please select a barangay.");
  $("#default_password").val("Please select a barangay.");
  $("#select_barangay").val("");
  var $select = $('#select_barangay').selectize();
  var control = $select[0].selectize;
  control.clear();
  
  toastMixin.fire({
    animation: true,
    title: 'A new barangay admin has been added in the list.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 3)
{
  toastMixin.fire({
    animation: true,
    title: 'A default username and password has been restored.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 4)
{
  
  toastMixin.fire({
    animation: true,
    title: 'A barangay admin record has been deleted.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 5)
{
  
  toastMixin.fire({
    animation: true,
    title: 'A barangay admin record has been activated.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 6)
{
  toastMixin.fire({
    animation: true,
    title: 'A barangay admin record has been deactivated.'
  });
  table.ajax.reload( null, false);
}
else
{
  toastMixin.fire({
    animation: true,
    title: 'An admin is already assigned in the barangay.',
    icon: 'error'
  });
  setTimeout(function(){
  },3000);
}
}
//trigger error messages

//show data tables
function load_data_tables() {

  if ( ! $.fn.DataTable.isDataTable( '#admin_table' ) ) { // check if data table is already exist

    table = $('#admin_table').DataTable({
      
      scrollCollapse: true,
      "deferRender": true,
      "dom": 'fBrtip',     
      "serverSide": true,
      "ajax": "functions/show-barangay-admin.php",  

      "columns": [
        null,
        null,
        {
          "targets": 2,
          "render": function ( data, type, row, meta ) {


            if(data === "Admin-Deactivated")
            {active_data = data; 
              return  "<div class='shadow-sm align-middle bg-info text-white rounded-2 d-flex justify-content-center' type='button'  style='width:12rem'>Admin-Deactivated</div> ";
              
            }
            else
            {active_data = data;
              return "<div class='shadow-sm align-middle bg-success text-white rounded-2 d-flex justify-content-center' type='button' style='width:12rem'>Admin-Activated</div>";
            }
            
          },
         },
        {
          "defaultContent": "data",
          "targets": 3,
          "render": function ( data, type, row, meta ) {

            if(active_data === "Admin-Deactivated")
            {
              return  '<div class = "d-flex gap-2 justify-content-end" >'+"<i onclick = 'click_value(this.id)' class='update_barangay_value shadow-sm align-middle edit_barangay_value reset_btn btn btn-warning fas fa-undo-alt' data-coreui-toggle='modal' href='#reset_barangay' id='update_barangay_value "+data+"' role='button' ></i> "+
              "<i onclick = 'click_value(this.id)' class='shadow-sm align-middle edit_barangay_value del_btn btn btn-danger fa-solid fa-trash-can' href='#delete_barangay_admin' data-coreui-toggle='modal' id='delete_barangay_admin_value "+data+"' role='button' ></i> "+
              " <i onclick = 'click_value(this.id)' class='shadow-sm align-middle edit_barangay_value act_btn btn btn-success fas fa-unlock' href='#activate_barangay_admin' data-coreui-toggle='modal' id='activate_barangay_admin_value "+data+"' role='button' ></i>"+'</div>'
            }
            else
            {
              return  '<div class = "d-flex gap-2 justify-content-end" >'+"<i onclick = 'click_value(this.id)' class='shadow-sm align-middle edit_barangay_value reset_btn btn btn-warning fas fa-undo-alt' data-coreui-toggle='modal' href='#reset_barangay' id='update_barangay_value "+data+"' role='button' ></i> "+
              "<i onclick = 'click_value(this.id)' class='shadow-sm align-middle edit_barangay_value del_btn btn btn-danger fa-solid fa-trash-can' href='#delete_barangay_admin' data-coreui-toggle='modal' id='delete_barangay_admin_value "+data+"' role='button' ></i> "+
              " <i onclick = 'click_value(this.id)' class='deactivate_barangay_admin_value shadow-sm align-middle edit_barangay_value deact_btn btn btn-info fas fa-lock' href='#deactivate_barangay_admin' data-coreui-toggle='modal' id='deactivate_barangay_admin_value "+data+"' role='button' ></i>"+'</div>'
            }
              
          },
           
        }
      ],

      "lengthMenu": [[10, 15, 20, 25, 50], [10, 15, 20, 25, 50]],

      //disable the sorting of colomn
      "columnDefs": [ {
        "targets": 3,
        "orderable": false
        } ],
  
      "buttons": [
        {
            extend: 'copy',
            text: ' COPY',
  
            title: 'Juvenile Delinquent Information System',
  
            messageTop: 'List of Barangay Admins',
            //className: 'fa fa-solid fa-clipboard',
            
  
            exportOptions: {
            modifier: {
               page: 'current'
            },
             //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2],
              // optional space between columns
              columnGap: 1
            }
  
        },
        { 
            extend: 'excel',
            text: ' EXCEL',
  
            title: 'Juvenile Delinquent Information System',
  
            messageTop: 'List of Barangay Admins',
            //className: 'fa fa-solid fa-table',  //<i class="fa-solid fa-clipboard"></i>
            
  
            exportOptions: {
            modifier: {
               page: 'current'
            },
             //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2],
              // optional space between columns
              columnGap: 1
            }
  
        },
        {
            extend: 'print',
            text: ' PDF',
  
            title: 'Juvenile Delinquent Information System',
  
            messageTop: 'List of Barangay Admins',
            //className: 'fa fa-print',
            
  
            exportOptions: {
            modifier: {
               page: 'current'
            },
             //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2],
              // optional space between columns
              columnGap: 1
            },
  
            customize: function (win) {
               $(win.document.body)
                   .css('text-align', 'center')
  
               $(win.document.body).find('table')
                   .css('font-size', '12pt');
                   
                   $(win.document.body).find('table').addClass("table-bordered")
           }
        }],
    });
    table.buttons().container().appendTo('#admin_table_wrapper .col-md-6:eq(0)');

  }

    //to align the data table buttons
    $("#admin_table_wrapper").addClass("row");
    
    $(".dt-buttons").detach().appendTo('#buttons') 
    $(".dt-buttons").addClass("col-lg-2 text-center col-md-12 mb-3"); 
    $(".dt-buttons").removeClass("flex-wrap");

    $(".dataTables_filter").detach().appendTo('#buttons')
    $(".dataTables_filter").addClass("col-lg-10 text-lg-end text-center text-md-center text-sm-center col-md-12 mb-3");

    $(".dataTables_info").detach().appendTo('#table_page')
    $(".dataTables_info").addClass("col-lg-6 col-md-12 text-lg-start text-center text-md-center text-sm-center")

    $(".dataTables_paginate ").detach().appendTo('#table_page')
    $(".dataTables_paginate ").addClass("col-lg-6 d-flex justify-content-center justify-content-lg-end justify-content-md-center justify-content-sm-center ")


    $(".buttons-print").addClass("shadow-sm border-2 "); 
    $(".buttons-excel").addClass("shadow-sm border-2 "); 
    $(".buttons-copy").addClass("shadow-sm border-2 "); 

    $(".form-control").addClass("shadow-sm");
    $(".form-select").addClass("shadow-sm");

};
//show data tables end

//get the id of user admin
function click_value(this_value)
{
  admin_id_value = this_value.substr(this_value.indexOf(" ") + 1);
}
//get the id of user admin end

//get the table cell value when selected
function get_admin_table_cell_value()
{
  //updating
    $("#admin_table").on('click','.update_barangay_value',function(){

      // get the current row
      var currentRow=$(this).closest("tr");

      var col1=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value

      admin_id = col1;

  });
}
//get the table cell value when selected end
