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
                                        @foreach($course_times as $course_time)
                                            <div class="card rounded border mb-2">
                                                <div class="card-body p-3">
                                                    <div class="media text-center">
                                                        <i class="icon-book menu-icon"></i>
                                                        <div class="media-body">
                                                            <h6 class="mb-1 mr-2"> {{$course_time->course_name}} </h6>
                                                            <p class="mb-0 text-muted">
                                                                پایه ی {{$course_time->level_name}} -
                                                            </p>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                            <p class="mb-0 text-muted">
                                                                {{$course_time->end_session}} - {{$course_time->start_session}}
                                                            </p>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                            <p class="mb-0 text-muted">
                                                                {{$course_time->student_count}}
                                                            </p>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="mb-1 mr-2"> وضعیت کلاس</h6>
                                                            <p class="mb-0 text-muted">
                                                            @if ($course_time->status == 0)
                                                                <div class="badge badge-danger badge-fw">گذشته</div>
                                                            @elseif($course_time->status == 5)
                                                                <div class="badge badge-success badge-fw">برگزار شده</div>
                                                            @else
                                                                <div class="badge badge-primary badge-fw">در حال برگذاری</div>
                                                            @endif
                                                                </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
                            <canvas id="morris-dashboard-bar-chart_admin" style="height:250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i = 0;
                $c = 0;
                $h = 0;
                $q = 0;
            @endphp
            @foreach($schools as $item)
                @if (count($item->classes))
                    @foreach($item->classes as $class)
                        @if (count($class->course))
                            @foreach($class->course as $course)
                                @if (count($course->course_time))
                                    @foreach($course->course_time as $courseTime)
                                        @if ($courseTime->status <> 0 && $courseTime->status <>5)
                                            @php ++$c @endphp
                                        @endif
                                        @if (count($courseTime->present))
                                            @foreach($courseTime->present as $present)
                                                @if ($present->is_present == config("globalVariable.present"))
                                                    @php ++$h @endphp
                                                @else
                                                    @php ++$q @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
                    @php
                        $i += 1;
                    @endphp
            @endforeach
            <div class="row">
                <div class="col-md-6 col-lg-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-md-center">
                                <div class="ml-3">
                                    <p class="mb-0">مدارس</p>
                                    <h6>{{$schools->count()}}</h6>
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
                                    <h6>
                                        @php
                                        $k = 0;
                                        @endphp
                                        @foreach($schools as $item)
                                            @if (count($item->classes))
                                                @php
                                                    $k += count($item->classes);
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{$i}}
                                    </h6>
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
                                    <h6>{{$teachers_count}}</h6>
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
                                    <h6>{{$h}}</h6>
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
                                    <h6>{{$q}}</h6>
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
                                    <h6>{{$c}}</h6>
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
                                    @php
                                        $j = 1;
                                    @endphp
                                    @foreach($schools as $item)
                                        <tr>
                                            <td>{{$j}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->manager->name}}  {{$item->manager->family}}</td>
                                            <td>{{$item->classes->count()}}</td>
                                            <td>{{$c}}</td>
                                            <td> {{$h}}  </td>
                                            <td> {{$q}} </td>
                                        </tr>
                                        @php
                                            $j += 1;
                                        @endphp
                                    @endforeach
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

@section("script")
    <script>
        new Chart(document.getElementById("morris-dashboard-bar-chart_admin"), {
            type: 'bar',
            data: {
                labels: [
                    @foreach($week_course_times_present as $week_course_time)
                        "{{$week_course_time->name}}",
                    @endforeach
                    " ",
                ],

                datasets: [
                    {
                        label: "حاضرین",
                        backgroundColor: "#3e95cd",
                        data: [
                            @foreach($week_course_times_present as $week_course_time)
                                @php
                                    $h = 0;
                                @endphp
                                @if(count($week_course_time->classes))
                                    @foreach($week_course_time->classes as $class)
                                        @if(count($class->course))
                                            @foreach($class->course as $course)
                                                @if(count($course->course_time))
                                                    @foreach($course->course_time as $course_time)
                                                        @if(count($course_time->present))
                                                            @php
                                                                $h += $course_time->present->where("is_present",1)->count();
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            {{$h}},
                            @endforeach
                            0,
                        ]
                    }, {
                        label: "غایبین",
                        backgroundColor: "#8e5ea2",
                        data: [
                            @foreach($week_course_times_present as $week_course_time)
                                @php
                                    $q = 0;
                                @endphp
                                @if(count($week_course_time->classes))
                                    @foreach($week_course_time->classes as $class)
                                        @if(count($class->course))
                                            @foreach($class->course as $course)
                                                @if(count($course->course_time))
                                                    @foreach($course->course_time as $course_time)
                                                        @if(count($course_time->present))
                                                            @php
                                                                $q += $course_time->present->where("is_present",0)->count();
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                                {{$q}},
                            @endforeach
                            0,
                        ]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                },
                beginAtZero: true,
            }
        });
    </script>
@endsection
