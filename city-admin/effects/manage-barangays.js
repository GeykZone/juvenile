var barangay_name_id = "";
var table = "";

$(document).ready(function()
{
  $(document).attr("title", "JDIS | Manage Barangays"); 
  load_data_tables();
  get_barangay_table_cell_value()
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

//submit new barangay
$("#add_barangay_btn").click(function () {

    var barangay = $("#barangay").val();
  
    if (barangay.trim().length === 0) //check if value is empty
    {
      $("#barangay").addClass("is-invalid");
      $("#barangay").val("");
    } 
    else 
    {
      $.post("functions/add-barangay.php", {
          barangay: barangay,
        },
        function (data, status) {
         confirmation.a = data;
  
        });

        
    }
  });
  //submit new barangay end

  //update barangay
$("#update_barangay_btn").click(function () {
    var update_barangay = $("#update_barangay").val();
  
    if (update_barangay.trim().length === 0) //check if value is empty
    {
       $("#update_barangay").addClass("is-invalid");
       $("#update_barangay").val("");
    } 
    else 
    {
       $.post("functions/update-barangay.php", {
        update_barangay: update_barangay,
        barangay_name_id: barangay_name_id
      },
      function (data, status) {
        confirmation.a = data;
  
      });
    }
  });
  //update barangay end

//delete barangay
  $("#delete-barangay").click(function () {
  $.post("functions/delete-barangay.php", {
      barangay_name_id: barangay_name_id
  },
  function (data, status) {
      confirmation.a = data;

  });

  });
//delete barangay end


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
  $('#add-barangay').modal('toggle');

  $("#barangay").val("");
  $("#Latitude").val("");
  $("#Longitude").val("");

  toastMixin.fire({
    animation: true,
    title: 'A new barangay admin has been added.'
  });

  table.ajax.reload( null, false);

}
else if(confirmation.a == 3)
{
  $('#update-barangay').modal('toggle');
  

  toastMixin.fire({
    animation: true,
    title: 'A barangay record has been updated.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 4)
{
  
  toastMixin.fire({
    animation: true,
    title: 'A barangay has been deleted.'
  });
  table.ajax.reload( null, false);
}
else
{
  toastMixin.fire({
    animation: true,
    title: 'The barangay already exist.',
    icon: 'error'
  });
  setTimeout(function(){
  },3000);
}
}
//trigger error messages

//show data tables
function load_data_tables() {

  if ( ! $.fn.DataTable.isDataTable( '#barangay_table' ) ) { // check if data table is already exist

    table = $('#barangay_table').DataTable({

      scrollCollapse: true,
      "deferRender": true,
      "dom": 'fBrtips',     
      "serverSide": true,
      "ajax": "functions/show-barangay.php",  

  
      "columns": [
  
        null,
        {
          "defaultContent":
          '<div class = "d-flex gap-2 justify-content-center" >'+
          '<i class="shadow-sm align-middle edit_barangay_value update edit_btn btn btn-warning  fas fa-edit" data-coreui-toggle="modal" href="#update-barangay" id="edit_barangay_value" role="button" ></i> '+
          '<i class="shadow-sm align-middle edit_barangay_value del_btn fa-solid btn btn-danger  fa-trash-can" href="#delete_barangay" data-coreui-toggle="modal" id="delete_barangay_value" role="button" ></i> '+
          '</div>',
        }
      ],
  
  
      "lengthMenu": [[10, 15, 20, 25, 50], [10, 15, 20, 25, 50]],
  
  
       //disable the sorting of colomn
       "columnDefs": [{
          "targets": 1,
          "orderable": false
       }],
  
       "buttons": [{
             extend: 'copy',
             text: 'COPY',
  
             title: 'juvenile Delinquent Information System',
  
             messageTop: 'List of Barangays',
             //className: 'fa fa-solid fa-clipboard',
  
  
             exportOptions: {
                modifier: {
                   page: 'current'
                },
                //columns: [0, 1] //r.broj kolone koja se stampa u PDF
                columns: [0],
                // optional space between columns
                columnGap: 1
             }
  
          },
          {
             extend: 'excel',
             text: 'EXCEL',
             title: 'juvenile Delinquent Information System',
  
             messageTop: 'List of Barangays',
             //className: 'fa fa-solid fa-table',  //<i class="fa-solid fa-clipboard"></i>
  
  
             exportOptions: {
                modifier: {
                   page: 'current'
                },
                //columns: [0, 1] //r.broj kolone koja se stampa u PDF
                columns: [0],
                // optional space between columns
                columnGap: 1
             }
  
          },
          {
             extend: 'print',
             text: 'PDF',
             title: 'juvenile Delinquent Information System',
  
             messageTop: 'List of Barangays',
             //className: 'fa fa-print',
  
  
             exportOptions: {
                modifier: {
                   page: 'current'
                },
                //columns: [0, 1] //r.broj kolone koja se stampa u PDF 
                columns: [0],
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
          }
       ],
    });
    table.buttons().container().appendTo('#barangay_table_wrapper .col-md-6:eq(0)');

  }

      //to align the data table buttons
      $("#barangay_table_wrapper").addClass("row");

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

}
//show data tables end

//get the table cell value when selected
function get_barangay_table_cell_value()
{

    //updating
    $("#barangay_table").on('click','#edit_barangay_value',function(){

        // get the current row
        var currentRow=$(this).closest("tr");
  
        var col1=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value
  
        $("#update_barangay").val(col1);
        barangay_name_id = col1;
  
    });

    //deleting
    $("#barangay_table").on('click','#delete_barangay_value',function(){
        // get the current row
        var currentRow=$(this).closest("tr");
        var col1=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value
        barangay_name_id = col1;
    });
}
//get the table cell value when selected end

//erese input fields when x button is pressed
//add barangay
$("#close_add_barangay").click(function()
{
  $("#barangay").val("");
})
//erese input fields when x button is pressed








