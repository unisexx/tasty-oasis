function tinymce_init_callback(editor) {
    editor.remove();
    editor = null;

    tinymce.init({
        menubar: false,
        selector: 'textarea.richTextBox',
        skin_url: $('meta[name="assets-path"]').attr('content') + '?path=js/skins/voyager',
        content_css: "/app-assets/css/tinymce.css,https://pro.fontawesome.com/releases/v5.2.0/css/all.css",
        min_height: 600,
        resize: 'vertical',
        external_plugins: {
            'visualblocks': 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.4/plugins/visualblocks/plugin.min.js',
            'hr': 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.4/plugins/hr/plugin.min.js',
            'youtube': '/app-assets/tinymce/youtube/plugin.js',
        },
        plugins: 'link, image, code, table, textcolor, lists, hr, visualblocks, youtube',
        // valid_elements : '*[*]',
        extended_valid_elements: 'br[clear],i[class]',
        file_browser_callback: function (field_name, url, type, win) {
            if (type == 'image') {
                $('#upload_file').trigger('click');
            }
        },
        toolbar1: 'styleselect bold italic underline | fontsizeselect | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent',
        toolbar2: 'link image table | visualblocks | hr  ClearFloat Accordion DivBlock | code | youtube',
        fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
        convert_urls: false,
        image_caption: true,
        image_title: true,
        image_advtab: true,
        // style_formats: [
        //     { title: 'Headers', items: [
        //     { title: 'h1', block: 'h1' },
        //     { title: 'h2', block: 'h2' },
        //     { title: 'h3', block: 'h3' },
        //     { title: 'h4', block: 'h4' },
        //     { title: 'h5', block: 'h5' },
        //     { title: 'h6', block: 'h6' }
        //     ] },

        //     { title: 'Blocks', items: [
        //     { title: 'p', block: 'p' },
        //     { title: 'div', block: 'div' },
        //     { title: 'pre', block: 'pre' }
        //     ] },

        //     { title: 'Containers', items: [
        //     { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
        //     { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
        //     { title: 'blockquote', block: 'blockquote', wrapper: true },
        //     { title: 'hgroup', block: 'hgroup', wrapper: true },
        //     { title: 'aside', block: 'aside', wrapper: true },
        //     { title: 'figure', block: 'figure', wrapper: true },
        //     { title: 'Image Left', selector: 'img', styles: { 'float': 'left', 'margin': '0 10px 0 10px' } },
        //     { title: 'Image Right', selector: 'img', styles: { 'float': 'right', 'margin': '0 0 10px 10px' } },
        //     ] }
        // ],
        visualblocks_default_state: false,
        end_container_on_empty_block: true,
        setup: function (editor) {

            // ปุ่ม clearfloat
            editor.addButton('ClearFloat', {
                title: 'ClearFloat',
                text: 'ClearFloat',
                onclick: function () {
                    tinyMCE.execCommand('mceInsertContent', false, '<br clear="all">');
                }
            });

            // ปุ่ม accordion
            editor.addButton('Accordion', {
                text: 'Accordion',
                icon: false,
                onclick: function onclick() {
                    editor.windowManager.open({
                        title: 'Accordion Picker',
                        body: {
                            type: 'textbox',
                            name: 'my_textbox',
                            layout: 'flow',
                            label: 'ใส่จำนวนแถว (ตัวเลขเท่านั้น)'
                        },
                        onsubmit: function onsubmit(e) {
                            var accordionSet = [];
                            var curAccordion = Date.now();
                            var accordionCount = parseInt(e.data.my_textbox);
                            for (var i = 0; i < accordionCount; i++) {

                                if (i == 0) {
                                    classShow = 'show';
                                } else {
                                    classShow = '';
                                }

                                var html = "";
                                html += '<div class="card mt-2">';
                                html += '<div class="card-header bg-white head-accordion">';
                                html += '<h5 class="mb-0 position-relative">';
                                html += '<button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapse' + (curAccordion + i) + '" aria-expanded="true" aria-controls="collapse' + (curAccordion + i) + '">';
                                html += 'หัวข้อที่ ' + (i + 1) + ' <i class="fa fa-angle-down rotate-icon arrow-size">&nbsp;</i>';
                                html += '</button>';
                                html += '</h5>';
                                html += '</div>';

                                html += '<div id="collapse' + (curAccordion + i) + '" class="collapse ' + classShow + '" aria-labelledby="heading' + (curAccordion + i) + '" data-parent="#accordion' + curAccordion + '">';
                                html += '<div class="card-body">';
                                html += 'เนื้อหาที่ ' + (i + 1);
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';

                                accordionSet.push(html);
                            }

                            var accordion = '\n<div id="accordion' + curAccordion + '" class="col-md-12">\n' + accordionSet.join('') + '\n</div><br clear="all">';
                            editor.insertContent(accordion);
                        }
                    });
                }
            });

            // ปุ่ม Add <Section></Section>
            editor.addButton('DivBlock', {
                title: 'DivBlock',
                text: 'DivBlock',
                onclick: function () {
                    tinyMCE.execCommand('mceInsertContent', false, '<div class="clearfix" style="margin:20px 0;"><p>ใส่เนื้อหาที่นี่</p></div><p></p>');
                }
            });
        }
    });
}
