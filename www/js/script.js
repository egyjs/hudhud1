function shareMsg(msg){
    window.plugins.socialsharing.share(msg);
}
            if (typeof console  != "undefined")
                if (typeof console.log != 'undefined')
                    console.olog = console.log;
                else
                    console.olog = function() {};

            console.log = function() {
                console.olog.apply(console, arguments);
                // $('#debugDiv').append('<p>' + [].map.call(arguments, JSON.stringify) + '</p>');
            };
            window.onerror = console.log;

      