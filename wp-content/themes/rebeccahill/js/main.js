

window.onload = function(){

 /*   var test = document.getElementById("test");
test.addEventListener('click', function(e){
fuck();

var s = Snap('#draggy');
var draggy = s.select('#draggy-p');
draggy.attr({fill:'#ff0ff0'});
draggy.drag();
});*/

//ok, not a problem with the inline.php method
//not a problem with the id= method on svg or g elements
//seems to be an issue with id= on a polygon - poss because of the gradient
//seems to be something to do with css of the header, as image works in page elsewhere. could be z-index, could be gradient overlay...
//sort out your js events, should only ever have one event that calls multiple functions not the other way round.
//ok so snap dragging half works. svg.js dragging is easier but wont work easily on exisitng svgs! fuck this shit.
//so snap works on a single id on a group surrounding a polygon without a gradient. too far from winning to keep going.


/*var q = Snap.select('#draggy');
var testy = q.selectAll('.draggy-g');
console.log(testy);


var single = testy[1];
console.log(single);
single.drag();//this doesnt work!

single.attr({fill: "#ff0000"});*/

/*var q = Snap.select('#draggy');
var testy = q.selectAll('polygon');

console.log(testy);

var single = testy[1];
console.log(single);

single.drag();
single.attr({fill: "#ff0000"});*/

/*for (i=0; i<testy.length; i++) {
  testy.items[i].drag();
}*/

/*var moveFunc = function (dx, dy, posx, posy) {
    this.attr( { cx: posx , cy: posy } ); // basic drag, you would want to adjust to take care of where you grab etc.
};

testy.drag(moveFunc,
            function(){
                console.log("Move started");
            },
            function(){
                console.log("Move stopped");
            });*/

/*var q = SVG('#draggy');
var testy = q.select('#draggy-g');
testy.draggable();*/



  var triangle = document.getElementsByTagName("polygon");
  
  for (i=0; i<triangle.length; i++) {
      
      triangle[i].style.transitionDuration = Math.random()*(3-1)+1+"s";

      setDelay(i);
        
      
  }

  function setDelay(i) {
    setTimeout(function(){
      triangle[i].classList.add('moove');
    }, Math.random()*(2000-1000)+500);
  }
    
  
    //normal distribution: triangle[i].style.transitionDuration = ((Math.random()*2-1)+(Math.random()*2-1)+(Math.random()*2-1))*(2)+2 + "s";  
    
  
 





};

jQuery(document).ready(function($){

//TODO: split into page specific scripts to be enqueued properly. also add to about the site. also refactor into var something = {init: ??}, something.init




/*
  var $triangle = $("polygon");

  $triangle.each(function(){

    $(this).attr('class', 'moove');
  
    $(this).css({transitionDuration: Math.random()*(4-1)+1 + "s"});

  });*/

    
  
    //normal distribution: triangle[i].style.transitionDuration = ((Math.random()*2-1)+(Math.random()*2-1)+(Math.random()*2-1))*(2)+2 + "s";  
    
  






/*From https://github.com/Prinzhorn/skrollr*/
    var s = skrollr.init({forceHeight:false});


/*Modified from http://stackoverflow.com/questions/14505958/image-changes-depending-on-the-position-of-the-mouse*/

/*    $(window).resize(function(){

      $(".me").attr("style", "background-position: 0px 0px");
      
      $(document).mousemove(function(event){
          faceAnimation(event);
        });

    });
   
    $(document).mousemove(function(event){
        faceAnimation(event);
    });


  var faceAnimation = function(event){
    var $me = $(".me");
    var currentWidth = $me.width();

    var image_src = { 
        front: "background-position: 0px 0px",
        bottom: "background-position: 0px "+-currentWidth+"px",
        bottomLeft: "background-position: 0px "+-2*currentWidth+"px",
        left: "background-position: 0px "+-3*currentWidth+"px",
        topLeft: "background-position: 0px "+-4*currentWidth+"px",
        top: "background-position: 0px "+-5*currentWidth+"px",
        topRight: "background-position: 0px "+-6*currentWidth+"px",
        right: "background-position: 0px "+-7*currentWidth+"px",
        bottomRight: "background-position: 0px "+-8*currentWidth+"px"
    };

    var location = {
        x: event.pageX,
        y: event.pageY
    };
    var imageTop = $me.offset().top + $me.height()*0.3,
        imageLeft = $me.offset().left + $me.width()*0.3,
        imageBottom = imageTop + $me.height()*0.3,
        imageRight = imageLeft + $me.width()*0.3;
    
    if(location.x >imageLeft && location.x <imageRight && location.y <imageTop){
        $me.attr("style", image_src.top);
    } else if(location.x <imageLeft && location.y <imageTop){
        $me.attr("style", image_src.topLeft);
    } else if(location.x <imageLeft && location.y >imageTop && location.y <imageBottom){
        $me.attr("style", image_src.left);
    } else if(location.x <imageLeft && location.y >imageBottom){
        $me.attr("style", image_src.bottomLeft);
    } else if(location.x >imageLeft && location.x <imageRight && location.y >imageBottom){
        $me.attr("style", image_src.bottom);
    } else if(location.x >imageRight && location.y >imageBottom){
        $me.attr("style", image_src.bottomRight);
    } else if(location.x >imageRight && location.y >imageTop && location.y <imageBottom){
        $me.attr("style", image_src.right);
    } else if(location.x >imageRight && location.y <imageTop){
        $me.attr("style", image_src.topRight);
    } else{
        $me.attr("style", image_src.front);
    }
  }*/



}); //ready

