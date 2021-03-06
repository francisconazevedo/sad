CKEDITOR.plugins.addExternal('justify', '/adminlte/ckeditor-plugins/justify/plugin.js');
CKEDITOR.plugins.addExternal('font', '/adminlte/ckeditor-plugins/font/plugin.js');
CKEDITOR.plugins.addExternal('youtube', '/adminlte/ckeditor-plugins/youtube/plugin.js');
CKEDITOR.plugins.addExternal('panelbutton', '/adminlte/ckeditor-plugins/panelbutton/plugin.js');
CKEDITOR.plugins.addExternal('colorbutton', '/adminlte/ckeditor-plugins/colorbutton/plugin.js');

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.extraPlugins = 'justify,font,colorbutton,youtube';

    // Toolbar groups configuration.
    config.toolbar = [
        {name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source']},
        {
            name: 'clipboard',
            groups: ['clipboard', 'undo'],
            items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
        },
        // { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        // { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
        {name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar']},
        {
            name: 'paragraph',
            groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        '/',
        {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
        {
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup'],
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
        }
    ];

    config.toolbar_mini = [
        {
            name: 'paragraph',
            groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        {name: 'styles', items: ['Font', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
        {
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup'],
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
        },
        {name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']}
    ];
};
