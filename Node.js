$.getJSON("https://api.covid19api.com/premium/country/testing/south-africa", function (data1){
        console.log(data1);
    var biontech = data1.data.vaccination.biontech;
    var moderna= data1.data.vaccination.moderna;
    var astraZeneca = data1.data.vaccination.astraZeneca;
    $(".biontech").append(biontech);
    $(".moderna").append(moderna);
    $(".astraZeneca").append(astraZeneca);
    
});
