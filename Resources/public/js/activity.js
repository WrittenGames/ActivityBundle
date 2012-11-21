
$(function()
{
    setInterval( refreshClock, 1000 );
});
function refreshClock()
{
    var now = new Date();
    var hours = now.getHours();
    if ( hours < 10 ) hours = '0' + hours;
    var minutes = now.getMinutes();
    if ( minutes < 10 ) minutes = '0' + minutes;
    var seconds = now.getSeconds();
    if ( seconds < 10 ) seconds = '0' + seconds;
    $( '.punchclock .hours' ).html( hours );
    $( '.punchclock .minutes' ).html( minutes );
    $( '.punchclock .seconds' ).html( seconds );
}
