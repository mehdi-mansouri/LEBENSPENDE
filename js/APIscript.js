     /* global data1 */

$.getJSON("https://api.covid19api.com/summary", function(data1){
        console.log(data1);
     var  countr = data1.Countries[0].Country;
  // var  countr =[];
    for (var i = 0; i < 190; i++) {
  
    //var deathes= data1.Countries[i].TotalDeaths;
//    var astraZeneca = data1.data.vaccination.astraZeneca;
        countr =data1.Countries[i].Country;
        $(".country").append(countr + "\\")
        
      $(".deathe").append(deathes)
    }
         
    };

   