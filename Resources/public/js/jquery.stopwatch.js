/*
* Usage:
*
*    <html>
*        <head>
*            <style type="text/css">
*                .some-kind-of-div { border-radius: 12px; background-color: #6b0; width: 100px; height: 17px; margin:10px; text-align: right; }
*            </style>
*        </head>
*        <body>
*        
*            <div class="some-kind-of-div">
*                <div class="foo"></div>
*            </div>
*            <div class="some-kind-of-div">
*                <div class="foo"></div>
*            </div>
*            <div class="some-kind-of-div">
*                <div class="foo baa"></div>
*            </div>
*            
*            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
*            <script src="jquery.stopwatch.js"></script>
*            <script>
*                $(function()
*                {
*                    $( '.foo' ).each(function()
*                    {
*                        var options = {
*                            started: foo,
*                            stopped: foo
*                        };
*                        if ( $( this ).hasClass( 'baa' ))
*                        {
*                            options.autostart = true;
*                        }
*                        $( this ).stopwatch( options );
*                    });
*                });
*                function foo(){ console.log( 'baaaa...' ); }
*            </script>
*        </body>
*    </html>
*/
;(function( $, window, document, undefined )
{
    var methods = {
        init: function( options )
        {
            return $( this ).each(function()
            {
                $( this ).addClass( 'stopwatch-container' );
                // Container CSS
                for ( var key in options.containerCss ) $( this ).css( key, options.containerCss[key] );
                // Static hand
                var staticHand = $( '<div></div>' );
                for ( var key in options.staticHandCss ) staticHand.css( key, options.staticHandCss[key] );
                $( this ).append( staticHand );
                // Dynamic hand
                var hand = $( '<div></div>' );
                hand.addClass( options.innerClass );
                for ( var key in options.handCss ) hand.css( key, options.handCss[key] );
                // Click handler
                $( this ).append( hand ).click(function()
                {
                    var interval = $( this ).attr( options.intervalResourceAttribute );
                    if ( !interval ) methods.start.apply( this, [options] );
                    else methods.stop.apply( this, [options] );
                });
                // Autostart
                if ( options.autostart )
                {
                    $( this ).addClass( 'stopwatch-running' );
                    methods.start.apply( this, [options] );
                }
            });
        },
        start: function( options ) {
            return $( this ).each(function()
            {
                var stopwatchHand = $( this ).find( '.' + options.innerClass );
                if ( !stopwatchHand.length )
                {
                    methods.init.apply( this, [options] );
                }
                var classes = options.rotationClasses.slice(0);
                $( this ).attr( options.intervalResourceAttribute, setInterval( function()
                {
                    var currentClass = classes.shift();
                    var css = options.rotationCss[currentClass];
                    for ( var key in css ) stopwatchHand.css( key, css[key] );
                    classes.push( currentClass );
                }, 100 ));
                if ( !$( this ).hasClass( 'stopwatch-running' ) )
                {
                    options.started.apply( this );
                }
                $( this ).addClass( 'stopwatch-running' );
            });
        },
        stop: function( options ) {
            return $( this ).each(function()
            {
                var stopwatchHand = $( this ).find( '.' + options.innerClass );
                if ( !stopwatchHand.length )
                {
                    methods.init.apply( this, [options] );
                }
                var classes = options.rotationClasses.slice(0);
                var interval = $( this ).attr( options.intervalResourceAttribute );
                clearInterval( interval );
                $( this ).removeAttr( options.intervalResourceAttribute );
                stopwatchHand.removeAttr( 'style' );
                var css = options.rotationCss[classes[0]];
                for ( var key in css ) stopwatchHand.css( key, css[key] );
                for ( var key in options.handCss ) stopwatchHand.css( key, options.handCss[key] );
                options.stopped.apply( this );
                $( this ).removeClass( 'stopwatch-running' );
            });
        }
    };
    $.fn.stopwatch = function( param )
    {
        var options = $.extend( {}, $.fn.stopwatch.config, param );
        return this.each( function()
        {
            return methods.init.apply( this, [options] );
        });
    }
    $.fn.stopwatch.config = {
        innerClass: 'stopwatch-hand',
        intervalResourceAttribute: 'data-interval',
        autostart: false,
        containerCss: { 'position': 'relative', 'cursor': 'pointer', 'display': 'inline-block', 'width': '9px', 'height': '9px', 'border-radius': '8px', 'border': '2px solid black', 'margin': '2px' },
        staticHandCss: { 'width': '4px', 'height': '4px', 'position': 'absolute', 'bottom': 0, 'right': '1px', 'border-top': '1px solid black' },
        handCss: { 'width': '1px', 'height': '4px', 'margin': '1px 1px 0 0', 'background-color': 'black', 'background-clip': 'padding-box', 'border-bottom': '4px solid transparent', 'border-left': '4px solid transparent', 'border-right': '4px solid transparent' },
        rotationClasses: [ 'rotate0', 'rotate45', 'rotate90', 'rotate135', 'rotate180', 'rotate225', 'rotate270', 'rotate315' ],
        rotationCss: {
            'rotate0':   { '-webkit-transform': 'rotate(0deg)',   '-moz-transform': 'rotate(0deg)',   '-o-transform': 'rotate(0deg)',   '-ms-transform': 'rotate(0deg)'   },
            'rotate45':  { '-webkit-transform': 'rotate(45deg)',  '-moz-transform': 'rotate(45deg)',  '-o-transform': 'rotate(45deg)',  '-ms-transform': 'rotate(45deg)'  },
            'rotate90':  { '-webkit-transform': 'rotate(90deg)',  '-moz-transform': 'rotate(90deg)',  '-o-transform': 'rotate(90deg)',  '-ms-transform': 'rotate(90deg)'  },
            'rotate135': { '-webkit-transform': 'rotate(135deg)', '-moz-transform': 'rotate(135deg)', '-o-transform': 'rotate(135deg)', '-ms-transform': 'rotate(135deg)' },
            'rotate180': { '-webkit-transform': 'rotate(180deg)', '-moz-transform': 'rotate(180deg)', '-o-transform': 'rotate(180deg)', '-ms-transform': 'rotate(180deg)' },
            'rotate225': { '-webkit-transform': 'rotate(225deg)', '-moz-transform': 'rotate(225deg)', '-o-transform': 'rotate(225deg)', '-ms-transform': 'rotate(225deg)' },
            'rotate270': { '-webkit-transform': 'rotate(270deg)', '-moz-transform': 'rotate(270deg)', '-o-transform': 'rotate(270deg)', '-ms-transform': 'rotate(270deg)' },
            'rotate315': { '-webkit-transform': 'rotate(315deg)', '-moz-transform': 'rotate(315deg)', '-o-transform': 'rotate(315deg)', '-ms-transform': 'rotate(315deg)' }
        },
        started: function() {},
        stopped: function() {},
    };
})( jQuery, window, document );
