@extends('dashboard')
@section('content')
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=date], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #099d5e;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}


.col-20 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-80 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Bố cục linh hoạt: khi màn hình có chiều rộng dưới 600px thì hai cột chồng 
lên nhau thay vì nằm cạnh nhau */
@media screen and (max-width: 600px) {
  .col-20, .col-80, input[type=submit] {
    width: 100%;
    margin-top: 0;
}
}
</style>
</head>
<section>
<div class="padding-right">
   <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Cập nhật thông tin</h2>
    </div><!--features_items-->
<!--/recommended_items-->
    <div>
<body>
  <div class="container">
    <form action="/save-info" enctype="multipart/form-data" method="POST">
    @csrf
      <div class="row">
        <div class="col-20">
          <label for="name">Họ và tên</label>
        </div>
        <div class="col-80">
          <input type="text" id="name" name="name" value="" placeholder="Tên của bạn">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="email">E-mail</label>
        </div>
        <div class="col-80">
          <input type="text" id="email" name="email" value="" placeholder="Email của bạn">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="phone">Số điện thoại</label>
        </div>
        <div class="col-80">
          <input type="text" id="phone" name="phone" value="" placeholder="Số điện thoại của bạn">
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label for="birthday">Ngày sinh</label>
        </div>
        <div class="col-80">
          <input type="date" id="birthday" value="" name="birthday">
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label for="gender">Giới tính</label>
        </div>
        <div class="col-80">
          <select id="gender" name="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label for="picture">Ảnh</label>
        </div>
        <div class="col-80">
          <input type="file" id="picture" name="picture" placeholder="Tên của bạn">
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label for="country">Khu vực</label>
        </div>
        <div class="col-80">
          <select id="country" name="country">
            <option value="Khu vực 0">Khu vực 0</option>
            <option value="Khu vực 1">Khu vực 1</option>
            <option value="Khu vực 2">Khu vực 2</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
          <center><input type="submit" value="Xác nhận"></center>
      </div>
    </form>
  </div>
</body>
</div>
  </div>
</section>
<br>
@endsection