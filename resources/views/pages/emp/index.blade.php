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
          <button class="btn btn-sm btn-primary">Thêm</button>                
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
            <tr>
              <td><input type="checkbox" name="post[]" value="2"></td>
              <td>Lorem ipsum.</td>
              <td>Jul 25, 2013</td>
              <td>Jul 25, 2013</td>
              <td>0123-456-789</td>
              <td>
                <a href="#" class="active" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            <tr>
              <td><input type="checkbox" name="post[]" value="3"></td>
              <td>Lorem ipsum dolor.</td>
              <td>Jul 25, 2013</td>
              <td>Jul 22, 2013</td>
              <td>0123-456-789</td>
              <td>
                <a href="#" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>                     
          </tbody>
        </table>
      </div>
      <!-- Table emp -->
    </section>
  </section>
        
@endsection

@section('scripts')
  <script src="{!! asset('js/app.plugin.js') !!}"></script>
  <script src="{!! asset('js/charts/sparkline/jquery.sparkline.min.js') !!}"></script>
@endsection