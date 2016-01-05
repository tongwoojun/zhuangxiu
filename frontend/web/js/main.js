/**
 * Created by a7 on 10/15/15.
 */

$(function(){
    $("#query_list li a").click(function(){
        var va = $(this).attr('value');
        var text = $(this).text();
        $('#type').val(va);
        $('#query_filde').text(text);
    });
});

function check_search() {
    var type =$('#type').val();
    var keyword =$('#keyword').val();
    if(!type){
        alert('请选择搜索类别!');
        return false;
    }
    if(!keyword){
        alert('请输入搜索关键字!');
        return false;
    }
    $('#search').submit();
}


function Addme() {
    url = document.URL;  //你自己的主页地址
    title = document.title;  //你自己的主页名称
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

function signTitles(bool) {
    if (bool) {
        $('.J-search-box_tabs').show();
    } else {
        $('.J-search-box_tabs').hide();
    }
}

function Submit(id){
    var form_obj =$('#'+id);
    var data = form_obj.serialize();
    var url = form_obj.attr('action');

    $.ajax({
        type:"POST",
        url:url,
        data:data,
        datatype: "json",
        beforeSend:function(){
            return eval("check_"+id+"('"+id+"')");
        },
        success:function(data){
            if(data.status==0){
                $('#errors_msg').html(data.info);
            }
            alert(data.info)
        },
        error: function(){
            $('#errors_msg').html("错误提示：未知错误，请联系网站管理员");
        }
    });
}

function check_form_1(id){
    var name_obj =$('#'+id+'_name');
    var tel_obj =$('#'+id+'_tel');
    var adress_obj =$('#'+id+'_adress');

    $('#'+id+" table input").each(function(){
        $(this).removeClass("errors");
    });
    $('#errors_msg').html("");

    var name = name_obj.val();
    if(!name){
        show_error(name_obj,'用户名不能为空')
        return false;
    }
    if(name.match(/<|"/ig)) {
        show_error(name_obj, '用户名包含敏感字符');
        return false;
    }
    var unlen = name.length;
    if(unlen < 2 || unlen > 5) {
        show_error(name_obj, unlen < 2 ? '用户名不得小于 2 个字符' : '用户名不得超过 5 个字符');
        return false;
    }

    var tel = tel_obj.val();
    if(!tel){
        show_error(tel_obj,'电话不能为空')
        return false;
    }

    if(!isPhone(tel)){
        show_error(tel_obj,'电话格式不对')
        return false;
    }

    var adress = adress_obj.val();
    if(!adress){
        show_error(adress_obj,'地址不能为空')
        return false;
    }
}


function check_form_2(id){
    var name_obj =$('#'+id+'_name');
    var tel_obj =$('#'+id+'_tel');
    var adress_obj =$('#'+id+'_adress');
    var title_obj =$('#'+id+'_title');
    var desc_obj =$('#'+id+'_desc');

    $('#'+id+" table input").each(function(){
        $(this).removeClass("errors");
    });

    $('#errors_msg').html("");

    var name = name_obj.val();
    if(!name){
        show_error(name_obj,'用户名不能为空')
        return false;
    }
    if(name.match(/<|"/ig)) {
        show_error(name_obj, '用户名包含敏感字符');
        return false;
    }
    var unlen = name.length;
    if(unlen < 2 || unlen > 5) {
        show_error(name_obj, unlen < 2 ? '用户名不得小于 2 个字符' : '用户名不得超过 5 个字符');
        return false;
    }

    var tel = tel_obj.val();
    if(!tel){
        show_error(tel_obj,'电话不能为空')
        return false;
    }

    if(!isPhone(tel)){
        show_error(tel_obj,'电话格式不对')
        return false;
    }

    var adress = adress_obj.val();
    if(!adress){
        show_error(adress_obj,'地址不能为空')
        return false;
    }
}

function show_error(obj,msg){
    obj.addClass('errors');
    $('#errors_msg').html("错误提示："+msg);
}

function isEmail(aEmail) {
    var bValidate = RegExp(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/).test(aEmail);
    if (bValidate) {
        return true;
    } else {
        return false;
    }
}

function isPhone(aPhone) {
    var bValidate = RegExp(/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/).test(aPhone);
    if (bValidate) {
        return true;
    } else {
        return false;
    }
}