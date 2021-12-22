
function activityWatcher(){

    var secondsSinceLastActivity = 0;
    var maxInactivity = 5000;

    setInterval(function(){
        secondsSinceLastActivity+=5000;
        if(secondsSinceLastActivity > maxInactivity){
            alert("Neaktivni ste duze od 5s");
        }
    }, 5000);

    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
        secondsSinceLastActivity = 0;
    }

    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];

    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });


}

activityWatcher();
