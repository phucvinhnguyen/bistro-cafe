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
        Danh sách nhân viên ({{count($emps)}})
      </header>
      <div class="row wrapper">
        <div class="col-sm-9 m-b-xs">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addEmpModal">Thêm</button>
          <button class="btn btn-sm btn-danger">Xóa (<span class="count-checked">0</span>)</button>
          <button class="btn btn-sm btn-default">In Lương (<span class="count-checked">0</span>)</button>
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
      <form action=""></form>
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
                <td><input type="checkbox" name="emps[]" value="{!! $emp->id !!}"></td>
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
              <form data-validate="parsley" method="POST" action="{{ route('employees.store') }}">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <label>Họ và Tên</label>
                    <input type="text" class="form-control" name="name" data-required="true">
                  </div>
                  <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                      <label>Giới tính</label>
                      <select name="sex" class="form-control m-b">
                          <option>Nam</option>
                          <option>Nữ</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label>Số điện thoại</label>
                      <input type="text" class="form-control" name="phone" data-type="phone" data-required="true">
                    </div>
                  </div>
                  <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                      <label>Nhập mật khẩu</label>
                      <input type="password" class="form-control" name="password" data-required="true" id="pwd">
                    </div>
                    <div class="col-sm-6">
                      <label>Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" data-equalto="#pwd" data-required="true">
                    </div>
                  </div>
                  <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                      <label>Ngày sinh</label>
                      <div class="input-group date" id="birthday">
                        <input class="datepicker-input form-control" size="16" type="text" value="" data-date-format="yyyy-mm-dd" name="birthday"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                      </div>
                    </div>
                      <div class="col-sm-6">
                        <label>Ngày làm việc</label>
                      <div class="input-group date" id="birthday">
                        <input class="datepicker-input form-control" size="16" type="text" value="" data-date-format="yyyy-mm-dd" name="start_date"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                      </div>
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              <button class="btn btn-primary" type="submit">Lưu</button>

              </div>
              </form>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    </section>
  </section>

@endsection

@section('scripts')

@endsection