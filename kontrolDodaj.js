 document.getElementById("spremi").onclick=function(e){

                    var slanje=true;

                    var naslov = document.getElementById("naslov").value;
                    var opis = document.getElementById("opis").value;
                    
                    if (naslov.length<5 || naslov.length>30){
                        slanje=false;
                        document.getElementById("naslov").style.border="2px solid red";
                        document.getElementById("naslovHelp").innerHTML="Naslov mora imati 5 do 30 znakova!";
                    } else {
                        document.getElementById("username").style.border="1px solid gray";
                        document.getElementById("usernameHelp").innerHTML="";
                    }
					
                    if (opis.length<1 || opis.length>1000){
                        slanje=false;
                        document.getElementById("opis").style.border="2px solid red";
                        document.getElementById("opisHelp").innerHTML="Bilješka mora imati 1 do 1000 znakova!";
                    } else {
                        document.getElementById("opis").style.border="1px solid gray";
                        document.getElementById("opisHelp").innerHTML="";
                    }
					

                    if (!slanje){
                       e.preventDefault();

                    } 
                }