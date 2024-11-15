<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugins.js') }}"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        window.previewImage = function(event, imgId) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = document.getElementById(imgId);
                imgElement.src = reader.result; // Cập nhật nguồn cho ảnh
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        window.removeImages = function(imgId, inputId) {
            const imgElement = document.getElementById(imgId);
            const inputElement = document.getElementById(inputId);

            // Đặt src của ảnh thành trống hoặc ảnh mặc định
            imgElement.src = '';

            // Đặt giá trị của input là null
            inputElement.value = null;

            // Thêm một hidden input để báo cho server biết là ảnh cần xóa
            const removeImageFlag = document.createElement('input');
            removeImageFlag.type = 'hidden';
            removeImageFlag.name = `${inputId}_remove`;
            removeImageFlag.value = true;

            inputElement.parentNode.appendChild(removeImageFlag);
        }
    })

    window.ckeditor = (selector, height = 300) => {
        CKEDITOR.replace(selector, {
            height: height,
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                },
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']
                },
                {
                    name: 'forms',
                    items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button',
                        'ImageButton', 'HiddenField'
                    ]
                },
                '/',
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-',
                        'Strike',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight',
                        'JustifyBlock',
                        '-', 'BidiLtr', 'BidiRtl', 'Language'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar',
                        'PageBreak',
                        'Iframe'
                    ]
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks', '-']
                },
                {
                    name: 'about',
                    items: ['About']
                }
            ],
            extraPlugins: 'font,colorbutton,justify',
            fontSize_sizes: '11px;12px;13px;14px;15px;16px;18px;20px;22px;24px;26px;28px;30px;32px;34px;36px',
        });
    }
</script>

@stack('scripts')

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
