/**
 * Created by a7 on 11/24/15.
 */
lunbo();

function lb_getStyle(obj,name){
    if(obj.currentStyle){
        return obj.currentStyle[name];
    }else{
        return getComputedStyle(obj,false)[name];
    }
}

function lb_getByClass(oParent,nClass){
    var eLe = oParent.getElementsByTagName('*');
    var aRrent  = [];
    for(var i=0; i<eLe.length; i++){
        if(eLe[i].className == nClass){
            aRrent.push(eLe[i]);
        }
    }
    return aRrent;
}

function lb_startMove(obj,att,add){
    clearInterval(obj.timer);
    obj.timer = setInterval(function(){
        var cutt = 0 ;
        if(att=='opacity'){
            cutt = Math.round(parseFloat(lb_getStyle(obj,att)));
        }else{
            cutt = Math.round(parseInt(lb_getStyle(obj,att)));
        }
        var speed = (add-cutt)/4;
        speed = speed>0?Math.ceil(speed):Math.floor(speed);
        if(cutt==add){
            clearInterval(obj.timer);
        }else{
            if(att=='opacity'){
                obj.style.opacity = (cutt+speed)/100;
                obj.style.filter = 'alpha(opacity:'+(cutt+speed)+')';
            }else{
                obj.style[att] = cutt+speed+'px';
            }
        }
    },30);
}

function lunbo(){
    var oDiv = document.getElementById('playBox');
    var oPre = lb_getByClass(oDiv,'pre')[0];
    var oNext = lb_getByClass(oDiv,'next')[0];
    var oUlBig = lb_getByClass(oDiv,'oUlplay')[0];
    var aBigLi = oUlBig.getElementsByTagName('li');
    var oDivSmall = lb_getByClass(oDiv,'smalltitle')[0];
    var aLiSmall = oDivSmall.getElementsByTagName('li');

    function tab()
    {
        for(var i=0; i<aLiSmall.length; i++)
        {
            aLiSmall[i].className = '';
        }
        aLiSmall[now].className = 'thistitle';
        lb_startMove(oUlBig,'left',-(now*aBigLi[0].offsetWidth));
    }
    var now = 0;
    for(var i=0; i<aLiSmall.length; i++)
    {
        aLiSmall[i].index = i;
        aLiSmall[i].onmouseover = function()
        {
            now = this.index;
            tab();
        }
    }
    /*oPre.onclick = function()
    {
        now--;
        if(now ==-1)
        {
            now = aBigLi.length;
        }
        tab();
    }
    oNext.onclick = function()
    {
        now++;
        if(now ==aBigLi.length)
        {
            now = 0;
        }
        tab();
    }*/
    var timer = setInterval(oNext.onclick,3000); //滚动间隔时间设置
    oDiv.onmouseover = function()
    {
        clearInterval(timer);
    }
    oDiv.onmouseout = function()
    {
        timer = setInterval(oNext.onclick,3000); //滚动间隔时间设置
    }
}