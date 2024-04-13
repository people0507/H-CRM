<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>H-CRM</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" type="text/css" href="{{ asset('../css/main.css') }}">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

<style>
  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px;
    background-color: #4CAF50; /* Màu xanh */
    color: white;
    z-index: 9999;
    display: none; /* Ẩn ban đầu */
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.notification.success {
    background-color: #4CAF50; /* Màu xanh */
}

.notification.failed {
    background-color: #ff3333; /* Màu đỏ */
    color: white;
}


.notification.show {
    display: block;
    animation: slideInRight 0.5s ease-out forwards;
}

@keyframes slideInRight {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(0);
    }
}

</style>


@if(session('success'))
<div id="notification" class="notification success">
    <p id="notification-message"></p>
    <span id="close-notification" class="close-notification">{{ session('success') }}</span>
</div>
@endif

@if(session('failed'))
    <div id="notification" class="notification failed">
    <p id="notification-message"></p>
    <span id="close-notification" class="close-notification">{{ session('failed') }}</span>
    </div>
@endif

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item dropdown has-divider">
        <div class="navbar-dropdown">
          <a href="profile.html" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-settings"></i></span>
            <span>Settings</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Messages</span>
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>
      </div>
      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
          <div class="user-avatar">
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
          </div>
          <div class="is-user-name"><span>John Doe</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
        </a>
        <div class="navbar-dropdown">
          <a href="profile.html" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-settings"></i></span>
            <span>Settings</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Messages</span>
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      <b class="font-black">H-CRM</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <ul class="menu-list">
    @if(isset($mode) && $mode == 1)
    <li class="active">
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Quản Lý KH</span>
          <span class="icon"><i class="mdi mdi-minus"></i></span>
        </a>
        <ul class="menu-list">
          <li class="active">
            <a href="{{route('khach_hang')}}">
              <span>Khách Hàng Chăm Sóc</span>
            </a>
          </li>
          <li>
            <a href="{{route('khach_hang_dv')}}">
              <span>Khách Hàng Dịch Vụ</span>
            </a>
          </li>
        </ul>
      </li>
    @endif

    @if(isset($mode) && $mode == 3)
    <li class="active">
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Quản Lý KH</span>
          <span class="icon"><i class="mdi mdi-minus"></i></span>
        </a>
        <ul class="menu-list">
          <li >
            <a href="{{route('khach_hang')}}">
              <span>Khách Hàng Chăm Sóc</span>
            </a>
          </li>
          <li class="active" >
            <a href="{{route('khach_hang_dv')}}">
              <span>Khách Hàng Dịch Vụ</span>
            </a>
          </li>
        </ul>
      </li>
    @endif

    @if((isset($mode) && $mode == 2) || isset($mode) && $mode == 4)
    <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Quản Lý KH</span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul class="menu-list">
          <li >
            <a href="{{route('khach_hang')}}">
              <span>Khách Hàng Chăm Sóc</span>
            </a>
          </li>
          <li >
            <a href="{{route('khach_hang_dv')}}">
              <span>Khách Hàng Dịch Vụ</span>
            </a>
          </li>
        </ul>
      </li>
    @endif

    @if(isset($mode) && $mode == 2)
      <li class="active">
        <a href="{{route('hop_dong')}}">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Hợp Đồng</span>
        </a>
      </li>
    @else
    <li class="--set-active-tables-html">
        <a href="{{route('hop_dong')}}">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Hợp Đồng</span>
        </a>
      </li>
    @endif
    @if(isset($mode) && $mode == 4)
      <li class="active">
        <a href="{{route('nhan_vien')}}">
          <span class="icon"><i class="mdi mdi-account"></i></span>
          <span class="menu-item-label">Người Dùng</span>
        </a>
      </li>
    @else
      <li class="--set-active-forms-html">
          <a href="{{route('nhan_vien')}}">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span class="menu-item-label">Người Dùng</span>
          </a>
      </li>
    @endif
    <li class="--set-active-forms-html">
          <a href="#">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Báo Cáo</span>
          </a>
      </li>
    </ul>
  </div>
