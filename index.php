<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Versatile DJ's</title>
        <style>
            *{
                margin:0;
                padding:0;
            }
            html{
            }
            .outer_wrapper{
                overflow-x:hidden;
            }
            .inner_wrapper{
            }
            .section{
               float:left;
            }
            .one{
                background: blue;
            }
            .two{
                background: red;
            }
            .three{
                background:pink;
            }
            .navigation{
                position:fixed;
                top:0;
                height:50px;
                background-image:linear-gradient(to right,black,transparent);
            }

            .navigation ul{
                float:right;
            }
            .navigation ul li{
                display:inline;
                font-size:30px;
                padding:20px;
            }
            .button{
                height:100%;
                width:50px;
                background:black;
            }
            .h_wrapper{
                position:relative;
                bottom:0;
                left:0;
                color:white;
            }
            .h_wrapper h1{
                transform: rotate(-90deg);
            }
            
        </style>
        <script>
            
        </script>
    </head>
    <body>
        <div class="navigation_background">
        </div>
        <div class="navigation">
            <ul>
                <li onclick="test('home')">Home</li>
                <li onclick="test('events')">Events</li>
                <li onclick="test('contact')">Contact</li>
            </ul>
        </div>
        <div class="outer_wrapper">
            <div class="inner_wrapper">
                <div id="home" class="section one">
                    <div class="button">
                        <div class="h_wrapper">
                            <h1>Home</h1>
                        </div>
                    </div>
                    <div class="main">
                        
                    </div>

                </div>
                <div id="events" class="section two">
                    <div class="button">
                        <h1>Events</h1>
                    </div>
                    <div class="main">
                        
                    </div>
                </div>
                
                <div id="contact" class="section three">
                    <div class="button">
                        <h1>Contact</h1>
                    </div>
                    <div class="main">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            let body = document.getElementsByTagName("body")[0];
            let outer_wrapper = document.getElementsByClassName("outer_wrapper")[0];
            let inner_wrapper = document.getElementsByClassName("inner_wrapper")[0];
            let sections = document.getElementsByClassName("section");
            let navigation = document.getElementsByClassName("navigation")[0];
            let navigation_background = document.getElementsByClassName("navigation_background")[0];
            let buttons = document.getElementsByClassName("button")[0];
            
            window.onload = () => {
                sizeUp();
            };
            
            window.addEventListener("resize", sizeUp);
            
            let count = 0;
            let sectionArr = ['home','events','contact'];
            var timer;
            
            outer_wrapper.addEventListener("wheel", (evt) => {
              evt.preventDefault();
              clearTimeout(timer);
              timer = setTimeout(function(){
                if(evt.deltaY > 0){
                  if(count < 2){
                     count++; 
                     test(sectionArr[count]);
                  }
                } else {
                    if(count > 0){
                       count--; 
                       test(sectionArr[count]);
                    }

                }
              },50);

//              console.log(evt.deltaY + " " + count);
//              outer_wrapper.scrollLeft += evt.deltaY;
            }); 
            
            function sizeUp(){
                body.style.width = window.innerWidth + "px";
                body.style.height = window.innerHeight + "px";
                outer_wrapper.style.width = window.innerWidth + "px";
                outer_wrapper.style.height = window.innerHeight + "px";
                inner_wrapper.style.width = (window.innerWidth * sections.length) + "px";
                inner_wrapper.style.height = window.innerHeight + "px";
                for(let section of sections){
                    section.style.width = window.innerWidth + "px";
                    section.style.height = window.innerHeight + "px";
                }
                navigation.style.width = window.innerWidth + "px";
                navigation_background.style.width = window.innerWidth + "px";
            }
            
            function test(input){
                let myElement = document.getElementById(input);
                var leftPos = myElement.offsetLeft;
                outer_wrapper.scrollTo({
                    left:leftPos,
                    behavior:'smooth'
                });
                if(input === 'home'){
                     count = 0;
                }
                if(input === 'events'){
                    count = 1;
                }
                if(input === 'contact'){
                    count = 2;
                }
            }
        </script>
    </body>
</html>
