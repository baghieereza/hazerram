@extends("layouts.users.main")



@section('content')

    <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">کلاس های امروز</h6>
                                    </div>
                                    <hr>
                                    <div id="dragula-left" class="py-2">
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media text-center">
                                                    <i class="icon-book menu-icon"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ریاضی 2 </h6>
                                                        <p class="mb-0 text-muted">
                                                            پایه ی یازدهم -
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                        <p class="mb-0 text-muted">
                                                            7:30 - 9:30
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                        <p class="mb-0 text-muted">
                                                            23
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <i class="icon-ban " style="color: red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media text-center">
                                                    <i class="icon-book menu-icon"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ریاضی 2 </h6>
                                                        <p class="mb-0 text-muted">
                                                            پایه ی یازدهم -
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                        <p class="mb-0 text-muted">
                                                            7:30 - 9:30
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                        <p class="mb-0 text-muted">
                                                            23
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <i class="icon-ban " style="color: red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media text-center">
                                                    <i class="icon-book menu-icon"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ریاضی 2 </h6>
                                                        <p class="mb-0 text-muted">
                                                            پایه ی یازدهم -
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                        <p class="mb-0 text-muted">
                                                            7:30 - 9:30
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                        <p class="mb-0 text-muted">
                                                            23
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <i class="icon-ban " style="color: red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card rounded border mb-2">
                                            <div class="card-body p-3">
                                                <div class="media text-center">
                                                    <i class="icon-book menu-icon"></i>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ریاضی 2 </h6>
                                                        <p class="mb-0 text-muted">
                                                            پایه ی یازدهم -
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                        <p class="mb-0 text-muted">
                                                            7:30 - 9:30
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                        <p class="mb-0 text-muted">
                                                            23
                                                        </p>
                                                    </div>
                                                    <div class="media-body">
                                                        <i class="icon-ban " style="color: red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">تعداد حاضرین و غائبین کلاس های این هفته</h6>

                            <hr>
                            <div id="morris-dashboard-bar-chart" style="height:250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid-margin">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">لیست کلاس های هفته ی جاری</h6>
                            <div class="table-responsive">
                                <table class="table mt-3 border-top">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام درس</th>
                                        <th>ساعت شروع / پایان</th>
                                        <th>نام مدرسه</th>
                                        <th>پایه</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>
                                            <div class="badge badge-success badge-fw">در حال برگذاری</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>
                                            <div class="badge badge-success badge-fw">در حال برگذاری</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>
                                            <div class="badge badge-success badge-fw">در حال برگذاری</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>
                                            <div class="badge badge-success badge-fw">در حال برگذاری</div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">اعلانات</h6>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
                                href="#">Bootstrapdash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection()
