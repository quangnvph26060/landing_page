<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fixed Header Example</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper/swiper-bundle.min.css')}}" />


    <link rel="shortcut icon" type="image/x-icon" href="{{showImage($config->favicon)}}" />
</head>

<body style="margin-top: 56px">
    <!-- Adjust margin-top to prevent content overlap -->

    <!-- Header -->
    <div class="header px-2">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo/Title -->
            <div class="logo">TRANG CHỦ</div>

            <!-- Hotline -->
            <div class="hotline">Hotline: {{$config->phone}}</div>

            <!-- Menu icon (hamburger) -->
            <div class="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
    <!-- Header -->

    <!-- Content -->
    <div class="banner">
        <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
            class="img-fluid" alt="..." />
    </div>

    <!-- Form -->
    <div class="register-form">
        <h3>ĐĂNG KÍ SĐT NHẬN NGAY ƯU ĐÃI</h3>
        <form action="/submit-form" method="post">
            <input type="text" name="name" placeholder="Họ và Tên" required />
            <input type="tel" name="phone" placeholder="Số điện thoại" required />
            <button type="submit">NHẬN ƯU ĐÃI</button>
        </form>
    </div>
    <!-- Form -->

    <div class="banner-text">
        GIẢI PHÁP CHO VẤN ĐỀ DA LIỄU VIÊM DA, VẨY NẾN, HẮC LÀO, NGỨA.....
    </div>

    <div class="w-75 mx-auto">
        <hr class="thick-hr" />
    </div>

    <div class="product-info text-center">
        <p>THÀNH PHẦN TỪ DƯỢC LIỆU, SẢN XUẤT ĐẠT CHUẨN GMP</p>
        <div class="hr"></div>
        <p>ĐÃ ĐƯỢC BỘ Y TẾ KIỂM ĐỊNH & CẤP PHÉP LƯU HÀNH TRÊN TOÀN QUỐC</p>
        <div class="hr"></div>
        <p>KHÔNG CORTICOID - AN TOÀN CHO DA - LÀNH TÍNH</p>
    </div>

    <div class="uses mx-3 mt-2">
        <h3 class="fw-bold" style="color: #8e24aa">Công Dụng :</h3>
        <div class="d-flex mb-2">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-1">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
        <div class="d-flex">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-1">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
    </div>

    <div class="position-relative"
        style="
        background-color: rgb(243, 238, 237);
        width: 100%;
        height: 430px;
        margin-top: 20px;
      ">
        <div class="text-center p-3 d-flex justify-content-center align-items-center position-absolute"
            style="
          border: 1px solid #8e24aa;
          width: 75%;
          height: 75%;
          border-radius: 50%;
          overflow: hidden;
          left: 30%;
          top: 50%;
          transform: translate(-50%, -50%);
          background-color: #ffffff;
        ">
            <img class="img-fluid" style="width: 90%; height: auto" src="{{asset('frontend/assets/image/Group 2.jpg')}}" alt="" />
        </div>
    </div>

    <div class="banner-text">ĐỐI TƯỢNG SỬ DỤNG</div>

    <div class="text-center" style="margin-bottom: -34px">
        <img style="width: 90% !important" src="{{asset('frontend/assets/image/_dsc1200-20220718072408.png')}}" alt="" />
    </div>

    <div class="p-3"
        style="
        background-color: #fbfbfb;
        border-top: 8px solid #fbf0f0;
        border-left: 8px solid #fbf0f0;
        border-right: 8px solid #a7a0a0;
        border-bottom: 8px solid #a7a0a0;
      ">
        <div class="d-flex">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-2">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
        <div class="d-flex">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-2">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
        <div class="d-flex">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-2">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
    </div>

    <div style="background-color: #f4f3fd" class="p-3 mt-3">
        <div class="d-flex p-2 mb-2" style="background-color: #8e24aa; border-radius: 15px">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-2">
                <span class="fw-bold text-white">
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
        <div class="d-flex p-2 mb-2" style="background-color: #8e24aa; border-radius: 15px">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-2">
                <span class="fw-bold text-white">
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
    </div>

    <div style="background-color: #e0eaee" class="p-2">
        <h3 class="fw-bold text-center fs-4" style="color: #8e24aa">
            BẠN ĐANG GẶP PHẢI CÁC VẤN ĐỀ
        </h3>
        <div style="border-top: 1px solid #8e24aa; width: 90%; margin: auto"></div>

        <div
            style="
          border-radius: 27px;
          background-image: linear-gradient(
            rgba(21, 110, 213, 0.9),
            rgb(148, 26, 158)
          );
        ">
            <div class="d-flex py-4 mt-3">
                <div class="image" style="width: 55%; padding: 0 5px 0 10px">
                    <img style="width: 100%; height: auto" src="{{asset('frontend/assets/image/capture-20230330075742-kkijj.jpg')}}"
                        alt="" />
                </div>
                <div class="content">
                    <div class="title">
                        <p class="fw-bold fs-4 pb-1" style="color: #fefe01; border-bottom: 3px solid #ffffff">
                            VIÊM DA CƠ ĐỊA
                        </p>
                    </div>
                    <div class="text-white" style="font-weight: 500">
                        <p>Da đỏ và khô</p>
                        <p>Da đỏ và khô</p>
                        <p>Da đỏ và khô</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-contact d-flex mt-3 justify-content-between px-2">
            <input type="text"
                style="
            padding: 15px 60px 15px 5px;
            border: 3px solid #040b7a;
            border-radius: 10px;
          "
                placeholder="Số điện thoại" />
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

        <div
            style="
          border-radius: 27px;
          background-image: linear-gradient(
            rgba(21, 110, 213, 0.9),
            rgb(148, 26, 158)
          );
        ">
            <div class="d-flex py-4 mt-3">
                <div class="image" style="width: 55%; padding: 0 5px 0 10px">
                    <img style="width: 100%; height: auto" src="{{asset('frontend/assets/image/capture-20230330075742-kkijj.jpg')}}"
                        alt="" />
                </div>
                <div class="content">
                    <div class="title">
                        <p class="fw-bold fs-4 pb-1" style="color: #fefe01; border-bottom: 3px solid #ffffff">
                            VIÊM DA CƠ ĐỊA
                        </p>
                    </div>
                    <div class="text-white" style="font-weight: 500">
                        <p>Da đỏ và khô</p>
                        <p>Da đỏ và khô</p>
                        <p>Da đỏ và khô</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-contact d-flex mt-3 justify-content-between px-2">
            <input type="text"
                style="
            padding: 15px 60px 15px 5px;
            border: 3px solid #040b7a;
            border-radius: 10px;
          "
                placeholder="Số điện thoại" />
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
    </div>

    <div>
        <div class="logo text-center my-3 position-relative">
            <img class="position-absolute w-50" style="left: 10px"
                src="{{asset('frontend/assets/image/lovepik-falling-leaves-png-image_401334673_wh1200-20220718075641.png')}}"
                alt="" />
            <img style="width: 35%"
                src="{{asset('frontend/assets/image/9d8ed5_651b6cb038ff4917bcdbe0c58ca2c241_mv2-20220718075842.png')}}" alt="" />
        </div>

        <div class="text-center px-2">
            <h3 class="fw-bold fs-1" style="color: #e47d04">
                SẢN PHẨM ĐƯỢC BỘ Y TẾ
            </h3>
            <p class="fw-bold" style="color: #74267b">
                CẤP PHÉP LƯU HÀNH TOÀN QUỐC VÀ ĐẢM BẢO CHẤT LƯỢNG
            </p>
        </div>
    </div>

    <div class="p-2">
        <div class="d-flex mb-2">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-1">
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
        <div class="d-flex mb-2">
            <div class="check">
                <img style="width: 30px" src="{{asset('frontend/assets/image/check.png')}}" alt="" />
            </div>
            <div class="content ps-0 mt-1">
                Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                tình trạng viêm da cơ địa
                <span>
                    Giải pháp hỗ trợ cho tình trạng viêm da cơ địa,Giải pháp hỗ trợ cho
                    tình trạng viêm da cơ địa
                </span>
            </div>
        </div>
    </div>

    <!-- 111 -->
    <!-- <div class="mt-2">
      <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="" />
    </div> -->

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="Image 1" />
            </div>
            <div class="swiper-slide">
                <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="Image 2" />
            </div>
            <div class="swiper-slide">
                <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="Image 3" />
            </div>
            <div class="swiper-slide">
                <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="Image 4" />
            </div>
            <div class="swiper-slide">
                <img class="img-fluid" src="{{asset('frontend/assets/image/3-20220711074704.jpg')}}" alt="Image 5" />
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3 class="fw-bold text-center fs-4" style="color: #8e24aa">
            DIỄN VIÊN DOÃN QUỐC ĐAM
        </h3>

        <div class="video mt-3">
            <iframe width="100%" height="245" src="https://www.youtube.com/embed/hjxLhmmUk2M?si=FgylQJhkA8EkblqY"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <div class="p-2">
            <p>
                Diễn viên Doãn Quốc Đam - "Mến Trọc" (Phim Phố trong làng) chia sẻ cảm
                nhận về bộ sản phẩm "DAMOS" đã giúp anh thoát chứng mề đay ngứa ngáy,
                vảy nến toàn thân
            </p>
        </div>
    </div>

    <div style="background-color: #f5f4f4" class="mt-3 py-3 text-center">
        <h3 class="fw-bold mb-2" style="color: #e47d04">
            PHẢN HỒI CỦA KHÁCH HÀNG
        </h3>
        <p class="fw-bold fs-5" style="color: #74267b">VỀ SẢN PHẨM DAMOS</p>

        <div style="border: 1px solid #a7a0a0" class="w-75 mx-auto"></div>

        <div class="list-video mt-3 mx-3">
            <div class="item">
                <div style="border: 8px outset #ffffff">
                    <iframe width="100%" height="215"
                        src="https://www.youtube.com/embed/jUL5V10hELI?si=loI9TWI7rUsp_fgG"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <p style="text-align: left" class="mt-3">
                    Chú Tô Hiển Binh viêm da cơ địa đã sử dụng bộ sản phẩm Damos và chia
                    sẻ lại quá trình áp dụng Cách khắc phục của trung tâm
                </p>
            </div>
            <div class="item">
                <div style="border: 8px outset #ffffff">
                    <iframe width="100%" height="215"
                        src="https://www.youtube.com/embed/jUL5V10hELI?si=loI9TWI7rUsp_fgG"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <p style="text-align: left" class="mt-3">
                    Chú Tô Hiển Binh viêm da cơ địa đã sử dụng bộ sản phẩm Damos và chia
                    sẻ lại quá trình áp dụng Cách khắc phục của trung tâm
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <h3 class="fw-bold" style="color: #e47d04">DAMOS VINH DỰ TOP 10</h3>
        <p class="fw-bold" style="color: #74267b">
            THƯƠNG HIỆU DA LIỄU CHÂU Á THÁI BÌNH DƯƠNG
        </p>

        <div class="px-3 py-2" style="background-color: #e0cdf4">
            <img class="img-fluid"
                src="{{asset('frontend/assets/image/279073191_398487491867279_3954641521490708664_n-20220718141317.jpg')}}"
                alt="" />
        </div>
    </div>

    <div style="background-color: #f4f3fd" class="">
        <div class="form-footer m-2 p-3" style="background-color: #540778">
            <h3 class="fw-bold text-center mb-4" style="color: #ffffff">
                Để lại số điện thoại để phòng khám tư vấn ngay
            </h3>

            <form action="" method="post">
                <div class="form-group mb-3">
                    <input type="text" placeholder="Họ và tên" class="form-control" />
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Số điện thoại" class="form-control" pattern="[0-9]{10}"
                        title="Please enter a valid 10-digit phone number" required />
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
                 Hotline:  {{ $config->phone }}
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
            <input type="text" class="phone-input" placeholder="Số điện thoại" />
            <button class="quote-button">BÁO GIÁ ƯU ĐÃI</button>
        </div>
    </div>

    <div class="contact-icons">
        <a target="_blank" href="tel:{{$config->phone}}" class="icon phone" title="Call">
            <img src="{{asset('frontend/assets/image/logo-phone.png')}}" alt="" />
        </a>
        <a target="_blank" href="https://zalo.me/{{$config->phone}}" class="icon zalo" title="Zalo">
            <img src="{{asset('frontend/assets/image/Logo-zalo.png')}}" alt="" />
        </a>
        <a target="_blank" href="{{$config->fanpage}}" class="icon messages" title="Messages">
            <img src="{{asset('frontend/assets/image/logo-mess.png')}}" alt="" />
        </a>
    </div>

    <div class="scroll-top" onclick="scrollToTop()">▲</div>

    <!-- Bootstrap JS (Optional) -->
    <script src="{{asset('frontend/assets/js/all.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/dist/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/swiper/swiper-bundle.min.js')}}"></script>

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
    </script>
</body>

</html>
