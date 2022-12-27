var current_year = new Date();
var current_year_dd = String(current_year.getDate()).padStart(2, '0');
var current_year_mm = String(current_year.getMonth() + 1).padStart(2, '0');
var current_year_yyyy = current_year.getFullYear();

var one_year_past = new Date(current_year);
one_year_past.setFullYear(one_year_past.getFullYear() - 1);
var one_year_past_dd = String(one_year_past.getDate()).padStart(2, '0');
var one_year_past_mm = String(one_year_past.getMonth() + 1).padStart(2, '0');
var one_year_past_yyy = one_year_past.getFullYear();

var current_year_from = one_year_past_yyy + '-' + one_year_past_mm + '-' + one_year_past_dd;
var current_year_to = current_year_yyyy + '-' + current_year_mm + '-' + current_year_dd;

var query_click = "unclicked"
var crime_location = "default"
var date_range_from = current_year_from
var date_range_to = current_year_to
var gender = "default"
var max_age = "default"
var min_age = "default"
var offense_type = "default"

var gender_text = '';
var crime_location_text = '';
var offense_type_text = '';

var x_value = [];
var y_value = [];
var x_y_value = "";
var xValues = "";
var yValues = ""; 
var myColors=[];
var myPoints=[]
var sort = "names";


$(document).ready(function () {
    $(document).attr("title", "JDIS | Generate Statistics");
    $("#range_from").val(current_year_from)
    $("#range_to").val(current_year_to)
    stats_info()
    select_list()
    date_range() 
    jv_charts()
});

// selectize ordinary
function select_list() 
{
  $('.select_list').selectize({
    // maxItems: '1',
    sortField: 'text'
    });
}
// selectize ordinary end

