$(function() {
    $('#ident-page-link').click(function (e) {
        e.preventDefault();
        $('#ident-data').removeClass('hidden');
        $('#basket').addClass('hidden');
    });

    $('#basket-page-link').click(function (e) {
        e.preventDefault();
        $('#ident-data').addClass('hidden');
        $('#basket').removeClass('hidden');
    });

    $('#ident-data .nav a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('.tab-pane').on('click', 'input', function() {
        var _this = $(this);
        var checked = _this.prop('checked');
        var _li = _this.closest('li');
        var name = _li.closest('.panel').attr('name');
        var key = _li.attr('key');
        var caption = $('#ident-data li>a[aria-controls="' + name + '"]').html();

        if (_this.closest('.tab-pane').attr('id') === 'basket') {
            _li.remove();
            $('.panel[name="' + name + '"] li[key="' + key + '"] input').prop('checked', false);
        } else {
            if (checked) {
                $('#basket .panel[name="' + name + '"] ul').append(_li.clone());
            } else {
                $('#basket .panel[name="' + name + '"] li[key="' + key + '"]').remove();
            }
        }

        var _basketPanel = $('#basket .panel[name="' + name + '"]');
        var basketPanelItemCount = _basketPanel.find('ul>li').length;

        _basketPanel.find('.panel-title').html(caption + ' (' + basketPanelItemCount + ')');

        if (basketPanelItemCount) {
            _basketPanel.removeClass('hidden');
        } else {
            _basketPanel.addClass('hidden');
        }
    });
});
