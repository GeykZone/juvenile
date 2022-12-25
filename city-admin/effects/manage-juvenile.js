//phone number validation
function allCharactersSame(s)
{
  let n = s.length;
  for (let i = 1; i < n; i++)
      if (s[i] != s[0])
          return false;

  return true;
}

function line1(s)
{
  let n = s.length;
  for (let i = 2; i < n; i++)
      if (s[i] != s[1])
          return false;

  return true;
}

function line2(s)
{
  let n = s.length;
  for (let i = 3; i < n; i++)
      if (s[i] != s[2])
          return false;

  return true;
}

function line3(s)
{
  let n = s.length;
  for (let i = 4; i < n; i++)
      if (s[i] != s[3])
          return false;

  return true;
}

function line4(s)
{
  let n = s.length;
  for (let i = 5; i < n; i++)
      if (s[i] != s[4])
          return false;

  return true;
}

function line5(s)
{
  let n = s.length;
  for (let i = 6; i < n; i++)
      if (s[i] != s[5])
          return false;

  return true;
}

function line6(s)
{
  let n = s.length;
  for (let i = 7; i < n; i++)
      if (s[i] != s[6])
          return false;

  return true;
}
//phone number validation end

var juvenile_id_value;

$(document).ready(function()
{
    $(document).attr("title", "JDIS | Manage juvenile");
    select_with_search_box()
    generate_age()
    enable_form()
    load_data_tables();
    get_juvenile_table_cell_value();
})

//enable the form when a barangay is picked
function enable_form()
{
//new 
$("#select_barangay").change(function(){ 
var barangay_name = $("#select_barangay").text();

if(barangay_name.trim().length != 0)
{
  $("#fieldset1").removeClass("d-none")
}
else
{
  $("#fieldset1").addClass("d-none")
}
});


//update
$("#update_select_barangay").change(function(){ 
  var barangay_name = $("#update_select_barangay").text();
  
  if(barangay_name.trim().length != 0)
  {
    $("#update_fieldset1").removeClass("d-none")
  }
  else
  {
    $("#update_fieldset1").addClass("d-none")
  }
});
}
//enable the form when a barangay is picked end 

// for select
function select_with_search_box()
{
$('select').selectize({
// maxItems: '1',
sortField: 'text'
});
$(".selectize-control").removeClass("form-control barangay-form")
}
// for select  end

//create date picker
function generate_age()
{
//adding (first add)
$("#birthdate").datepicker({
dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
});

$("#date_of_offense").datepicker({
  dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
  });

//updating
$("#update_birthdate").datepicker({
dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
});

$("#update_date_of_offense").datepicker({
  dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
  });
}
//create date picker end

