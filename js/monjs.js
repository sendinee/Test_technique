
$(function () {
    

    var txtOldPwd=$('.oldpwd');

    $('.show-old-pwd').hover(
        function () {
            txtOldPwd.attr('type','text');
        },
        function () {
            txtOldPwd.attr('type','password');
        }

    )


    var txtNewPwd=$('.newpwd');

    $('.show-new-pwd').hover(
        function () {
            txtNewPwd.attr('type','text');
        },
        function () {
            txtNewPwd.attr('type','password');
        }

    )

});
