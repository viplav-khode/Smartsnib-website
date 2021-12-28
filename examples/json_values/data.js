
var xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
             var myObj = JSON.parse(this.responseText);
                for(var i=0; i< 12; i++)
                    console.log(myObj["SEPT"]);
        }
    };
    xmlhttp.open("GET", "json_data.php", true);
    xmlhttp.send();