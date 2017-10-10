@extends('layouts.admin')

@section('content')
<section class="vbox">
  <section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
      <li><a href=""><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#">Quản lí</a></li>
      <li class="active">Thực đơn</li>
    </ul>
    <section class="hbox stretch">
      <aside class="bg-white">
        <section class="vbox">
          <header class="header bg-light bg-gradient">
            <ul class="nav nav-tabs nav-white">
                <li class="active"><a href="#activity" data-toggle="tab">Chỉnh sửa</a></li>
                <li class=""><a href="#events" data-toggle="tab">Hoạt động</a></li>
            </ul>
          </header>
          <section class="scrollable">
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <form action="" method="POST" id="updateEmp">
                  {!! csrf_field() !!}
                <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                  <div class="row wrapper">
                    <div class="col-sm-9 m-b-xs">
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addEmpModal">Thêm</button>
                      <button type="submit" form="deleteEmp" id="btnDelete" class="btn btn-sm btn-danger">Xóa (<span class="count-checked">0</span>)</button>
                      <!-- <button class="btn btn-sm btn-default">In Lương (<span class="count-checked">0</span>)</button> -->
                    </div>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Tìm nhân viên">
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-default" type="button">Tìm!</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                      <thead>
                      <tr>
                        <th width="20"><input type="checkbox"></th>

                        <th class="th-sortable" data-toggle="class">Tên thực phẩm
                          <span class="th-sort">
                            <i class="fa fa-sort-down text"></i>
                            <i class="fa fa-sort-up text-active"></i>
                            <i class="fa fa-sort"></i>
                          </span>
                        </th>
                        <th>ĐVT</th>
                        <th>Đơn giá</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td><input type="checkbox" name="food[]" value=""></td>
                            <td><a href=""></a></td>
                            <td></td>
                            <td></td>
                            <td>
                              <a href=""><i class="fa fa-edit"></i></a>
                            </td>
                          </tr>

                      </tbody>
                    </table>
                  </div>
                </ul>
                </form>
              </div>
              <div class="tab-pane" id="events">
                <div class="text-center wrapper">
                  <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                </div>
              </div>
              <div class="tab-pane" id="interaction">
                <div class="text-center wrapper">
                  <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                </div>
              </div>
            </div>
          </section>
        </section>
      </aside>
    </section>
  </section>

@endsection

@section('scripts')
  <script src="{{ asset('js/parsley/parsley.min.js') }}"></script>
  <script src="{{ asset('js/parsley/parsley.extend.js') }}"></script>
@endsection