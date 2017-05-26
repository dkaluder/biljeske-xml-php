 document.getElementById("spremi").onclick=function(e){

                    var slanje=true;

                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    var ime = document.getElementById("ime").value;
                    var prezime = document.getElementById("prezime").value;
					

                   

                    if (username.length<5 || username.length>30){
                        slanje=false;
                        document.getElementById("username").style.border="2px solid red";
                        document.getElementById("usernameHelp").innerHTML="Username mora imati 5 do 30 znakova!";
                    } else {
                        document.getElementById("username").style.border="1px solid gray";
                        document.getElementById("usernameHelp").innerHTML="";
                    }
					
                    if (password.length<7 || password.length>30){
                        slanje=false;
                        document.getElementById("password").style.border="2px solid red";
                        document.getElementById("passwordHelp").innerHTML="Password mora imati 8 do 30 znakova!";
                    } else {
                        document.getElementById("password").style.border="1px solid gray";
                        document.getElementById("passwordHelp").innerHTML="";
                    }
					
                    if (ime.length<5 || ime.length>30){
                        slanje=false;
                        document.getElementById("ime").style.border="2px solid red";
                        document.getElementById("imeHelp").innerHTML="Ime mora imati 5 do 30 znakova!";
                    } else {
                        document.getElementById("ime").style.border="1px solid gray";
                        document.getElementById("imeHelp").innerHTML="";
                    }
					
                    if (prezime.length<5 || prezime.length>30){
                        slanje=false;
                        document.getElementById("prezime").style.border="2px solid red";
                        document.getElementById("prezimeHelp").innerHTML="Prezime mora imati 5 do 30 znakova!";
                    } else {
                        document.getElementById("prezime").style.border="1px solid gray";
                        document.getElementById("prezimeHelp").innerHTML="";
                    }
					
					

                    if (!slanje){
                       e.preventDefault();

                    } 
                }