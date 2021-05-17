
$.getJSON("http://api.openweathermap.org/data/2.5/weather?q=london&appid=567c412ec130c78367279c09cf9317f3", function (data){
    console.log(data);
    
    var icon = "https://openweathermap.org/img/w/" + data.weather[0].icon + ".png";
    var temp = data.main.temp;
    var weather = data.weather[0].main;
    $(".icon").attr("src",icon);
    $(".temp").append(temp);
    $(".weather").append(weather);
    
});