/*With thanks to Tim Holman https://github.com/tholman/giflinks*/

    var GifLinks = (function() {
    
      'use strict';
      var body;
      var container;
    
      // Soft object augmentation
      function extend( target, source ) {
    
        for ( var key in source ) {
          if ( !( key in target ) ) {
            target[ key ] = source[ key ];
          }
        }
    
        return target;
      }
    
      // Applys a dict of css properties to an element
      function applyProperties( target, properties ) {
    
        for( var key in properties ) {
          target.style[ key ] = properties[ key ];
        }
      }
    
      // Initialize
      function init( elements, preload ) {
    
        if ( elements.length ) {
    
          // Loop and assign
          for( var i = 0; i < elements.length; i++ ) {
    
            if ( preload === true ) {
              preloadAndTrack( elements[ i ] );
            } else {
              track( elements[ i ] );
            }
          }
    
        } else {
    
           if ( preload === true ) {
            preloadAndTrack( elements );
          } else {
            track( elements );
          }
        }
      }
    
      // Start tracking after preload
      function preloadAndTrack( element ) {
    
        var awesomeGif = element.getAttribute( 'data-src' );
        if ( awesomeGif ) {
    
          // Load the image
          var img = new Image();
          img.onload = function() {
    
            element.className += ' preloaded'
            track( element )
          }
    
          img.src = awesomeGif;
        }
      }
    
      // Start tracking mouse hovers
      function track( element ) {
    
         // "Party on Wayne" ~ "Party on Garth"
        element.addEventListener( 'mouseover',  function() { startPartying( this ); }, false );
        element.addEventListener( 'touchstart', function() { startPartying( this ); }, false);
    
        // Someone called the cops.
        element.addEventListener( 'mouseout',     function() { stopPartying(); }, false);
        element.addEventListener( 'touchmove',    function( event ) { event.preventDefault(); stopPartying(); }, false);
        element.addEventListener( 'click',        function() { stopPartying(); }, false);
        element.addEventListener( 'dblclick',     function() { stopPartying(); }, false);
    
        addClasses( element );
      }
    
      // Adds classes to do with giflink status (has link etc)
      function addClasses( element ) {
    
        element.className += ' giflink ready';
    
        if ( element.href ) {
          element.className += ' has-link';
        } else {
          element.className += ' no-link';
        }
      }
    
      // Create and cache the gif container.
      function createContainer() {
    
        var containerProperties = {
          'backgroundPosition': '50% 50%',
          'backgroundSize': 'cover',
          'pointerEvents': 'none',
          'position': 'fixed',
          'zIndex': '999999',
          'display': 'none',
          'height': '100%',
          'width': '100%',
          'margin': '0px',
          'left': '0px',
          'top': '0px',
        }
    
        container = document.createElement( 'div' );
        applyProperties( container, containerProperties );
        body.appendChild( container );
      }
    
      // Add the background to the container, and the container to the page!
      function startPartying( element ) {
    
        var awesomeGif = element.getAttribute( 'data-src' );
        if( awesomeGif ) {
          container.style[ 'backgroundImage' ] = 'url(' + awesomeGif + ')';
          container.style[ 'display' ] = 'block';
        } else {
          console.log( "Sorry, an element doesn't have a data-src!" );
        }
      }
    
      // Hide the container
      function stopPartying() {
    
        container.style[ 'display' ] = 'none';
        container.style[ 'backgroundImage' ] = '';
      }
    
    
      function main( elements, options ) {
    
        // Caching
        body = document.body;
        createContainer();
    
        var preload = false;
        if ( options && options.preload ) {
          preload = !!options.preload;
        }
    
        // Initialize giflinks
        init( elements, preload );
      }
    
      return extend( main, {
    
      });
    
    })();


/*window.onload = function() {
    // Add GifLinks to all anchor tags on the page!
    var element = document.querySelector( '.me' );
    if (element) {
      GifLinks( element );
    }
    
}*/