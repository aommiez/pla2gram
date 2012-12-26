/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/21/12 AD
 * Time: 11:46 AM
 * Email : aommiez@gmail.com
 * File Name :
 */

function imgLoad(img, completeCallback, errorCallback) {
    if (img != null && completeCallback != null) {
        var loadWatch = setInterval(watch, 500);
        function watch() {
            if (img.complete) {
                clearInterval(loadWatch);
                completeCallback(img);
            }
        }
    } else {
        if (typeof errorCallback == "function") errorCallback();
    }
}

function clearSelection() {
    var sel ;
    if(document.selection && document.selection.empty){
        document.selection.empty() ;
    } else if(window.getSelection) {
        sel=window.getSelection();
        if(sel && sel.removeAllRanges)
            sel.removeAllRanges() ;
    }
}