     var countr= new Array();
   //var  countr = [];
   var deathes=new Array();
  $.getJSON("https://api.covid19api.com/summary", function(data1){
        console.log(data1);
    
   
        for (var i = 0; i < 190; i++) {
               deathes[i]= data1.Countries[i].TotalDeaths;
               countr[i] =data1.Countries[i].Country;
       }
//     
    });
    console.log(countr,deathes);
    
//    var myJSONText = JSON.stringify( countr[1] );
//   $.ajax({
//       url: "API.php",
//       method: "POST",
//       data: {emps :JSON.stringify(countr)},
//       success: function() {
//            
//       }
//     
//     
//  });
