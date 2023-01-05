

var current_year = new Date();
var current_year_dd = String(current_year.getDate()).padStart(2, '0');
var current_year_mm = String(current_year.getMonth() + 1).padStart(2, '0');
var current_year_yyyy = current_year.getFullYear();

var date_range_from = current_year_yyyy + '-' + current_year_mm + '-' + '01';
var date_range_to = current_year_yyyy + '-' + current_year_mm + '-' + current_year_dd;

var x_value = [];
var y_value = [];
var x_y_value = "";
var xValues = "";
var yValues = ""; 
var myColors=[];
var myPoints=[]
var sort = "asc";

$(document).ready(function () {
    $(document).attr("title", "JDIS | Dashboard");
    $(".this_month").text(getMonthName(current_year_mm)+", "+current_year_yyyy)
    $("#current_day").text(getMonthName(current_year_mm)+" "+current_year_dd+", "+current_year_yyyy)
    jv_charts()
    jv_total_for_this_month()
    newly_added_jv()
    load_data_tables()
    
});

//remove first word from string
function removeFirstWord(str) {
const indexOfSpace = str.indexOf(' ');

if (indexOfSpace === -1) {
    return '';
}

return str.substring(indexOfSpace + 1);
}
//remove first word from string end

//remove last word from a string
function removeLastWord(str) {
const lastIndexOfSpace = str.lastIndexOf(' ');

if (lastIndexOfSpace === -1) {
    return str;
}
return str.substring(0, lastIndexOfSpace);
}
//remove last word from a string end

//convert month number into words
function getMonthName(monthNumber) {
const date = new Date();
date.setMonth(monthNumber - 1);
return date.toLocaleString('en-US', { month: 'long' });
}
//convert month number into words end

//initalize chart values
function chart_array()
{

$.ajaxSetup({async:false});
$.getJSON('functions/dashboard.php', 
{
  offenses:'set',
  date_range_from:date_range_from,
  date_range_to:date_range_to,
}, 

function (data, textStatus, jqXHR) 
{
  x_y_value = data;
  
});

console.log(x_y_value)
  
  var textArr = x_y_value;
  var jv_total_arr = [];
  var Juveniles_arr = [];
  $.each(textArr,function(index,x_y){

  jv_total =  removeFirstWord(x_y) 

  Juveniles = removeLastWord(x_y)
  Juveniles = Juveniles.split('_').join(' ') 

  var single_jv_total = parseInt(jv_total)
  var single_Juveniles = Juveniles

  jv_total_arr.push(single_jv_total);
  Juveniles_arr.push(single_Juveniles);
  
  });

  x_value = Juveniles_arr
  y_value = jv_total_arr

  if(sort === "asc")
  {
      //sorting algorithm
      arrayOfObj = x_value.map(function(d, i) {
        return {
          label: d,
          data: y_value[i] || 0
        };
      });
      
      sortedArrayOfObj = arrayOfObj.sort(function(a, b) {
        return a.data - b.data;
      });
      
      newArrayLabel = [];
      newArrayData = [];
      sortedArrayOfObj.forEach(function(d){
        newArrayLabel.push(d.label);
        newArrayData.push(d.data);
      });
      ////sorting algorithm
  }
  else if(sort === "desc")
  {
      //sorting algorithm
      arrayOfObj = x_value.map(function(d, i) {
        return {
          label: d,
          data: y_value[i] || 0
        };
      });
      
      sortedArrayOfObj = arrayOfObj.sort(function(a, b) {
        return b.data - a.data ;
      });
      
      newArrayLabel = [];
      newArrayData = [];
      sortedArrayOfObj.forEach(function(d){
        newArrayLabel.push(d.label);
        newArrayData.push(d.data);
      });
      ////sorting algorithm
  }


  x_value = newArrayLabel;
  y_value = newArrayData;

  xValues = x_value;
  yValues = y_value; 

  var sum = 0;
  $.each(yValues, function(index, value) {
    sum += value;
  });

  //generate a color base on percentage
  $.each(yValues, function( index,value ) {

    if(parseInt(value) <= 20)
    {
      myColors[index] = '#2eb85c'
    }
    else if(parseInt(value) <= 30)
    {
      myColors[index] = '#f9b115'
    }
    else if(parseInt(value) <= 60)
    {
      myColors[index] = '#fd7e14'
    }
    else 
    {
      myColors[index] = '#e55353'
    }

  
  });

}
//initalize chart values end

