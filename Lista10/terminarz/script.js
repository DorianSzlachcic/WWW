function tyg(obj){
    
    for(let x of obj){
        x["date"] = sqlDatetoJSDate(x["date"]);

        var div = document.createElement('div');
        div.style = 'height: '+x["duration"].toString()+'px;';
        div.style.top = (120 + 60*x["date"].getHours() + 3 + x["date"].getHours() + x["date"].getMinutes()).toString() +"px";
        div.style.left = (100+100*x["date"].getDay() + 2 + x["date"].getDay()).toString() + "px";
        console.log(x["date"].getDay());
        div.id = x['name'];
        div.className = "tygtermin";
        div.innerHTML = x['name'];
        document.querySelector("#tyg").appendChild(div);
    }
}

function mies(obj){
    for(let x of obj){
        x["date"] = sqlDatetoJSDate(x["date"]);

        var div = document.createElement('div');
        div.id = x['name'];
        div.className = "miestermin";
        if(x["date"].getMinutes()<10)
            div.innerHTML = x['name'] +" "+ x["date"].getHours().toString() + ":0" + x["date"].getMinutes().toString();
        else
            div.innerHTML = x['name'] +" "+ x["date"].getHours().toString() + ":" + x["date"].getMinutes().toString();
        
        if(x["date"].getDate()<10)
            document.querySelector("#d0"+x["date"].getDate().toString()).appendChild(div);
        else
            document.querySelector("#d"+x["date"].getDate().toString()).appendChild(div);
    }
}

function sqlDatetoJSDate(dateStr){
    var a=dateStr.split("T");
    var d=a[0].split("-");
    var t=a[1].split(":");
    return new Date(parseInt(d[0]),parseInt(d[1])-1,parseInt(d[2]),parseInt(t[0]),parseInt(t[1]));
}