</aside>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Trang Chủ</li>
      @if(isset($mode) && $mode == 1)
      <li>Khách Hàng Chăm Sóc</li>
      @endif
      @if(isset($mode) && $mode == 2)
      <li>Hợp Đồng</li>
      @endif
      @if(isset($mode) && $mode == 3)
      <li>Khách Hàng Dịch Vụ</li>
      @endif
      @if(isset($mode) && $mode == 4)
      <li>Người Dùng</li>
      @endif
    </ul>
    <div class="flex">
      @if($mode == 1)
      <form action="{{route('tim_khach_hang')}}" method="GET">
        <input placeholder="Nhập tên khách hàng" class="input flex-auto w-64" name="key_word">
        <input hidden type="text" name="khcs" value="1">
        <button class="flex-auto w-32 button bg-gray-400 mx-3 rounded-lg">Tìm Kiếm</button>
        @elseif($mode == 3)
        <form action="{{route('tim_khach_hang')}}" method="GET">
        <input placeholder="Nhập tên khách hàng" class="input flex-auto w-64" name="key_word">
        <input hidden type="text" name="khdv" value="3">
        <button class="flex-auto w-32 button bg-gray-400 mx-3 rounded-lg">Tìm Kiếm</button>
        @else
          @if( isset($batTimKiem) && $batTimKiem == 1)
          <form action="{{route('tim_hop_dong')}}" method="GET">
          <input placeholder="Nhập tên hợp đồng" class="input flex-auto w-64" name="key_word">
          <input hidden type="text" name="hop_dong" value="2">
        <button class="flex-auto w-32 button bg-gray-400 mx-3 rounded-lg">Tìm Kiếm</button>
          @endif
        @endif
      </form>
    </div>
  </div>
</section>

@if(isset($mode) && $mode == 1)
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    Khách Hàng Chăm Sóc
    </h1>
    <div class="flex flex-row">
      <input class="mx-8 button bg-green-400 basis-1/4" type="button" value="Import">
      <span class="button bg-sky-400 --jb-modal basis-1/4" data-target="add-modal">Thêm Mới</span>
    </div>
  </div>
</section>
@if(!$khachHang->isEmpty())
  <section class="section main-section">
    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>STT</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Ngày Tạo</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($khachHang as $kh) 
          <tr>
            <td data-label="ID">{{$loop->iteration}}</td>
            <td data-label="Name"><span class="--jb-modal text-blue-500" data-target="detail-modal-{{$kh->id_kh}}">{{$kh->ten_kh}}</span></td>
            <td data-label="Company">{{$kh->sdt}}</td>
            <td data-label="City">{{$kh->dia_chi}}</td>

            <td data-label="Created">
              <p  title="Oct 25, 2021">{{ date('d-m-Y', strtotime($kh->created_at)) }}</p>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
              <button class="button  green --jb-modal"  data-target="up-modal-{{$kh->id_kh}}" type="button">
                  <span class="icon"><i class="mdi mdi-account-star"></i></span>
                </button>
                <button class="button  blue --jb-modal"  data-target="update-modal-{{$kh->id_kh}}" type="button">
                  <span class="icon"><i class="mdi mdi-settings-box"></i></span>
                </button>
                <button class="button  red --jb-modal" data-target="delete-modal-{{$kh->id_kh}}" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        <div class="table-pagination">
        {{ $khachHang->links() }}
        </div>
      </div>
    </div>
  </section>
  @else
  <div class="m-20 text-center font-bold text-lg">Không có dữ liệu của khách hàng chăm sóc</div>
@endif
  @endif

  @if(isset($mode) && $mode == 2)
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    Hợp Đồng
    </h1>
  </div>
</section>
@if(!$hopDong->isEmpty())
<section class="section main-section">
    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>STT</th>
            <th>Tên Hợp Đồng</th>
            <th>Khách Hàng</th>
            <th>Người Dùng</th>
            <th>DVSD</th>
            <th>Ngày Ký</th>
            <th>Ngày Hiệu Lực</th>
            <th>Ngày Hết Hạn</th>
            <th>File</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($hopDong as $hd) 
          <tr>
            <td data-label="ID">{{$loop->iteration}}</td>
            <td data-label="Name">{{$hd->ten_hd}}</td>
            <td data-label="City">{{$hd->khachHang->ten_kh}}</td>
            <td data-label="City">{{$hd->nhanVien->ten_nv}}</td>
            <td data-label="Company">{{$hd->dich_vu_su_dung}}</td>
            <td data-label="City">{{ date('d-m-Y', strtotime($hd->ngay_ky_hd)) }}</td>
            <td data-label="City">{{ date('d-m-Y', strtotime($hd->ngay_hieu_luc)) }}</td>
            <td data-label="City">{{ date('d-m-Y', strtotime($hd->ngay_het_han_hd)) }}</td>
            <td data-label="City"><a class="text-blue-500" href="{{$lienKet}}/{{$hd->tep_tin}}" download>{{$hd->tep_tin}}</a></td>
          </tr>
          @endforeach
          </tbody>
        </table>
        <div class="table-pagination">
        {{ $hopDong->links() }}
        </div>
      </div>
    </div>
  </section>
  @else
  <div class="m-20 text-center font-bold text-lg">Không có dữ liệu của hợp đồng</div>
