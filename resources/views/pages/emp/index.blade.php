@extends('layouts.admin')

@section('content')
<section class="vbox">
  <section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
      <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#">Quản lí</a></li>
      <li class="active">Nhân viên</li>
    </ul>

    <section class="panel panel-default">
      <header class="panel-heading">
        Danh sách nhân viên (5)
      </header>
      <div class="row wrapper">
        <div class="col-sm-9 m-b-xs">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addEmpModal">Thêm</button>
          <button class="btn btn-sm btn-danger">Xóa (5)</button>
          <button class="btn btn-sm btn-default">In Lương (5)</button>
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>

      <!-- Table emp -->
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th width="20"><input type="checkbox"></th>
              <th class="th-sortable" data-toggle="class">Họ và Tên
                <span class="th-sort">
                  <i class="fa fa-sort-down text"></i>
                  <i class="fa fa-sort-up text-active"></i>
                  <i class="fa fa-sort"></i>
                </span>
              </th>
              <th>Ngày sinh</th>
              <th>Ngày làm việc</th>
              <th>SĐT</th>
              <th width="30"></th>
            </tr>
          </thead>
          <tbody>
            @if (isset($emps) && count($emps) > 0)
            @foreach ($emps as $emp)
            <tr>
              <td><input type="checkbox" name="emps[]" value="{{ $emp->id }}"></td>
              <td>{{ $emp->name }}</td>
              <td>{{ $emp->birthday }}</td>
              <td>{{ $emp->start_date }}</td>
              <td>{{ $emp->phone }}</td>
              <td>
                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <!-- Table emp -->

      <div id="addEmpModal"  class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Thêm nhân viên</h4>
            </div>
            <div class="modal-body">
              <form data-validate="parsley">
                  <div class="form-group">
                    <label>Họ và Tên</label>
                    <input type="text" class="form-control" data-required="true">
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" data-type="phone" data-required="true">
                  </div>
                  <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                      <label>Nhập mật khẩu</label>
                      <input type="password" class="form-control" data-required="true" id="pwd">
                    </div>
                    <div class="col-sm-6">
                      <label>Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" data-equalto="#pwd" data-required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="text" class="form-control" data-type="date" placeholder="Ngày-Tháng-Năm" data-required="true">
                  </div>
                  <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="text" class="form-control" data-type="date" placeholder="Ngày-Tháng-Năm" data-required="true">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="check" checked data-required="true"> I agree to the <a href="#" class="text-info">Terms of Service</a>
                    </label>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Lưu</button>
            </div>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    </section>
  </section>

@endsection

@section('scripts')
  <script src="{!! asset('js/app.plugin.js') !!}"></script>
  <script src="{!! asset('js/charts/sparkline/jquery.sparkline.min.js') !!}"></script>
@endsection