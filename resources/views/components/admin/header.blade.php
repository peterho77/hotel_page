<header class="primary-header">
    <section class="top-nav | padding-block-200">
        <div class="custom-container">
            <div class="row">
                <div class="header-logo | col-lg-2">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="col-lg-10">
                    <nav class="nav-wrapper">
                        <ul class="financial-tools | nav-list | align-center" role="list">
                            <li>
                                <a class="align-center" href="">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#file-invoice-dollar')}}">
                                        </use>
                                    </svg>
                                    <span>Hóa đơn điện tử</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-center" href="">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#sack-dollar')}}">
                                        </use>
                                    </svg>
                                    <span>Vay vốn</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-center" href="">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#credit-card')}}">
                                        </use>
                                    </svg>
                                    <span>Thanh toán</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-center" href="">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#circle-info')}}">
                                        </use>
                                    </svg>
                                    <span>Hỗ trợ</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="setting-options | nav-list">
                            <li class="branch | justify-center align-center">
                                <svg class="icon">
                                    <use xlink:href="{{asset('icon/admin/header-icons.svg#location-dot')}}">
                                    </use>
                                </svg>
                                <span>Chi nhánh trung tâm</span>
                            </li>
                            <ul class="setting-list | nav-list">
                                <li class="align-center">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#bell')}}">
                                        </use>
                                    </svg>
                                </li>
                                <li class="align-center">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#gear')}}">
                                        </use>
                                    </svg>
                                </li>
                                <li class="align-center">
                                    <svg class="icon">
                                        <use xlink:href="{{asset('icon/admin/header-icons.svg#user')}}">
                                        </use>
                                    </svg>
                                </li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom-nav | padding-block-100">
        <div class="custom-container">
            <nav class="nav-wrapper">
                <ul class="primary-nav | nav-list">
                    <li>Tổng quan</li>
                    <li class="room-nav">
                        Phòng
                        <ul class="sub-menu | padding-block-200">
                            <li><a href="">Hạng phòng & Phòng</a></li>
                            <li><a href="">Thiết lập giá</a></li>
                        </ul>
                    </li>
                    <li>Hàng hóa</li>
                    <li>Giao dịch</li>
                    <li>Đối tác</li>
                    <li>Nhân viên</li>
                    <li>Số quỹ</li>
                    <li>Bán online</li>
                    <li>Báo cáo</li>
                </ul>
                <button class="button" data-type="inverted">
                    <svg class="icon">
                        <use xlink:href="{{asset('icon/admin/header-icons.svg#bell-concierge')}}">
                        </use>
                    </svg>
                    Lễ tân
                </button>
            </nav>

        </div>
    </section>
</header>