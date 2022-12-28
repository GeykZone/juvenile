var offense_name_id = "";
var table = "";

$(document).ready(function()
{
  $(document).attr("title", "JDIS | Manage Offenses"); 
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
$("#add_offense_btn").click(function () {

    var offense = $("#offense").val();
  
    if (offense.trim().length === 0) //check if value is empty
    {
      $("#offense").addClass("is-invalid");
      $("#offense").val("");
    } 
    else 
    {
      $.post("functions/add-offense.php", {
        offense: offense,
        },
        function (data, status) {
         confirmation.a = data;
  
        });
    }
  });
  //submit new barangay end

//delete barangay
  $("#delete-offense").click(function () {
    $.post("functions/delete-offense.php", {
        offense_name_id: offense_name_id
    },
    function (data, status) {
        confirmation.a = data;

    });

    });
//delete barangay end

//update barangay
$("#update_offense_btn").click(function () {
    var update_offense = $("#update_offense").val();
  
    if (update_offense.trim().length === 0) //check if value is empty
    {
       $("#update_offense").addClass("is-invalid");
       $("#update_offense").val("");
    } 
    else 
    {
       $.post("functions/update-offense.php", {
        update_offense: update_offense,
        offense_name_id: offense_name_id
      },
      function (data, status) {
        confirmation.a = data;
  
      });
    }
  });
  //update barangay end

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
  $('#add-offense').modal('toggle');

  $("#offense").val("");

  toastMixin.fire({
    animation: true,
    title: 'A new offense has been added in the list.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 3)
{
  $('#update-offense').modal('toggle');
  
  toastMixin.fire({
    animation: true,
    title: 'An offense name has been updated.'
  });
  table.ajax.reload( null, false);
}
else if(confirmation.a == 4)
{
  
  toastMixin.fire({
    animation: true,
    title: 'An offense has been deleted.'
  });
  table.ajax.reload( null, false);
}
else
{
  toastMixin.fire({
    animation: true,
    title: 'The barangay is already in the list.',
    icon: 'error'
  });
  setTimeout(function(){
  },3000);
}
}
//trigger error messages

//show data tables
function load_data_tables() {

  if ( ! $.fn.DataTable.isDataTable( '#offense_table' ) ) { // check if data table is already exist

    table = $('#offense_table').DataTable({

      "deferRender": true,
      "dom": 'fBrtips',     
      //"processing": true,
      "serverSide": true,
      "ajax": "functions/show-offenses.php",  
      scrollCollapse: true,
  
      "columns": [
  
        null,
        {
          "defaultContent":
          '<div class = "d-flex gap-2 justify-content-center" >'+
          '<i class="shadow-sm align-middle edit_barangay_value update edit_btn btn btn-warning  fas fa-edit" data-coreui-toggle="modal" href="#update-offense" id="edit_offense_value" role="button" ></i> '+
          '<i class="shadow-sm align-middle edit_barangay_value del_btn fa-solid btn btn-danger  fa-trash-can" href="#delete_offense" data-coreui-toggle="modal" id="delete_offense_value" role="button" ></i> '+
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
  
            title: 'Juvenile Delinquent Information System',
  
             messageTop: 'List of Offenses',
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
            title: 'Juvenile Delinquent Information System',
  
             messageTop: 'List of Offenses',
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
            title: 'Juvenile Delinquent Information System',
  
             messageTop: 'List of Offenses',
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
    table.buttons().container().appendTo('#offense_table_wrapper .col-md-6:eq(0)');

  }

      //to align the data table buttons
      $("#offense_table_wrapper").addClass("row");
      
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


//erese input fields when x button is pressed
//add barangay
$("#close_add_offense").click(function()
{
  $("#offense").val("");
})
//erese input fields when x button is pressed


//get the table cell value when selected
function get_barangay_table_cell_value()
{
    //updating
    $("#offense_table").on('click','#edit_offense_value',function(){

        // get the current row
        var currentRow=$(this).closest("tr");
  
        var col1=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value
  
        $("#update_offense").val(col1);
        offense_name_id = col1;
  
    });

    //deleting
    $("#offense_table").on('click','#delete_offense_value',function(){
        // get the current row
        var currentRow=$(this).closest("tr");
        var col1=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value
        offense_name_id = col1;
    });
}
//get the table cell value when selected end





