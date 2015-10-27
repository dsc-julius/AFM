<a href="#" class="btn hidden" id="trigger-game" data-toggle="modal" data-target="#site-game">View Game</a>
<div class="modal fade" id="site-game" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div id="c2canvasdiv">
                
                    <canvas id="c2canvas">
                        <h1>Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
                        <br/><br/><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br/>
                        <a href="http://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
                        <a href="http://www.google.com/chrome/">Google Chrome</a><br/>
                        <a href="http://www.apple.com/safari/download/">Apple Safari</a><br/>
                        <a href="http://www.google.com/chromeframe">Google Chrome Frame for Internet Explorer</a><br/></h1>
                    </canvas>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #site-game .modal-dialog {
        width: auto;
    }
    #site-game .modal-body * {
        padding: 0;
        margin: 0 !important;
    }
    #site-game .modal-body canvas {
        touch-action-delay: none;
        touch-action: none;
        -ms-touch-action: none;
    }
</style>
<script>
// Issue a warning if trying to preview an exported project on disk.
(function(){
    // Check for running exported on file protocol
    if (window.location.protocol.substr(0, 4) === "file")
    {
        alert("Exported games won't work until you upload them. (When running on the file:/// protocol, browsers block many features from working for security reasons.)");
    }
})();
</script>
<script src="<?php echo $theme_url; ?>/includes/Html5/c2runtime.js"></script>
<script type="text/javascript">              
    $(document).ready(function() {
        var eModal = $('#site-game');
        var eModalBody = $('#site-game .modal-body');
        var eModalTrigger = $('#trigger-game');
        var sGameBody = eModalBody.html();
        $("body").keypress(function(evt){
            var keyCode = (evt.which?evt.which:(evt.keyCode?evt.keyCode:0));
            if(keyCode == 102 && document.body == document.activeElement) {
                eModalTrigger.trigger('click');
                cr_setSuspended(false);
            }
        });
        cr_createRuntime("c2canvas");
        cr_setSuspended(true);

        eModal.on('hide.bs.modal', function(e) {
            cr_setSuspended(true);
        });
    });

    // Size the canvas to fill the browser viewport.
    jQuery(window).resize(function() {
        iWidth = jQuery(window).width();
        iHeight = jQuery(window).height();
        cr_sizeCanvas(iWidth, iHeight);
    });
    
    // Pause and resume on page becoming visible/invisible
    function onVisibilityChanged() {
        if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden)
            cr_setSuspended(true);
        else
            cr_setSuspended(false);
    };
    
    document.addEventListener("visibilitychange", onVisibilityChanged, false);
    document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
    document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
</script>