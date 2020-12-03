!function(o)
{
"use strict";o("body").on("input propertychange",".floating-label-form-group",function(i) {
o(this).toggleClass("floating-label-form-group-with-value",!!o(i.target).val())}).on("focus",".floating-label-form-group",function()
{
o(this).addClass("floating-label-form-group-with-focus")}).on("blur",".floating-label-form-group",
function(){o(this).removeClass("floating-label-form-group-with-focus")});
if(992<o(window).width())
{
    var s=o("#nscms_default_main_navi").height();
    o(window).on("scroll",{previousTop:0},function(){var i=o(window).scrollTop();
        i<this.previousTop?0<i&&o("#nscms_default_main_navi").hasClass("is-fixed")?o("#nscms_default_main_navi").addClass("is-visible"):o("#nscms_default_main_navi").removeClass("is-visible is-fixed"):i>this.previousTop&&(o("#nscms_default_main_navi").removeClass("is-visible"),s<i&&!o("#nscms_default_main_navi").hasClass("is-fixed")&&o("#nscms_default_main_navi").addClass("is-fixed")),this.previousTop=i})}}(jQuery);