@endif
@endif

@if(isset($mode) && $mode == 3)
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    Khách Hàng Dịch Vụ
    </h1>
  </div>
</section>

@if(!$khachHang->isEmpty())
<section class="section main-section">
    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>STT</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Hợp Đồng</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($khachHang as $kh) 
          <tr>
            <td data-label="ID">{{$loop->iteration}}</td>
            <td data-label="Name"><span class="--jb-modal text-blue-500" data-target="detail-modal-{{$kh->id_kh}}">{{$kh->ten_kh}}</span></td>
            <td data-label="Company">{{$kh->sdt}}</td>
            <td data-label="City">{{$kh->dia_chi}}</td>

            <td data-label="Created">
              <a class="text-blue-500" href="{{ route('xem_hop_dong', ['id' => $kh->id_kh]) }}">Xem Thêm</a>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
              <button class="button  green --jb-modal"  data-target="add-contract-modal-{{$kh->id_kh}}" type="button">
                  <span class="icon"><i class="mdi mdi-file-document-box"></i></span>
                </button>
                <button class="button  blue --jb-modal"  data-target="update-modal-{{$kh->id_kh}}" type="button">
                  <span class="icon"><i class="mdi mdi-settings-box"></i></span>
                </button>
              </div>
            </td>
          </tr>

          <!-- Add Contract Modal  -->
        <div id="add-contract-modal-{{$kh->id_kh}}" class="modal">
          <div class="modal-background --jb-modal-close"></div>
          <div class="modal-card">
            <header class="modal-card-head">
              <p class="modal-card-title font-bold">Thêm Mới Hợp Đồng</p>
            </header>
            <form method="POST" action="{{ route('tao_hop_dong', ['id' => $kh->id_kh]) }}"  enctype="multipart/form-data">
              @csrf
            <section class="modal-card-body">
            <div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">Tên Hợp Đồng <span class="text-red-700">*</span> :</span>
                <input type="text" placeholder="Nhập" name="ten_hd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
              </div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">DVSD <span class="text-red-700">*</span> :</span>
                <input type="text" placeholder="Nhập" name="dvsd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
              </div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">Ngày Ký Hợp Đồng <span class="text-red-700">*</span> :</span>
                <input type="date" name="ngay_ky_hd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
              </div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">Ngày Hiệu Lực <span class="text-red-700">*</span> :</span>
                <input type="date" name="ngay_hieu_luc" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
              </div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">Ngày Hết Hạn <span class="text-red-700">*</span> :</span>
                <input type="date" name="ngay_het_han" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
              </div>
              <div class="flex my-3">
                <span class="flex-1 w-64 font-bold">Hợp Đồng Đính Kèm <span class="text-red-700">*</span> </span>
                <input type="file" name="file_hd" class="flex-auto w-64" accept=".pdf" required>
              </div>
          </div>
            </section>
            <footer class="text-right">
            <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
            <button class="button my-3 bg-red-300">Lưu</button>
            </footer>
            </form>
          </div>
        </div>
          @endforeach
          </tbody>
        </table>
        <div class="table-pagination">
        {{ $khachHang->links() }}
        </div>
      </div>
    </div>
  </section>
@else
  <div class="m-20 text-center font-bold text-lg">Không có dữ liệu của khách hàng dịch vụ</div>
@endif
@endif

@if(isset($mode) && $mode == 4)
<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    Người Dùng
    </h1>
    <span class="button bg-sky-400 --jb-modal " data-target="add-user-modal">Thêm Mới</span>
  </div>
