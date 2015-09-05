/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'app/common/avalon_widget/district','bootstrap-dialog-zh','avalon'],function( React, district, dialog){
    var infoCtrl = avalon.define({
        $id:'infoCtrl',
        info:{},
        show:false,
    })
    avalon.scan(document.body);

    return {
        setInfo:function(info){
            infoCtrl.info = info;
            infoCtrl.show = true;
        }
    }
})