/**
 * Created by a7 on 10/15/15.
 */

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