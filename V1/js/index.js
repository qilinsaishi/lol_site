//懒加载
$(function(){
    //初始化插件
    $('img').lazyload({
        effect: "fadeIn", //出现的效果 fadeIn   show   slideDown
        //placeholder:"./images/load.gif",//提前占位 图片地址
        // threshold: 200, //提前加载，滚动距离
        // event:'mouseover',//如果有该属性，那么提前加载将失效 需要条件出发，参数值为事件名
        // container:$("div"), //浏览器的滚动条会影响到某些元素内部的图片的懒加载，使用这样的属性可以解决
        failure_limit : 10000 //图片混排 同时加载更多的图片避免出现当前屏幕上图片不能加载出来的问题
    });
    // 如果你的图片在某个div中，该div有滚动条，那么就去设置cotainer:$(div的选择器)
});