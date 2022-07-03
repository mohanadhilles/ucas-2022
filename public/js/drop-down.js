function DropDown(el) {
    this.dropddown = el;
    this.opts = this.dropddown.find('ul.dropdown > li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents: function () {
        var obj = this;

        obj.dropddown.on('click', function (event) {
                if (this.id == 'dropdown-1') {
                    $(this).toggleClass('active');
                    $('.notification').removeClass('active');
                    return false;
                } else if (this.id == 'dropdown-2') {
                    $(this).toggleClass('active');
                    $('.message').removeClass('active');
                    return false;
                }
            }
        );
    }
}
$(function () {
    new DropDown($('#dropdown-1'));
    new DropDown($('#dropdown-2'));
    $(document).click(function () {
        $('#dropdown-2').removeClass('active');
        $('#dropdown-1').removeClass('active');
    });
});