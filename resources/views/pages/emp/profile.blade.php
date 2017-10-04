@extends('layouts.admin')

@section('content')
<section class="vbox">

            <section class="scrollable padder">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="clearfix m-b">
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs">{{$emp->name}}</div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> {{$emp->address}}</small>
                          </div>
                        </div>
                        <div>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">Số Điện Thoại</small>
                          <p>{{$emp->phone}}</p>
                          <small class="text-uc text-xs text-muted">ngày sinh</small>
                          <p>{{$emp->birthday}}</p>
                          <small class="text-uc text-xs text-muted">ngày làm việc</small>
                          <p>{{$emp->start_date}}</p>
                          <small class="text-uc text-xs text-muted">ngày làm việc</small>
                          <p>{{$emp->start_date}}</p>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
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
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                            <form action="{{route('employees.update', $emp->id)}}" method="POST" id="updateEmp">
                            {!! csrf_field() !!}

                            <li class="list-group-item">
                              <div class="form-group">
                                  <label>Họ và Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{$emp->name}}" data-required="true">
                              </div>
                            </li>

                            <li class="list-group-item">
                              <div class="form-group pull-in clearfix">
                                <div class="col-sm-6">
                                  <label>Mật khẩu cũ</label>
                                  <input type="password" class="form-control" name="old_pwd" data-required="true">
                                </div>
                                <div class="col-sm-6">
                                <label>Mật khẩu mới</label>
                                  <input type="password" class="form-control" name="password" data-required="true">
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="form-group pull-in clearfix">
                                <div class="col-sm-6">
                                  <label>Ngày sinh</label>
                                  <div class="input-group date" id="birthday">
                                    <input class="datepicker-input form-control" size="16" type="text" value="{{ $emp->birthday }}" data-date-format="yyyy-mm-dd" name="birthday"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  </div>
                                </div>
                                  <div class="col-sm-6">
                                    <label>Ngày làm việc</label>
                                  <div class="input-group date" id="birthday">
                                    <input class="datepicker-input form-control" size="16" type="text" value="{{ $emp->start_date }}" data-date-format="yyyy-mm-dd" name="start_date"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  </div>
                                  </div>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="form-group pull-in clearfix">

                                <div class="col-sm-6">
                                  <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $emp->phone }}" data-required="true">
                                </div>

                                <div class="col-sm-6">
                                <label>Địa chỉ</label>
                                  <input type="text" class="form-control" name="address" value="{{ $emp->address }}" data-required="true">
                                </div>
                              </div>
                            </li>

                            <li class="list-group-item">
                              <div class="form-group pull-in clearfix">

                                <div class="col-sm-6">
                                    <label>Lương</label>
                                    <input type="text" class="form-control" name="salary" value="{{$emp->salary}}" data-required="true">
                                </div>
                                <div class="col-sm-6">
                                  <label>Tải ảnh</label>

                                  <input type="file" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline input-s" name="fileID" id="filestyle-0" style="position: fixed; left: -500px;">

                                  <input type="text" class="form-control input-s" disabled="">
                                  <label for="filestyle-0" class="btn btn-default"><span>Chọn</span></label>
                                </div>


                                <div class="col-sm-6">
                                    <label>Giới tính</label>
                                    <select name="sex" class="form-control m-b">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                  </div>

                              </div>
                            </li>

                          </ul>
                          <div class="row wrapper">
                            <div class="col-sm-5"><button class="btn btn-primary" type="submit">Lưu</button></div>
                          </div>
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