//show data tables
function load_data_tables() {

  if ( ! $.fn.DataTable.isDataTable( '#juvenile_table' ) ) 
  { // check if data table is already exist

    table = $('#juvenile_table').DataTable({
      
      "deferRender": true,
      "dom": 'fBrtip',     
      //"processing": true,
      "serverSide": true,
      "ajax": "functions/show-juvenile.php",  
      scrollCollapse: true,

      "columns": [
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
        {
          targets: 10,
          render: function ( data ) {

              return '<div class = "d-flex gap-2 justify-content-end" >'+
              '<i onclick = "click_value(this.id)" class="shadow-sm align-middle update_juvenile_value update edit_btn btn btn-warning  fas fa-edit" data-coreui-toggle="modal" href="#update_juvenile" id="edit_juvenile_value '+data+'" role="button" ></i> '+
              '<i onclick = "click_value(this.id)" class="shadow-sm align-middle  del_btn fa-solid btn btn-danger  fa-trash-can" href="#delete_juvenile" data-coreui-toggle="modal" id="delete_juvenile_value '+data+'" role="button" ></i> '+
              '</div>'
          },
            
        }
      ],

      "lengthMenu": [[10, 15, 20, 25, 50], [10, 15, 20, 25, 50]],

      //disable the sorting of colomn
      "columnDefs": [ {
        "targets": 10,
        "orderable": false
        } ],
  
      "buttons": [
        {
            extend: 'copy',
            text: ' COPY',
  
            title: 'juvenile Delinquent Information System',
  
            messageTop: 'List of Barangay Admins',
            //className: 'fa fa-solid fa-clipboard',
            
  
            exportOptions: {
            modifier: {
                page: 'current'
            },
              //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2,3,4,5,6,7,8,9],
              // optional space between columns
              columnGap: 1
            }
  
        },
        { 
            extend: 'excel',
            text: ' EXCEL',
  
            title: 'juvenile Delinquent Information System',
  
            messageTop: 'List of juveniles',
            //className: 'fa fa-solid fa-table',  //<i class="fa-solid fa-clipboard"></i>
            
  
            exportOptions: {
            modifier: {
                page: 'current'
            },
              //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2,3,4,5,6,7,8,9],
              // optional space between columns
              columnGap: 1
            }
  
        },
        {
            extend: 'print',
            text: ' PDF',
  
            title: 'juvenile Delinquent Information System',
  
            messageTop: 'List of juveniles',
            //className: 'fa fa-print',
            
  
            exportOptions: {
            modifier: {
                page: 'current'
            },
              //columns: [0, 1] //r.broj kolone koja se stampa u PDF
              columns: [0,1,2,3,4,5,6,7,8,9],
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
    table.buttons().container().appendTo('#juvenile_table_wrapper .col-md-6:eq(0)');

  }

    //to align the data table buttons
    $("#juvenile_table_wrapper").addClass("row"); 
    
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

//erase form after closing
$("#close_juvenile").click(function()
{
  setTimeout(function()
  {
    var $select = $('#select_barangay').selectize();
    var control = $select[0].selectize;
    control.clear();

    $("#full_name").val("")
    $("#address").val("")
    $('#birthdate').val("");


    var $select = $('#gender').selectize();
    var control = $select[0].selectize;
    control.clear();


    var $select = $('#select_offense').selectize();
    var control = $select[0].selectize;
    control.clear();

    $("#date_of_offense").val("")
    $("#contact").val("")
    $("#email").val("");
  },100)
 
})
//erase form after closing end

//get the id of resident
function click_value(this_value)
{
  juvenile_id_value = this_value.substr(this_value.indexOf(" ") + 1);
}
//get the id of resident end

//submit new juvenile
$("#add_juvenile_btn").click(function()
{
  var crime_location = $("#select_barangay").val()
  var full_name = $("#full_name").val()
  var address = $("#address").val()

  //autog generate age
  var birthdate = $('#birthdate').val();
  var dob = new Date(birthdate);
  var today = new Date();
  var generate = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
  var age = generate;
  //end

  var gender = $("#gender").val();
  var offense = $("#select_offense").val()
  var date_of_offense = $("#date_of_offense").val()
  var contact_num = $("#contact").val()
  var email_address = $("#email").val();

  if (crime_location.trim().length === 0) //check if value is empty
  {
    $("#select_barangay").addClass("is-invalid");
    $("#select_brg_list .selectize-control").addClass("is-invalid");
  }
  else if(full_name.trim().length === 0) //check if value is empty
  {
    $("#full_name").addClass("is-invalid");
  }
  else if(address.trim().length === 0) //check if value is empty
  {
    $("#address").addClass("is-invalid");
  }
  else if (birthdate.trim().length === 0) //check if value is empty
  {
  $("#birthdate").addClass("is-invalid");
  }
  else if (gender.trim().length === 0) //check if value is empty
  {
   $("#gender").addClass("is-invalid");
   $("#select_gender_list .selectize-control").addClass("is-invalid");
  }
  else if (offense.trim().length === 0) //check if value is empty
  {
   $("#select_offense").addClass("is-invalid");
   $("#select_offense_list .selectize-control").addClass("is-invalid");
  }
  else if (date_of_offense.trim().length === 0) //check if value is empty
  {
  $("#date_of_offense").addClass("is-invalid");
  }
  else if (contact_num.trim().length === 0) //check if value is empty
  {
  $("#contact").addClass("is-invalid");
  $("#phno_validator_label").text("Please don't leave this area empty.")
  }
  else
  {

    function submit_new_juveniles()
    { 

      if(contact_num.charAt(0) === "9" && contact_num.length === 10 && allCharactersSame(contact_num) != true && line1(contact_num) != true && line2(contact_num) != true
      && line3(contact_num) != true && line4(contact_num) != true && line5(contact_num) != true  && line6(contact_num) != true) 
      {
        contact_num = "+63"+contact_num;
        $.post("functions/add-juvenile.php", {

          crime_location:crime_location,
          full_name:full_name,
          address:address,
          birthdate:birthdate,
          age:age,
          gender:gender,
          offense:offense,
          date_of_offense:date_of_offense,
          contact_num:contact_num,
          email_address:email_address

        },
        function (data, status) {
          alert_message(data)
        });
      }
      else
      {
        $("#contact").addClass("is-invalid");
        $("#phno_validator_label").text("Invalid phone number; please type a valid 10-digit Philippine phone number (e.g. 9123456789).");
      }

    }
    if (email_address.trim().length != 0) //check if value is empty
    {
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        if( !isEmail(email_address)) { 
            $("#email").addClass("is-invalid");
        }
        else
        {
          submit_new_juveniles();
        }
    }
    else
    {
      email_address = 'N/A'
      submit_new_juveniles();
    }

  }



})
//submit new juvenile end

//update juvenile
$("#update_juvenile_btn").click(function()
{

  var crime_location = $("#update_select_barangay").val()
  var full_name = $("#update_full_name").val()
  var address = $("#update_address").val()

  //autog generate age
  var birthdate = $('#update_birthdate').val();
  var dob = new Date(birthdate);
  var today = new Date();
  var generate = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
  var age = generate;
  //end

  var gender = $("#update_gender").val();
  var offense = $("#update_select_offense").val()
  var date_of_offense = $("#update_date_of_offense").val()
  var contact_num = $("#update_contact").val()
  var email_address = $("#update_email").val();

  if (crime_location.trim().length === 0) //check if value is empty
  {
    $("#update_select_barangay").addClass("is-invalid");
    $("#update_select_brg_list .selectize-control").addClass("is-invalid");
  }
  else if(full_name.trim().length === 0) //check if value is empty
  {
    $("#update_full_name").addClass("is-invalid");
  }
  else if(address.trim().length === 0) //check if value is empty
  {
    $("#update_address").addClass("is-invalid");
  }
  else if (birthdate.trim().length === 0) //check if value is empty
  {
  $("#update_birthdate").addClass("is-invalid");
  }
  else if (gender.trim().length === 0) //check if value is empty
  {
   $("#update_gender").addClass("is-invalid");
   $("#update_select_gender_list .selectize-control").addClass("is-invalid");
  }
  else if (offense.trim().length === 0) //check if value is empty
  {
   $("#update_select_offense").addClass("is-invalid");
   $("#update_select_offense_list .selectize-control").addClass("is-invalid");
  }
  else if (date_of_offense.trim().length === 0) //check if value is empty
  {
  $("#update_date_of_offense").addClass("is-invalid");
  }
  else if (contact_num.trim().length === 0) //check if value is empty
  {
  $("#update_contact").addClass("is-invalid");
  $("#update_phno_validator_label").text("Please don't leave this area empty.")
  }
  else
  {

    function update_juveniles()
    { 
      if(contact_num.charAt(0) === "9" && contact_num.length === 10 && allCharactersSame(contact_num) != true && line1(contact_num) != true && line2(contact_num) != true
      && line3(contact_num) != true && line4(contact_num) != true && line5(contact_num) != true  && line6(contact_num) != true) 
      {
        contact_num = "+63"+contact_num;
        $.post("functions/update-juvenile.php", {

          crime_location:crime_location,
          full_name:full_name,
          address:address,
          birthdate:birthdate,
          age:age,
          gender:gender,
          offense:offense,
          date_of_offense:date_of_offense,
          contact_num:contact_num,
          email_address:email_address,
          juvenile_id_value:juvenile_id_value

        },
        function (data, status) {
          alert_message(data)
        });
      }
      else
      {
        $("#update_contact").addClass("is-invalid");
        $("#update_phno_validator_label").text("Invalid phone number; please type a valid 10-digit Philippine phone number (e.g. 9123456789).");
      }

    }
    if (email_address.trim().length != 0) //check if value is empty
    {
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        if( !isEmail(email_address)) { 
            $("#update_email").addClass("is-invalid");
        }
        else
        {
          update_juveniles();
        }
    }
    else
    {
      email_address = 'N/A'
      update_juveniles();
    }

  }

})
//update juvenile end

//delete juvenile record
$("#delete_juvenile_records").click(function()
{
  $.post("functions/delete-juvenile.php", {
    juvenile_id_value:juvenile_id_value
  },
  function (data, status) {
    alert_message(data)
  });
})
//delete juvenile record end

//trigger error messages
function alert_message(a)
{
var confirmation = a;

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

if(confirmation == 1)
{
$('#add_juvenile').modal('toggle');


var $select = $('#select_barangay').selectize();
var control = $select[0].selectize;
control.clear();

$("#full_name").val("")
$("#address").val("")
$('#birthdate').val("");


var $select = $('#gender').selectize();
var control = $select[0].selectize;
control.clear();


var $select = $('#select_offense').selectize();
var control = $select[0].selectize;
control.clear();

$("#date_of_offense").val("")
$("#contact").val("")
$("#email").val("");

toastMixin.fire({
  animation: true,
  title: 'A new juvenile record has been added.'
});
table.ajax.reload( null, false);
}
else if(confirmation == 3)
{
$('#update_juvenile').modal('toggle');

toastMixin.fire({
  animation: true,
  title: 'A juvenile record has been updated.'
});
table.ajax.reload( null, false);
}
else if(confirmation == 4)
{

toastMixin.fire({
  animation: true,
  title: 'A juvenile record has been deleted.'
});
table.ajax.reload( null, false);
}
else
{
toastMixin.fire({
  animation: true,
  title: 'Something went wrong.',
  icon: 'error'
});
setTimeout(function(){
},3000);
}
}
//trigger error messages

//get the table cell value when selected
function get_juvenile_table_cell_value()
{

$("#juvenile_table").on('click','.update_juvenile_value',function(){

    var currentRow=$(this).closest("tr");
    var col0=currentRow.find("td:eq(0)").text().trim($(this).text()); // get current row 1st TD value
    var col1=currentRow.find("td:eq(1)").text().trim($(this).text()); // get current row 1st TD value
    var col3=currentRow.find("td:eq(3)").text().trim($(this).text()); // get current row 1st TD value
    var col4=currentRow.find("td:eq(4)").text().trim($(this).text()); // get current row 1st TD value
    var col5=currentRow.find("td:eq(5)").text().trim($(this).text()); // get current row 1st TD value
    var col6=currentRow.find("td:eq(6)").text().trim($(this).text()); // get current row 1st TD value
    var col7=currentRow.find("td:eq(7)").text().trim($(this).text()); // get current row 1st TD value
    var col8=currentRow.find("td:eq(8)").text().trim($(this).text()); // get current row 1st TD value
    var col9=currentRow.find("td:eq(9)").text().trim($(this).text()); // get current row 1st TD value

    var $select = $("#update_select_barangay").selectize();
    var selectize = $select[0].selectize;
    selectize.setValue(selectize.search(col8).items[0].id);

    $("#update_full_name").val(col0)
    $("#update_address").val(col4)

    col1 = new Date(col1)
    col1 = col1.getFullYear()+"-"+String(col1.getMonth() + 1).padStart(2, '0')+"-"+String(col1.getDate()).padStart(2, '0');
    $('#update_birthdate').val(col1);

    var $select = $("#update_gender").selectize();
    var selectize = $select[0].selectize;
    selectize.setValue(selectize.search(col3).items[0].id);

    var $select = $("#update_select_offense").selectize();
    var selectize = $select[0].selectize;
    selectize.setValue(selectize.search(col7).items[0].id);

    col9 = new Date(col9)
    col9 = col9.getFullYear()+"-"+String(col9.getMonth() + 1).padStart(2, '0')+"-"+String(col9.getDate()).padStart(2, '0');
    $("#update_date_of_offense").val(col9)

    $("#update_contact").val(col6.substr(3))

    if(col5 === 'N/A')
    {
      $("#update_email").val("")
    }
    else
    {
      $("#update_email").val(col5)
    }



});

}
//get the table cell value when selected end
