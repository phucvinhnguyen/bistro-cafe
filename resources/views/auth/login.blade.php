@extends('layouts.admin')

@section('content')
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xxl">
    <a class="navbar-brand block" href="index.html">Đăng nhập để truy cập!</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Đăng nhập</strong>
        </header>
        <form action="{{ route('auth') }}" class="panel-body wrapper-lg" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label">Số điện thoại</label>
            <input type="phone" placeholder="0988885355" name="phone" class="form-control input-lg">
          </div>
          <div class="form-group">
            <label class="control-label">Mật khẩu</label>
            <input type="password" id="inputPassword" name="password" placeholder="Mật khẩu" class="form-control input-lg">
          </div>
          <a href="#" class="pull-right m-t-xs"><small>Quên mật khẩu?</small></a>
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>NV develop<br>&copy; 2017</small>
      </p>
    </div>
  </footer>
@endsection

@section('scripts')

@endsection

