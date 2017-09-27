@extends('layouts.admin')

@section('content')
<section class="vbox">

  <section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
      <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#">Quản lí</a></li>
      <li class="active">Nhân viên</li>
    </ul>

  <div class="row">
      <div class="col-sm-6">
        <section class="panel panel-default">
          <header class="panel-heading">
            <div class="row">
              <div class="col-sm-10 m-b-xs">
                 Phân quyền truy cập
              </div>
              <div class="col-sm-2 m-b-xs">
                 <button class="btn btn-sm btn-primary" data-toggle="" data-target="">Thêm</button>
              </div>
            </div>

          </header>
          <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="th-sortable" data-toggle="class">Phân quyền</th>
                <th>Mô tả</th>
                <th width="30"></th>
              </tr>
            </thead>
            <tbody>
              @if (isset($roles) && count($roles) > 0)
                @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->description }} </td>
                  <td>
                    <a class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        </section>
      </div>
      <div class="col-sm-6">
        <section class="panel panel-default">
          <header class="panel-heading">Stats</header>
          <table class="table table-striped m-b-none">
            <thead>
              <tr>
                <th>Graph</th>
                <th>Item</th>
                <th width="70"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="sparkline" data-bar-color="#5cb85c" data-type="bar" data-height="19"><!--20,10,15,21,12,5,21,30,24,15,8,19--></div>
                </td>
                <td>App downloads</td>
                <td class="text-success">
                  <i class="fa fa-level-up"></i> 40%
                </td>
              </tr>
              <tr>
                <td>
                  <div class="sparkline" data-bar-color="#61a1e1" data-type="bar" data-height="19"><!--,5,21,30,24,15,8,19,20,10,15,21,12--></div>
                </td>
                <td>Social connection</td>
                <td class="text-success">
                  <i class="fa fa-level-up"></i> 20%
                </td>
              </tr>
              <tr>
                <td>
                  <div class="sparkline" data-bar-color="#999900" data-type="bar" data-height="19"><!--200,400,500,100,90,1200,1500,1000,800,500,80,50--></div>
                </td>
                <td>Revenue</td>
                <td class="text-warning">
                  <i class="fa fa-level-down"></i> 5%
                </td>
              </tr>
              <tr>
                <td>
                  <div class="sparkline" data-bar-color="#ff5f5f" data-type="bar" data-height="19"><!--15,21,30,24,15,8,19,20,10,15,21,12--></div>
                </td>
                <td>Customer increase</td>
                <td class="text-danger">
                  <i class="fa fa-level-down"></i> 20%
                </td>
              </tr>
            </tbody>
          </table>
        </section>
      </div>
    </div>
    <section class="panel panel-default">
      <header class="panel-heading">
        Danh sách nhân viên
        ({{count($emps)}})
      </header>
      <div class="row wrapper">
        <div class="col-sm-9 m-b-xs">
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addEmpModal">Thêm</button>
          <button type="submit" form="deleteEmp" id="btnDelete" class="btn btn-sm btn-danger">Xóa (<span class="count-checked">0</span>)</button>
          <!-- <button class="btn btn-sm btn-default">In Lương (<span class="count-checked">0</span>)</button> -->
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
      <form action="{{ route('employees.destroy') }}" method="POST" id="deleteEmp">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
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
              <th></th>
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
                <td>{!! parseSex($emp->sex) !!} </td>
                <td>{{ $emp->birthday }}</td>
                <td>{{ $emp->start_date }}</td>
                <td>{{ $emp->phone }}</td>
                <td>
                  <a class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      </form>
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
                          <option value="1">Nam</option>
                          <option value="2">Nữ</option>
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
<script src="{{ asset('js/parsley/parsley.min.js') }}"></script>
<script src="{{ asset('js/parsley/parsley.extend.js') }}"></script>

@endsection