/**
 * 招募预览页面
 */
define(['avalon'],function(){
    var infoCtrl = avalon.define({
        $id:'infoCtrl',
        info:{},
        show:false,
        clickClose:function(){

            window.close();
        }
    })
    avalon.scan(document.body);

    return {
        setInfo:function(info){
            infoCtrl.info = info;
            infoCtrl.show = true;
        }
    }
})