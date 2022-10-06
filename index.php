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
                background: black;
            }
            .three{
                background:pink;
            }
            .navigation{
                position:fixed;
                top:0;
                height:50px;
                background-image:linear-gradient(to right,black,transparent);
                z-index:1;
            }

            .navigation ul{
                float:right;
                display:flex;
                height:100%;
                align-items: center;
            }
            .navigation ul li{
                display:inline;
                font-size:30px;
                padding:0 20px;
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
            .main{
                width:100%;
                height:100%;
                display:flex;
                flex-direction:row;
                justify-content:center;
                overflow:hidden;
            }
            .sub{
                height:100%;
                width:100%;
                background:blue;
                border:2px solid black;
                float:left;
                overflow:hidden;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                filter:grayscale(1);
                
            }
            #sub1{
                 background:url(party1.jpeg);
                 background-size:cover;
                 background-repeat:no-repeat;
            }
            #sub2{
                background:url("party2.jpeg");
                background-size:cover;
                background-repeat:no-repeat;
            }
            #sub3{
                background:url("party3.jpeg");
                background-size:cover;
                background-repeat:no-repeat;
            }
            #sub4{
                background:url("party4.jpeg");
                background-size:cover;
                background-repeat:no-repeat;
            }
            .sub p{
                width:100%;
                text-align:center;
                color:white;
                font-size:3em;
                background:rgba(0,0,0,.5);
            }
            .sub:hover{
                filter:grayscale(0);
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
                    <div class="main">
                        
                    </div>

                </div>
                <div id="events" class="section two">
                    <div class="main">
                        <div id="sub1" class="sub">
                            <p>Sweet 16's</p>
                        </div>
                        <div id="sub2" class="sub">
                            <p>Mitzfah</p>
                        </div> 
                        <div id="sub3" class="sub">
                            <p>Wedding</p>
                        </div>
                        <div id="sub4" class="sub">
                            <p>Other</p>
                        </div>
                    </div>
                </div>
                
                <div id="contact" class="section three">
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
            let count = 0;
            let sectionArr = ['home','events','contact'];
            var timer;
            
            
            window.onload = () => {
                sizeUp();
            };
            
            window.addEventListener("resize", sizeUp);
            

            
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
                outer_wrapper.scrollTo({
                   left:document.getElementById(sectionArr[count]).offsetLeft,
                    behavior:'instant'
                });
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
