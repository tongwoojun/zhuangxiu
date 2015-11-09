function prdimgPlay(largeimg, thumbimg) {
    $largeimg = $(largeimg).find("img");
    $othumb = $(thumbimg).find("ul");
    $othumb_li = $othumb.find("li");
    $large_left = $(largeimg).children().eq(0);
    $large_right = $(largeimg).children().eq(2);
    $thumb_left = $(thumbimg).children().eq(0);
    $thumb_right = $(thumbimg).children().eq(2);
    var owidth = $othumb_li.outerWidth(true);
    var thumbnum = $othumb_li.length;
    var clicknum = $othumb_li.length;
    var dis = 0;
    var num = 0;
    var ispass = true;
    var playpass = true;
    function choose(numble) {
        $othumb_li.eq(numble).addClass("alpha").siblings().removeClass("alpha")
    }
    function change(linum) {
        var thumsrc = $othumb_li.eq(linum).find("img").attr("data-big");
        $largeimg.attr("src", thumsrc)
    }
    function clickMove() {
        choose(num);
        change(num);
        if (ispass) {
            $othumb.stop(true).animate({
                marginLeft: -dis + "px"
            },
            300)
        }
    }
    function click_left() {
        thumbnum++;
        if (thumbnum > 4) {
            ispass = true
        }
        if (thumbnum > $othumb_li.length) {
            playpass = false;
            thumbnum = $othumb_li.length
        } else {
            playpass = true
        }
        if (playpass) {
            num--;
            dis = num * owidth;
            clickMove()
        }
    }
    function click_right() {
        thumbnum--;
        if (thumbnum < 4) {
            ispass = false
        }
        if (thumbnum == 0) {
            playpass = false;
            thumbnum = 1
        } else {
            playpass = true
        }
        if (playpass) {
            num++;
            dis = num * owidth;
            clickMove()
        }
    }
    $thumb_left.click(function() {
        click_left()
    });
    $large_left.click(function() {
        click_left()
    });
    $thumb_right.click(function() {
        click_right()
    });
    $large_right.click(function() {
        click_right()
    });
    $othumb_li.click(function() {
        num = $(this).index();
        thumbnum = clicknum - num;
        if (clicknum < 8 && clicknum > 4) {
            disnum = clicknum - 4;
            dis = disnum * owidth;
            if (clicknum == 6) {
                if (num < 3) {
                    dis = num * owidth
                }
            }
            if (clicknum == 7) {
                if (num < 4) {
                    dis = num * owidth
                }
            }
        }
        clickMove()
    })
}
$(document).ready(function() {
    $("div .goods_large").hover(function() {
        $("div .large_btn").show()
    },
    function() {
        $("div .large_btn").hide()
    });
    $("div .large_btn").hover(function() {
        $(this).find("div").addClass("current")
    },
    function() {
        $(this).find("div").removeClass("current")
    });
    $("div .class_title").click(function() {
        var $title = $(this).parent();
        if (!$title.attr("class")) {
            $title.addClass("click");
            $(this).siblings().slideDown()
        } else {
            $title.removeClass("click");
            $(this).siblings().slideUp()
        }
    })
});
$(document).ready(function() {
    var select_item = $(".select_item");
    var select_item_img = $(".select_item img");
    $(".select_click").click(function(event) {
        event.stopPropagation();
        if (select_item.css("display") == "none") {
            select_item.show()
        } else {
            select_item.hide()
        }
    });
    select_item_img.click(function() {
        select_item.hide();
        $(".select_img").attr("src", $(this).attr("src"))
    });
    $(document).click(function() {
        select_item.hide()
    })
});
function scrollTop() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 900) {
            $(".goods_desc_title").css({
                position: "fixed",
                top: "0px"
            })
        } else {
            $(".goods_desc_title").css({
                position: "static",
                top: "none"
            })
        }
    });
    $(".goods_desc_title a").click(function() {
        $(this).addClass("click").siblings().removeClass("click")
    })
};