</section>

<section class="section main-section">
    <div class="card has-table">
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th>STT</th>
            <th>Mã ND</th>
            <th>Tên Người Dùng</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Tài Khoản</th>
            <th>Vai Trò</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($nhanVien as $nv) 
          <tr>
          <td data-label="ID">{{$loop->iteration}}</td>
            <td>{{$nv->id_nv}}</td>
            <td>{{$nv->ten_nv}}</td>
            <td>{{$nv->sdt}}</td>
            <td>{{$nv->dia_chi}}</td>
            <td>{{$nv->tai_khoan}}</td>
            @if($nv->vai_tro == 0)
            <td>Quản Lý</td>
            @else
            <td>Nhân Viên</td>
            @endif

            <td class="actions-cell">
              <div class="buttons right nowrap">
                <button class="button  blue --jb-modal"  data-target="update-user-modal-{{$nv->id_nv}}" type="button">
                  <span class="icon"><i class="mdi mdi-settings-box"></i></span>
                </button>
                <button class="button  red --jb-modal"  data-target="delete-client-modal-{{$nv->id_nv}}" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </div>
            </td>
          </tr>

        <div id="update-user-modal-{{$nv->id_nv}}" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title font-bold">Sửa Thông Tin Người Dùng</p>
        </header>
        <form method="POST" action="{{ route('sua_nhan_vien', ['id' => $nv->id_nv]) }}">
          @csrf
        <section class="modal-card-body">
        <div>
        <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="ten_nv" class="input flex-auto w-64 bg-gray-100 rounded-lg" value ="{{$nv->ten_nv}}" required>
        </div>
        <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Số Điện Thoại <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="sdt" class="input flex-auto w-64 bg-gray-100 rounded-lg" value="{{$nv->sdt}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Địa Chỉ <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="dia_chi" class="input flex-auto w-64 bg-gray-100 rounded-lg" value="{{$nv->dia_chi}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tài Khoản<span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="tai_khoan" class="input flex-auto w-64 bg-gray-100 rounded-lg" value="{{$nv->tai_khoan}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Mật Khẩu <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="mat_khau" class="input flex-auto w-64 bg-gray-100 rounded-lg" value="{{$nv->mat_khau}}" required>
      </div>
        <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Vai Trò <span class="text-red-700">*</span> :</span>
        <select name="vai_tro" class="input flex-auto w-64 bg-gray-100 rounded-lg">
            <option value="0" {{ $nv->vai_tro == '0' ? 'selected' : '' }} >Quản Lý</option>
            <option value="1" {{ $nv->vai_tro == '1' ? 'selected' : '' }} >Nhân Viên</option>
        </select>
      </div>
      </div>
      </section>
     <footer class="text-right">
      <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
     <button class="button my-3 bg-red-300">Lưu</button>
      </footer>
      </form>
    </div>
    </div>
    
<!-- Delete Modal -->
<div id="delete-client-modal-{{$nv->id_nv}}" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Thông Báo</p>
    </header>
    <section class="modal-card-body">
      <p>Bạn có chắc chắn muốn xóa người dùng <b>{{$nv->ten_nv}}</b> ?</p>
    </section>
    <footer class="text-right">
    <form action="{{ route('xoa_nhan_vien', ['id' => $nv->id_nv]) }}" method="GET">
    @csrf
    @method('DELETE')
    <span class="button --jb-modal-close bg-gray-300">Hủy</span>
    <button class="button red --jb-modal-close">Xác Nhận</button>
  </form>
    </footer>
  </div>
</div>
          @endforeach
          </tbody>
        </table>
        <div class="table-pagination">
        {{ $nhanVien->links() }}
        </div>
      </div>
    </div>
  </section>
@endif


<!-- Add User Modal  -->
<div id="add-user-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title font-bold">Thêm Mới Thông Tin Người Dùng</p>
    </header>
    <form method="POST" action="{{ route('them_nhan_vien') }}">
      @csrf
    <section class="modal-card-body">
    <div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="ten_nv" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Số Điện Thoại <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="sdt" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Địa Chỉ <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="dia_chi" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tài Khoản<span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="tai_khoan" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Mật Khẩu <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="mat_khau" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Vai Trò <span class="text-red-700">*</span> :</span>
        <select name="vai_tro" class="input flex-auto w-64 bg-gray-100 rounded-lg">
            <option value="0">Quản Lý</option>
            <option value="1">Nhân Viên</option>
        </select>
      </div>
  </div>
    </section>
    <footer class="text-right">
    <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
    <button class="button my-3 bg-red-300">Lưu</button>
    </footer>
    </form>

  </div>
</div>

<!-- Add Client Modal  -->
<div id="add-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title font-bold">Thêm Mới Thông Tin Khách Hàng</p>
    </header>
    <form method="POST" action="{{ route('luu_khach_hang') }}">
      @csrf
    <section class="modal-card-body">
    <div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="ten_kh" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">SĐT <span class="text-red-700">*</span> :</span>
        <input type="tel" placeholder="Nhập" name="sdt_kh" class="input flex-auto w-64 bg-gray-100 rounded-lg" pattern="[0-9]{10}" maxlength="10" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Địa chỉ <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="dia_chi" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Sinh <span class="text-red-700">*</span> :</span>
        <input type="date" name="ngay_sinh" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Email <span class="text-red-700">*</span> :</span>
        <input type="email" placeholder="Nhập" name="email" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Giới tính <span class="text-red-700">*</span> :</span>
        <select name="gioi_tinh" class="input flex-auto w-64 bg-gray-100 rounded-lg">
            <option value="0">Nam</option>
            <option value="1">Nữ</option>
        </select>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">CCCD/CMND <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="cccd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngành Nghề <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="nganh_nghe" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
  </div>
    </section>
    <footer class="text-right">
    <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
    <button class="button my-3 bg-red-300">Lưu</button>
    </footer>
    </form>

  </div>
</div>


@if(isset($mode) && ($mode == 1 || $mode == 3))
@foreach($khachHang as $kh) 

<div id="up-modal-{{$kh->id_kh}}" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title font-bold">Chuyển lên Khách hành dịch vụ</p>
    </header>
    <form method="POST" action="{{ route('nang_cap_khach_hang', ['id' => $kh->id_kh]) }}" enctype="multipart/form-data">
      @csrf
    <section class="modal-card-body">
    <div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên Hợp Đồng <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="ten_hd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Dịch Vụ Sử Dụng <span class="text-red-700">*</span> :</span>
        <input type="tel" placeholder="Nhập" name="dvsd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Ký Hợp Đồng <span class="text-red-700">*</span> :</span>  
        <input type="date" name="ngay_ky_hd" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Hiệu Lực <span class="text-red-700">*</span> :</span>
        <input type="date" name="ngay_hieu_luc" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Hết Hạn <span class="text-red-700">*</span> :</span>
        <input type="date" name="ngay_het_han" class="input flex-auto w-64 bg-gray-100 rounded-lg" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Hợp Đồng Đính Kèm <span class="text-red-700">*</span> :</span>
        <input type="file" name="file_hd" class="flex-auto w-64" accept=".pdf" required>
      </div>
  </div>
    </section>
    <footer class="text-right">
    <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
    <button class="button my-3 bg-red-300">Lưu</button>
    </footer>
    </form>

  </div>
</div>


<!-- Update Modal  -->
<div id="update-modal-{{$kh->id_kh}}" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title font-bold">Sửa Thông Tin Khách Hàng</p>
    </header>
    <form method="POST" action="{{ route('sua_khach_hang', ['id' => $kh->id_kh]) }}">
      @csrf
    <section class="modal-card-body">
    <div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="ten_kh" class="input flex-auto w-64 bg-gray-100 rounded-lg" value ="{{$kh->ten_kh}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">SĐT <span class="text-red-700">*</span> :</span>
        <input type="tel" placeholder="Nhập" name="sdt_kh" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->sdt}}" pattern="[0-9]{10}" maxlength="10" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Địa chỉ <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="dia_chi" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->dia_chi}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Sinh <span class="text-red-700">*</span> :</span>
        <input type="date" name="ngay_sinh" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->ngay_sinh_kh}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Email <span class="text-red-700">*</span> :</span>
        <input type="email" placeholder="Nhập" name="email" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->email}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Giới tính <span class="text-red-700">*</span> :</span>
        <select name="gioi_tinh" class="input flex-auto w-64 bg-gray-100 rounded-lg">
            <option value="0" {{ $kh->gioi_tinh == '0' ? 'selected' : '' }} >Nam</option>
            <option value="1" {{ $kh->gioi_tinh == '1' ? 'selected' : '' }} >Nữ</option>
        </select>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">CCCD/CMND <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="cccd" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->cccd}}" required>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngành Nghề <span class="text-red-700">*</span> :</span>
        <input type="text" placeholder="Nhập" name="nganh_nghe" class="input flex-auto w-64 bg-gray-100 rounded-lg" value = "{{$kh->nganh_nghe}}" required>
      </div>
  </div>
    </section>
    <footer class="text-right">
    <span class="button --jb-modal-close my-3 bg-gray-300">Hủy</span>
    <button class="button my-3 bg-red-300">Lưu</button>
    </footer>
    </form>

  </div>
