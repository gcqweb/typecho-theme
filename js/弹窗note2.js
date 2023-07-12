
//点击加载更多
jQuery(document).ready(function($) {
    
     var width = window.innerWidth
    var height = window.innerHeight
    if (width > 700) {
       
    
    //点击下一页的链接(即那个a标签)
    $('.Tree-content').click(function() {
               
               // 文字内容 原生js，打开/隐藏;
    var tag = "off";//记录开关状zd态
        if (tag == "off") {
            tag = "on";//开关设为打开状态
            $(".post_content").css("display","block");

            //点击父级元素关闭
                $('body').click(function() {
                tag = "off";//开关设为关闭
                 $(".post_content").css("display","none");
            });
            //点击子级不受影响
           $('.post_content').click(function() {
                //阻止冒泡
                event.stopPropagation();
            })
        }
        else {
            tag = "off";//开关设为关闭
            $(".post_content").css("display","none"); 
            // console.log("已关闭")
        } 
        
        
        // $this = $(this);
        // $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
        var href = $(this).attr("href"); //获取下一页的链接地址
        if (href != undefined) { //如果地址存在
            $.ajax({ //发起ajax请求
                url: href,
                //请求的地址就是下一页的链接
                type: 'get',
                //请求类型是get
                error: function(request) {
                    //如果发生错误怎么处理
                },
                success: function(data) { //请求成功
                    // $this.removeClass('loading').text('点击查看更多'); //移除loading属性
                    var $res = $(data).find('.share_details'); //从数据中挑出文章数据，请根据实际情况更改
                    $('.post_content').html($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
                  console.log(data)  
                }
            });
        }

        
 
        return false;
    });
        
    } 
});

