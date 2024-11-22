<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $config->title ?? $config->title_seo }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper/swiper-bundle.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}">

    {{-- meta description --}}
    <meta name="description" content="{{ $config->description_seo ?? $config->title_seo }}" />
    <meta name="keywords" content="{{ $config->keywords_seo ?? $config->title_seo }}" />


    <link rel="shortcut icon" type="image/x-icon" href="{{ showImage($config->favicon) }}" />

    {!! $config->script !!}

</head>

<body style="margin-top: 56px">

    <!-- Adjust margin-top to prevent content overlap -->

    <!-- Header -->
    <div class="header px-2">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo/Title -->
            <div class="logo">TRANG CHỦ</div>

            <!-- Hotline -->
            <a style="color: #ffffff; text-decoration: none" target="_blank" href="tel:{{ $config->phone }}">
                <div class="hotline">Hotline: {{ $config->phone }}</div>
            </a>

            <!-- Menu icon (hamburger) -->
            <div class="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
    <!-- Header -->

    <!-- Content -->
    <div class="banner">
        <img src="{{ showImage($data['session_1']->banners) }}" class="img-fluid" alt="..." />
    </div>

    <!-- Form -->
    <div class="register-form">
        <h3>ĐĂNG KÍ SĐT ĐỂ NHẬN TƯ VẤN</h3>
        <form action="{{ route('contact') }}" method="post" class="contact-form">
            <input type="text" name="name" required placeholder="Họ và Tên" />
            <input type="tel" name="phone" required placeholder="Số điện thoại" />
            <button type="submit">ĐĂNG KÝ NGAY</button>
        </form>
    </div>
    <!-- Form -->

    <div class="banner-text">
        {{ $data['session_2']->title }}
    </div>

    <div class="w-75 mx-auto">
        <hr class="thick-hr" />
    </div>

    <div class="product-info text-center">

        @if (count($data['session_2']->contents) > 0)
            @foreach ($data['session_2']->contents as $content)
                <p>{{ $content }}</p>
                @if (!$loop->last)
                    <div class="hr"></div>
                @endif
            @endforeach
        @endif


    </div>

    <div class="uses mx-3 mt-2">
        <h3 class="fw-bold" style="color: #8e24aa">Công Dụng :</h3>

        @foreach ($data['session_3']->contents as $content)
            <div class="d-flex mb-2">
                <div class="check">
                    <img style="width: 30px" src="{{ asset('frontend/assets/image/check.png') }}" alt="" />
                </div>
                <div class="content ps-0 mt-1">
                    <span>
                        {{ $content }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div style=" background-color: rgb(243, 238, 237);
        width: 100%;" class="py-3">
        <div class="d-flex justify-content-center" style="
        margin-top: 20px;
      ">
            <div class="text-center p-3 d-flex justify-content-center align-items-center "
                style="
          border: 1px solid #8e24aa;
          width: 75%;
          height: 75%;
          border-radius: 50%;
          overflow: hidden;
          background-color: #ffffff;
        ">
                <img class="img-fluid" style="width: 90%; height: auto"
                    src="{{ showImage($data['session_3']->image) }}" alt="" />
            </div>


        </div>
        <div class="ms-3">
            <p class="fw-bold">Thành phần:</p>
            <span class="component-list">
                @foreach (explode(',', $data['session_3']->ingredients) as $ingredient)
                    <span>{{ $ingredient }}</span>
                    @if (!$loop->last)
                        <span>, </span>
                    @endif
                @endforeach
            </span>
        </div>


    </div>

    <div class="banner-text">{{ $data['session_4']->title }}</div>

    <div class="text-center" style="margin-bottom: -34px">
        <img style="width: 90% !important" src="{{ showImage($data['session_4']->image) }}" alt="" />
    </div>

    <div class="p-3"
        style="
        background-color: #fbfbfb;
        border-top: 8px solid #fbf0f0;
        border-left: 8px solid #fbf0f0;
        border-right: 8px solid #a7a0a0;
        border-bottom: 8px solid #a7a0a0;
      ">

        @foreach ($data['session_4']->contents as $c4)
            <div class="d-flex">
                <div class="check">
                    <img style="width: 30px" src="{{ asset('frontend/assets/image/check.png') }}" alt="" />
                </div>
                <div class="content ps-0 mt-2">
                    {!! $c4 !!}
                </div>
            </div>
        @endforeach
    </div>

    <div style="background-color: #f4f3fd" class="p-3 mt-3">
        @foreach ($data['session_4']->product_benefits as $p4)
            <div class="d-flex p-2 mb-2" style="background-color: #8e24aa; border-radius: 15px">
                <div class="check">
                    <img style="width: 30px" src="{{ asset('frontend/assets/image/check.png') }}" alt="" />
                </div>
                <div class="content ps-0 ">

                    {!! $p4 !!}
                </div>
            </div>
        @endforeach

    </div>

    <div style="background-color: #e0eaee" class="p-2">
        <h3 class="fw-bold text-center fs-4" style="color: #8e24aa">
            BẠN ĐANG GẶP PHẢI CÁC VẤN ĐỀ
        </h3>

        <div style="border-top: 1px solid #8e24aa; width: 90%; margin: auto"></div>
        @foreach ($data['session_5'] as $s5)
            <div
                style="
          border-radius: 27px;
            ">
                <div class="d-flex pt-4">
                    <div class="image" style="width: 100%;">
                        <img style="width: 100%; height: auto" src="{{ showImage($s5->image) }}" alt="" />
                    </div>
                </div>
            </div>

            <form action="{{ route('contact') }}" method="post" class="contact-form mb-3">
                <div class="form-contact d-flex mt-3 justify-content-between px-2">
                    <input type="text" required
                        style="
                padding: 15px 60px 15px 5px;
                border: 3px solid #040b7a;
                border-radius: 10px;
              "
                        name="phone" placeholder="Số điện thoại" />
                        <input type="hidden" name="note" value="{{ $s5->title ?? '' }}">
                    <button
                        style="
                padding: 15px 10px;
                border: 3px solid #040b7a;
                border-radius: 10px;
                background-color: #040b7b;
                color: white;
                font-weight: bold;
              ">
                        đăng ký ngay
                    </button>
                </div>
            </form>
        @endforeach



    </div>

    <div>
        <div class="logo text-center my-3 position-relative">
            <img class="position-absolute w-50" style="left: 10px"
                src="{{ asset('frontend/assets/image/lovepik-falling-leaves-png-image_401334673_wh1200-20220718075641.png') }}"
                alt="" />
            <img style="width: 35%"
                src="{{ asset('frontend/assets/image/9d8ed5_651b6cb038ff4917bcdbe0c58ca2c241_mv2-20220718075842.png') }}"
                alt="" />
        </div>

        <div class="text-center px-2">
            <h3 class="fw-bold fs-2" style="color: #e47d04">
                {{ $data['session_6']->title }}
            </h3>
            <p class="fw-bold" style="color: #74267b">
                {{ $data['session_6']->short_description }}
            </p>
        </div>
    </div>

    <div class="p-2">

        @foreach ($data['session_6']->contents as $s6)
            <div class="d-flex mb-2">
                <div class="check">
                    <img style="width: 30px" src="{{ asset('frontend/assets/image/check.png') }}" alt="" />
                </div>
                <div class="content ps-0 mt-1 " style="font-weight: 500">
                    {{ $s6 }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">

            @foreach ($data['session_7'] as $s7)
                <div class="swiper-slide">
                    <img class="img-fluid" src="{{ showImage($s7->image) }}" alt="Image {{ $s7->id }}" />
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($data['session_8'] as $s8)
        <div class="mt-4">
            <h3 class="fw-bold text-center fs-4" style="color: #8e24aa">
                {{ $s8->title }}
            </h3>

            <div class="video mt-3">
                <iframe width="100%" height="245"
                    src="https://www.youtube.com/embed/{{ getYouTubeVideoId($s8->link_video) }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="p-2">
                {!! $s8->content !!}
            </div>
        </div>
    @endforeach


    <div style="background-color: #f5f4f4" class="mt-3 py-3 text-center">
        <h3 class="fw-bold mb-2" style="color: #e47d04">
            PHẢN HỒI CỦA KHÁCH HÀNG
        </h3>
        <p class="fw-bold fs-5" style="color: #74267b">VỀ SẢN PHẨM DAMOS</p>

        <div style="border: 1px solid #a7a0a0" class="w-75 mx-auto"></div>

        <div class="list-video mt-3 mx-3">


            @foreach ($data['session_9'] as $s9)
                <div class="item">
                    <div style="border: 8px outset #ffffff">
                        <iframe width="100%" height="215"
                            src="https://www.youtube.com/embed/{{ getYouTubeVideoId($s9->link) }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div style="text-align: left" class="my-3">

                        {!! $s9->content !!}


                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- <div class="text-center mt-3">
        <h3 class="fw-bold" style="color: #e47d04">{{ $data['session_10']->title }}</h3>
        <p class="fw-bold" style="color: #74267b">
            {{ $data['session_10']->content }}
        </p>

        <div class="px-3 py-2" style="background-color: #e0cdf4">
            <img class="img-fluid" src="{{ showImage($data['session_10']->image) }}" alt="" />
        </div>
    </div> --}}

    <div style="background-color: #f4f3fd" class="">
        <div class="form-footer m-2 p-3" style="background-color: #540778">
            <h3 class="fw-bold text-center mb-4 fs-4" style="color: #ffffff">
                Để lại số điện thoại để phòng khám tư vấn ngay
            </h3>

            <form action="{{ route('contact') }}" method="post" class="contact-form">
                <div class="form-group mb-3">
                    <input type="text" name="name" placeholder="Họ và tên" required class="form-control" />
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="phone" placeholder="Số điện thoại" class="form-control"
                        pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" required />
                </div>

                <div class="text-center">
                    <button class="btn btn-primary">Đăng ký tư vấn nhanh</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Content -->

    <footer style="background-color: #74267b; padding-bottom: 60px">
        <div class="footer-top mb-3 d-flex align-items-center">
            <div class="logo" style="width: 35%">
                <img class="img-fluid" src="{{ showImage($config->logo) }}" alt="" />
            </div>
            <div class="text text-center" style="width: 65%">
                <h3 class="fw-bold fs-4" style="color: #f3f37d">{{ $config->title_footer }}</h3>
                <div class="w-75 mx-auto" style="border: 1px solid #ffffff"></div>
            </div>
        </div>

        <div class="footer-body px-2" style="font-size: 1rem">
            <div class="address d-flex gap-2 align-items-center mb-4">
                <i class="fa-solid fa-address-book fa-2xl me-2" style="color: #ffffff"></i>
                <p class="fw-bold m-0 text-white">
                    Địa chỉ: {{ $config->address }}
                </p>
            </div>
            <div class="hot-line d-flex gap-2 align-items-center mb-4">
                <i class="fa-solid fa-phone fa-2xl me-2" style="color: #ffffff"></i>
                <p class="fw-bold m-0 text-white">
                    Hotline: {{ $config->phone }}
                </p>
            </div>
            <div class="website d-flex gap-2 align-items-center mb-4">
                <i class="fa-solid fa-globe fa-2xl me-2" style="color: #ffffff"></i>
                <p class="fw-bold m-0 text-white">
                    Website: <a target="_blank" href="{{ $config->website }}">{{ $config->website }}</a>
                </p>
            </div>
        </div>

        <div class="mb-4" style="border: 1px solid #ffffff; width: 75%; margin: auto"></div>

        <div class="footer-bottom position-relative mb-4">
            <div class="py-2 ps-5 pe-3 ms-5 me-4" style="border: 1px solid #ffffff">
                <p class="m-0 text-white">
                    {!! $config->content_footer !!}
                </p>
            </div>

            <div class="icon-fb position-absolute p-3 bg-white" style="top: 15px; left: 10px; border-radius: 50%">
                <i class="fa-brands fa-square-facebook fa-2xl" style="color: #cf2fda"></i>
            </div>
        </div>

        <div class="mb-4" style="border: 1px solid #ffffff; width: 75%; margin: auto"></div>

        <div class="text-center mb-5">
            <h3 class="fs-4 fw-bold" style="color: #f3f37d">
                CAM KẾT CHÍNH HÃNG 100%
            </h3>
            <small class="text-white" style="font-size: 10px">Lưu ý: Sản phẩm không phải là thuốc và không có tác dụng
                thay thế
                thuốc chữa bệnh.</small>
        </div>
    </footer>

    <div class="consultation-banner">
        <h2>TƯ VẤN SẢN PHẨM NGAY</h2>
        <div style="border: 1px solid #ffffff" class="w-100 mx-auto my-1" style="margin-top: 10px"></div>
        <div class="button-container">
            <form action="{{ route('contact') }}" method="post" class="contact-form">
                <input type="text" class="phone-input" name="phone" required pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" placeholder="Số điện thoại" />
                <button type="submit" class="quote-button">BÁO GIÁ ƯU ĐÃI</button>
            </form>
        </div>
    </div>

    <div class="contact-icons">
        <a target="_blank" href="tel:{{ $config->phone }}" class="icon phone" title="Call">
            <img src="{{ asset('frontend/assets/image/logo-phone.png') }}" alt="" />
        </a>
        <a target="_blank" href="https://zalo.me/{{ $config->phone }}" class="icon zalo" title="Zalo">
            <img src="{{ asset('frontend/assets/image/Logo-zalo.png') }}" alt="" />
        </a>
        <a target="_blank" href="{{ $config->fanpage }}" class="icon messages" title="Messages">
            <img src="{{ asset('frontend/assets/image/logo-mess.png') }}" alt="" />
        </a>
    </div>

    <div class="scroll-top" onclick="scrollToTop()">▲</div>

    <!-- Bootstrap JS (Optional) -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dist/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>



    <script>
        const swiper = new Swiper(".swiper-container", {
            slidesPerView: 1, // Hiển thị 1 slide tại một thời điểm
            spaceBetween: 0, // Khoảng cách giữa các slide là 0
            centeredSlides: true, // Đảm bảo slide được căn giữa
            grabCursor: true, // Cho phép kéo slide bằng chuột
            mousewheel: true, // Hỗ trợ cuộn chuột để chuyển slide
            freeMode: false, // Chỉ chuyển slide khi kéo hoặc cuộn
            loop: true, // Cho phép lặp lại slider
        });

        window.onscroll = function() {
            const scrollTopButton = document.querySelector(".scroll-top");
            if (
                document.documentElement.scrollTop > 100 ||
                document.body.scrollTop > 100
            ) {
                scrollTopButton.classList.add("show");
            } else {
                scrollTopButton.classList.remove("show");
            }
        };

        // Hàm cuộn lên đầu trang
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }

        $(document).on('submit', '.contact-form', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('input[name="name"]').val('');
                        $('input[name="phone"]').val('');

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            })
        })
    </script>
</body>

</html>
