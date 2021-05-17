     var countr= new Array();
   //var  countr = [];
  $.getJSON("https://api.covid19api.com/summary", function(data1){
        console.log(data1);
    
    // var  countr =[];
    for (var i = 0; i < 190; i++) {
  
    var deathes= data1.Countries[i].TotalDeaths;
    //var astraZeneca = data1.data.vaccination.astraZeneca;
        countr =data1.Countries[i].Country;
        $(".country").append(countr + "\\   ");
        
        $(".deathe").append(deathes);
    }
         
    });
    
    var myJSONText = JSON.stringify( countr[1] );
   $.ajax({
       type: "POST",
       url: "API.php",
       data: "activitiesArray="+myJSONText,
       success: function() {
            $("#lengthQuestion").fadeOut('slow');
       }
    });
   