</div>

<!-- Detail Modal  -->
<div id="detail-modal-{{$kh->id_kh}}" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title font-bold">Chi Tiết Khách Hàng</p>
    </header>
    <section class="modal-card-body">
    <div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">STT :</span><span class="flex-1 w-64">{{ $loop->iteration }}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Tên :</span><span class="flex-1 w-64">{{$kh->ten_kh}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">SĐT :</span><span class="flex-1 w-64">{{$kh->sdt}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Địa chỉ :</span><span class="flex-1 w-64">{{$kh->dia_chi}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Sinh :</span><span class="flex-1 w-64">{{date('d-m-Y', strtotime($kh->ngay_sinh_kh))}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Email :</span><span class="flex-1 w-64">{{$kh->email}}</span>
      </div>
      <div class="flex my-3">
        @if($kh->gioi_tinh == 0)
        <span class="flex-1 w-64 font-bold">Giới tính :</span><span class="flex-1 w-64">Nam</span>
        @else
        <span class="flex-1 w-64 font-bold">Giới tính :</span><span class="flex-1 w-64">Nữ</span>
        @endif
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">CCCD/CMND :</span><span class="flex-1 w-64">{{$kh->cccd}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngành Nghề :</span><span class="flex-1 w-64">{{$kh->nganh_nghe}}</span>
      </div>
      <div class="flex my-3">
        <span class="flex-1 w-64 font-bold">Ngày Tạo :</span><span class="flex-1 w-64">{{date('d-m-Y', strtotime($kh->created_at))}}</span>
      </div>
</div>
    </section>
    <footer class="text-right">
      <button class="button --jb-modal-close my-3 bg-gray-300">Đóng</button>
    </footer>
  </div>
</div>

<!-- Delete Modal -->
<div id="delete-modal-{{$kh->id_kh}}" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Thông Báo</p>
    </header>
    <section class="modal-card-body">
      <p>Bạn có chắc chắn muốn xóa khách hàng <b>{{$kh->ten_kh}}</b> ?</p>
    </section>
    <footer class="text-right">
    <form action="{{ route('xoa_khach_hang', ['id' => $kh->id_kh]) }}" method="GET">
    @csrf
    @method('DELETE')
    <span class="button --jb-modal-close bg-gray-300">Hủy</span>
    <button class="button red --jb-modal-close">Xác Nhận</button>
  </form>
    </footer>
  </div>
</div>
@endforeach
@endif

</div>

<!-- Scripts below are for demo only -->
<script src="{{ asset('../js/main.min.js?v=1628755089081') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="{{ asset('../js/chart.sample.min.js') }}"></script>

<script>
  // Hiển thị thông báo
function showNotification(message) {
    var notification = document.querySelector('.notification');
    notification.innerHTML = message;
    notification.classList.add('show');

    // Tự động ẩn sau 5 giây
    setTimeout(function() {
        hideNotification();
    }, 5000); // Ẩn sau 5 giây
}

// Ẩn thông báo
function hideNotification() {
    var notification = document.querySelector('.notification');
    notification.classList.remove('show');
}

// Hiển thị thông báo khi trang được load
window.onload = function() {
    var successMessage = "{{ session('success') }}";
    var failedMessage = "{{ session('failed') }}";

    if (failedMessage) {
        showNotification(failedMessage);
    }
    if (successMessage) {
        showNotification(successMessage);
    }
};


</script>

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<script src="https://cdn.tailwindcss.com"></script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
