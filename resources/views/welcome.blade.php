<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wicode</title>

    </head>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <body class="antialiased">  
        <div class="center_title"> GET OUT OF HERE </div>
         <div class="container">
            <img class="fries" src={{ asset('img/fries.png') }}>
            <img class="explosion" src={{ asset('img/explosion.png') }}>
            <img class="duke" src={{ asset('img/duke.png') }}>
            <img class="senders_tete" src={{ asset('img/senders_tete.png') }}>
            <div id="id_balle"> </div>
            <div id="id_balle2"> </div>
            <img class="chicken" src={{ asset('img/senders.png') }}>
         </div>
        <img class="fleur" src={{ asset('img/fleur.png') }}>
        <div class="fuck_yeah">FUCK YEAH !</div>
    </body>
</html>
<script>
    function popBalle(){
        let getBalle = document.getElementById('id_balle');
        getBalle.innerHTML += "<img id='ballo' class='balle' src={{ asset('img/balle.png') }}> ";
    }
    function popBalle2(){
        let getBalle2 = document.getElementById('id_balle2');
        getBalle2.innerHTML += "<img id='ballo2' class='balle2' src={{ asset('img/balle.png') }}> ";
    }

    function suppBalle(){
        let getBallo = document.getElementById('ballo');
        if(getBallo){
            getBallo.parentNode.removeChild(getBallo);
            console.log(1)
        }
        else{console.log('lolo')
            }
    }
    
    let testo =  Math.floor(Math.random() * 1000);
    let testo2 =  Math.floor(Math.random() * 1000);

    setInterval(function() {  testo =  Math.floor(Math.random() * 800)}, 1000);
    setInterval(function() {  testo2 =  Math.floor(Math.random() * 800)}, 1000);

    setInterval(function() {popBalle()}, testo);
    setInterval(function() {popBalle2()}, testo2);

  

    setInterval(function() {suppBalle()}, 10000);

    // let getBallo2 = document.getElementById('ballo2');

    // setInterval(function() {getBallo2 = document.getElementById('ballo2');}, 1000);
    // // setInterval(function() {  console.log(getBallo2)}, 1000);
    // setInterval(function() {if(getBallo2){getBallo2.parentNode.removeChild(getBallo2);} else{console.log('coco')}}, 1000);
    

</script>
