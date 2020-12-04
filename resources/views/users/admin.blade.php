@extends("layouts.users.main")



@section('content')

    <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6  ">
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">تعداد حاضرین و غائبین کلاس های این هفته</h6>

                            <hr>
                            <div id="morris-dashboard-bar-chart" style="height:250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <div class="ml-3">
                                    <p class="mb-0">مدارس</p>
                                    <h6>12569</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <i class="mdi mdi-rocket icon-lg text-warning"></i>
                                <div class="ml-3">
                                    <p class="mb-0">کلاس</p>
                                    <h6>2346</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <i class="mdi mdi-diamond icon-lg text-info"></i>
                                <div class="ml-3">
                                    <p class="mb-0">معلمین</p>
                                    <h6>896546</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                                <div class="ml-3">
                                    <p class="mb-0">حاضرین</p>
                                    <h6>$ 56000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <i class="mdi mdi-diamond icon-lg text-info"></i>
                                <div class="ml-3">
                                    <p class="mb-0">غایبین</p>
                                    <h6>896546</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                                <div class="ml-3">
                                    <p class="mb-0"> در حال برگذاری</p>
                                    <h6>$ 56000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid-margin">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">لیست کلاس های هفته ی جاری</h6>
                            <div class="table-responsive">
                                <table class="table mt-3 border-top">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام مدرسه</th>
                                        <th>نام مدیر</th>
                                        <th>تعداد کلاس</th>
                                        <th>در حال برگذاری</th>
                                        <th>حاضرین</th>
                                        <th>غایبین</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>ریاضی 2</td>
                                        <td>7:30 - 9:30</td>
                                        <td>هنرستان امام</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
                                        <td>دهم</td>
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
