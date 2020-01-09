jQuery(document).ready(function ($) {
    // Upload Header Logo
    $('.favicon_upload').click(function (e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Favicon',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
                .on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('.to_favicon').attr('src', attachment.url);
                    $('.favicon_url').val(attachment.url);

                })
                .open();
    });
    $('span.remove_favicon').click(function () {
        $('.to_favicon').remove();
        $('.favicon_url').val('');
        $(this).remove();
    });

    // Upload Header Logo
    $('.header_logo_upload').click(function (e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Header Logo',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
                .on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('.to_header_logo').attr('src', attachment.url);
                    $('.header_logo_url').val(attachment.url);

                })
                .open();
    });
    $('span.remove_header_logo').click(function () {
        $('.to_header_logo').remove();
        $('.header_logo_url').val('');
        $(this).remove();
    });
   
    // Upload Innerpage Header Logo
    $('.innerpage_header_logo_upload').click(function (e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Innerpage Header Logo',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
                .on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('.to_header_logo').attr('src', attachment.url);
                    $('.innerpage_header_logo_url').val(attachment.url);

                })
                .open();
    });
    $('span.remove_innerpage_header_logo').click(function () {
        $('.to_innerpage_header_logo').remove();
        $('.innerpage_header_logo_url').val('');
        $(this).remove();
    });

    // Upload Footer Logo
    $('.footer_logo_upload').click(function (e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Footer Logo',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
                .on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('.to_footer_logo').attr('src', attachment.url);
                    $('.footer_logo_url').val(attachment.url);

                })
                .open();
    });
    $('span.remove_footer_logo').click(function () {
        $('.to_footer_logo').remove();
        $('.footer_logo_url').val('');
        $(this).remove();
    });

    var count = $('#social_links ul li').length;

    $('span.add_social').click(function () {
        count++;
        var rowSocial = '<li id="social_' + count + '" class="ui-state-default" name="social_list">' +
                '<div class="social_icons_set">' +
                '<span class="sort_icon"></span>' +
                '<input type="text" name="social_link_title" class="sTitle" placeholder="Title Like: Facebook, Google" />' +
                '<input type="text" name="social_link_icon_class" class="sLink" placeholder="Icon Class Like: fa fa-facebook" />' +
                '<input type="text" name="social_link_url" class="sUrl" placeholder="Social Page Url" />' +
                '</div>' +
                '</li>';

        $("#social_links > ul").append(rowSocial);

    });


    // Remove Social Link
    $('span.remove_social').click(function () {
        var s_id = $(this).parent().parent().attr('id');
        $('#' + s_id).remove();
    });

    // Get Data of each field of Social Link and then Append it ot Textarea then Save
    $("form#custom_options_form input#submit").click(function () {

        var jsonObj = jsonObj || [];

        $('li[name="social_list"]').each(function () {

            var item = {};

            var stitle_val = $(this).children().children('.sTitle').val();
            var sicon_val = $(this).children().children('.sLink').val();
            var slink_val = $(this).children().children('.sUrl').val();

            if (stitle_val != '' && sicon_val != '' && slink_val != '') {
                item['social_title'] = stitle_val;
                item['social_icon'] = sicon_val;
                item['social_url'] = slink_val;
                jsonObj.push(item);
            }

        });

        var myJSON = JSON.stringify(jsonObj);
        $('.social_links_value').append(myJSON);

    });
});