//number of residents chart
function jv_charts()
{
  chart_array()
  //console.log(x_value)
  const data_sets = [{
    label: "",
    data: yValues,
    backgroundColor: myColors,
    borderColor: myColors,
    borderWidth: 1,
    borderRadius: 8,
    pointRadius: myPoints,
    borderSkipped: false,
    barPercentage: 0.8,
    categoryPercentage:0.8,
    //poinStyle: 'circle'
  },]


  //initialize chart
  const ctx = $('#jvChart');
  myChart = new Chart(ctx, {
  type: 'bar',
  options: {
    pointStyle: "circle",
    indexAxis: 'x',
    scales: {
      x: {
        beginAtZero: true,
        grid: {
          display: false,
          drawBorder: false
        },
        ticks: {
          padding: 20,
          display: false,
          color: '#6d6a6a',
          font: {
            size: 10,
        }
        }
      },
      y: {
        beginAtZero: true,
        grid: {
          display: false,
          drawBorder: false
        },
        ticks: {
          padding: 25,
          display: false,
          color: '#6d6a6a',
        },
        type: 'linear',
        grace: '5%'
      },

    },
    plugins: {
        responsive: true,
        legend: {
            display: false,
        },
        tooltip: {
          enabled: true,
          displayColors: false,
          usePointStyle: true,
          xAlign:'center',
          yAlign:'top',
          padding: {
                left: 15,
                right: 15,
                top: 15,
                bottom: 15
          },
          caretSize: 10,
          cornerRadius: 15,
          caretPadding: 0,
          callbacks: {
              label: function(context) { 

                var modified_label = parseInt(context.parsed.y).toLocaleString('en-US')+" documented Juveniles in total"
                if(context.parsed.y == 1)
                {
                  var modified_label = parseInt(context.parsed.y).toLocaleString('en-US')+" documented Juvenile in total"
                }

                return modified_label           
              
            },
            afterLabel: function(context) {

                  var sum = 0;
                  $.each(yValues, function(index, value) {
                    sum += value;
                  });

                var percentage_display = (parseInt(context.parsed.y) / sum) * 100
                var modified_label = +parseInt(percentage_display).toLocaleString('en-US')+"%"        
                return ''
              },
            labelPointStyle: function(context) {
              return {
                  pointStyle: 'rectRounded',
                  rotation: 0,
              };
            }

          },
          backgroundColor: '#ffffff',
          bodyColor: "#626464",
          titleColor:  "#626464",
          borderColor: "#dee0e0",
          borderWidth: 1,
          bodySpacing: 2,
          titleMarginBottom: 10
        },
        
    }

  },
  
  data: {
      labels: xValues,
      dataSorting: {
        enabled: true
      },
      datasets: data_sets
  },
});

$("#jvChart").addClass("rounded-4 p-0 bg-opacity-50 border border-3 py-3 mx-3")



}
//number of residents chart end

//update chart
function update_chart()
{
chart_array();
myChart.data.labels = x_value;
myChart.data.datasets[0].data = y_value;
myChart.update();
}
//update chart end

//sort chart
$("#sort_chart").click(function(e){
 
  if(sort === "desc")
  {
    sort = "asc"
  }
  else if(sort === "asc")
  {
    sort = "desc"
  }
  update_chart()
})
//sort chart end

//total jv for current month
function jv_total_for_this_month()
{
    var total_jv_variable
    $.ajaxSetup({async:false});
    $.getJSON('functions/dashboard.php', 
    {
    total_jv:'set',
    date_range_from:date_range_from,
    date_range_to:date_range_to,
    }, 

    function (data, textStatus, jqXHR) 
    {
        total_jv_variable = data;
    
    });
    

    $(".total_jv").text(parseInt(total_jv_variable).toLocaleString('en-US'));
}
//total jv for current month end

//newly added juveniles
function newly_added_jv()
{
    var newly_added_jv_variable
    $.ajaxSetup({async:false});
    $.getJSON('functions/dashboard.php', 
    {
        new_jv:'set',
        date_range_to:date_range_to,
    }, 

    function (data, textStatus, jqXHR) 
    {
        newly_added_jv_variable = data;
    
    });
    
    $("#new_jv").text(parseInt(newly_added_jv_variable).toLocaleString('en-US'));
}
//newly added juveniles end

//show data tables
function load_data_tables() {

    var ajax_url = "functions/dashboard.php";

    if ( ! $.fn.DataTable.isDataTable( '#juvenile_table' ) ) 
    { // check if data table is already exist
  
      table = $('#juvenile_table').DataTable({
        
        "deferRender": true,
        "dom": 'p',
        "pageLength": 10,
        //"processing": true,
        "serverSide": true,
        "ajax": {
            url: ajax_url,
            data: {
              jv_list: 'set',
              date_range_from:date_range_from,
              date_range_to:date_range_to,
            },
            "dataSrc": function ( json ) {
              //Make your callback here.
             // console.log(json)
              return json.data;
          }      
        }, 
  
        "columns": [
            null,
            null,
            null,
            null,
            null,
            null,
        ],
    
      });
      table.buttons().container().appendTo('#juvenile_table_wrapper .col-md-6:eq(0)');
    }
  
      //to align the data table buttons
      $("#juvenile_table_wrapper").addClass("row"); 


      $(".dataTables_paginate ").detach().appendTo('#table_page')
      $(".dataTables_paginate ").addClass("col-lg-12 d-flex justify-content-center justify-content-lg-start justify-content-md-center justify-content-sm-center ")
      $(".form-control").addClass("shadow-sm");
      $(".form-select").addClass("shadow-sm");
  };
  //show data tables end