//date picker
function date_range()
{

  $("#range_from").datepicker({
    dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
    });


    $("#range_to").datepicker({
        dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
        });

}
//date picker end

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
$.getJSON('functions/generate_statistics.php', 
{
  time:'set',
  query_click:query_click,
  crime_location:crime_location,
  offense_type:offense_type,
  gender:gender,
  max_age:max_age,
  min_age:min_age,
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

  if(Juveniles === "Invalid date")
  {
    single_Juveniles = "No Records Found"
    single_jv_total = 'Invalid'
  }

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
  else if(sort === "names")
  {
          //sorting algorithm
          arrayOfObj = x_value.map(function(d, i) {
            return {
              label: d,
              data: y_value[i] || 0
            };
          });
          
          sortedArrayOfObj = arrayOfObj.sort(function(a, b) {
            return a.label - b.label;
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
     backgroundColor: '#d3d9e6ff',
     pointBackgroundColor: '#6c7685',
     pointHoverBackgroundColor: '#6c7685',
     borderColor: '#6c7685',
     borderWidth: 2,
     //borderRadius: 8,
     pointRadius: 1,
     hoverRadius:5,
     borderSkipped: true,
     barPercentage: 0.8,
     categoryPercentage:0.8,
     fill: true,
     tension: 0.3
    // stepped: true,
   },]


  //initialize chart
  const ctx = $('#jvChart');
  myChart = new Chart(ctx, {
  type: 'line',
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
          display: true,
          color: '#6d6a6a',
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
          display: true,
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
                return modified_label
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
        labelPointStyle: function(context) {
            return {
                pointStyle: 'rectRounded',
                rotation: 0,
            };
          }
        
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

$("#jvChart").addClass("rounded-4 p-0 border-3 border bg-opacity-50")
$("#jvChart").css("background-color","#ffffffff")


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

//filter chart
$("#submit_filter_time").click(function()
{
  var validator = true
  var crime_location_filter_variable = $("#offense_location_select").val()
  var date_range_from_filter_variable = $("#range_from").val()
  var date_range_to_filter_variable = $("#range_to").val()
  var gender_filter_variable = $("#gender_select").val()
  var min_age_filter_variable = $("#age_min").val()
  var max_age_filter_variable = $("#age_max").val()
  var offense_type_filter_variable = $("#offense_type_select").val()

  var d_from = new Date(date_range_from_filter_variable)
  var d_to = new  Date(date_range_to_filter_variable)
  min_age_filter_variable = parseInt(min_age_filter_variable);
  max_age_filter_variable = parseInt(max_age_filter_variable);

  if(!isNaN(max_age_filter_variable) && min_age_filter_variable > max_age_filter_variable)
  {
    $("#age_max").addClass("is-invalid");
    $("#age_max").val("");
    validator =false
  }

  if(isNaN(min_age_filter_variable))
  {
      min_age =  "default";
  }
  else
  {
      min_age = min_age_filter_variable;
  }

  if(isNaN(max_age_filter_variable))
  {
      max_age =  "default";
  }
  else
  {
      max_age = max_age_filter_variable;
  }

  if(gender_filter_variable.trim().length != 0)
  {
      gender = gender_filter_variable;
      gender_text = $("#gender_select").text()
  }
  else
  {
      gender = "default"
      gender_text = "";
  }

  if(crime_location_filter_variable.trim().length != 0)
  {
      crime_location = crime_location_filter_variable;
      crime_location_text = $("#offense_location_select").text()
  }
  else
  {
      crime_location = "default"
      crime_location_text = ""
  }

  if(offense_type_filter_variable.trim().length != 0)
  {
      offense_type = offense_type_filter_variable;
      offense_type_text = $("#offense_type_select").text()
  }
  else
  {
      offense_type = "default"
      offense_type_text = ""
  }
  
  if(date_range_from_filter_variable.trim().length === 0)
  {
      $("#range_from").addClass("is-invalid");
      validator =false
  }
  else if(date_range_to_filter_variable.trim().length === 0)
  {
      $("#range_to").addClass("is-invalid");
      validator =false
  }
  else if(d_from > d_to)
  {
    $("#range_to").addClass("is-invalid");
    validator =false
  }

  if(validator === true)
  {
      query_click = "clicked"
      sort = "names"
      date_range_from = date_range_from_filter_variable;
      date_range_to = date_range_to_filter_variable;

      update_chart()

      $('#filter_time').modal('toggle');
      stats_info()
  }


  
})
//filter chart end

//sort chart
$("#sort_jv").click(function(e){
 
  if(sort === "names")
  {
    sort = "asc"
  }
  else if(sort === "asc")
  {
    sort = "desc"
  }
  else
  {
    sort = "names"
  }
  update_chart()
})
//sort chart end

//statistic info
function stats_info()
{
    var results =  [];
    let a = 0

    if(min_age != "default")
    {
      results[a] = "  Min Age: "+min_age+""
      a+=1
    }
    if(max_age != "default")
    {
      results[a] = "  Max Age: "+max_age+""
      a+=1
    }
    if(offense_type != "default")
    {
      results[a] = "  Offense: "+offense_type_text
      a+=1
    }
    if(crime_location != "default")
    {
      results[a] = "  Offense Location: "+crime_location_text
      a+=1
    }
    if(gender != "default")
    {
      results[a] = "  Gender: "+gender_text
      a+=1
    }
    if(date_range_from != "default")
    {
      let dateStr = date_range_from;
      let dateObj = new Date(dateStr);
      let readableDate = dateObj.toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
      results[a]  = "  Min Date: "+readableDate+""
      a+=1
    }
    if(date_range_to != "default")
    {
      let dateStr = date_range_to;
      let dateObj = new Date(dateStr);
      let readableDate = dateObj.toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
      results[a] = "  Max Date: "+readableDate+""
      a+=1
    }

    if (results.length > 0) 
    {
      $("#information_here").html("<span>"+results+"</span>")
    }
    else
    {
      $("#information_here").html("")
    }
}
//statistic info end

