@extends("layouts.users.main")



@section('content')

    <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">

            <div class="row text-left">
                <div class="col-lg-2 d-flex flex-column ">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col-md-3">
                                    <b>نام درس : </b> <small>{{$course_time->course->name}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">پایه : </b> <small>{{$course_time->course->level->name}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">معلم : </b> <small> {{$course_time->course->teacher->name." ".$course_time->course->teacher->family}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">مدرسه : </b> <small> {{$course_time->course->classes->school->name}}</small>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-md-3">
                                    <b>ساعت شروع : </b> <small>{{$course_time->course->start_session}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">ساعت پایان : </b> <small> {{$course_time->course->end_session}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">وضعیت : </b> <small>
                                        @if ($course_time->status == 0)
                                            <div class="badge badge-danger badge-fw">گذشته</div>
                                        @elseif($course_time->status == 5)
                                            <div class="badge badge-success badge-fw">برگزار شده</div>
                                        @else
                                            <div class="badge badge-primary badge-fw">در حال برگذاری</div>
                                        @endif
                                    </small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">زمان مانده  : </b> <small>  <span id="demo" class="bg-linkedin text-center p-2" style=" color: #ffff"></span> </small>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>   ردیف  </th>
                                    <th> نام و نام خانوادگی </th>
                                    <th>  present_student_notif  </th>
{{--                                      بسته به تعداد سطرهای present student notif--}}
                                    <th>  Amount   </th>
                                    <th>  Deadline </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face1.jpg" alt="image">
                                    </td>
                                    <td>
                                        Herman Beck
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                 style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 77.99
                                    </td>
                                    <td>
                                        May 15, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face2.jpg" alt="image">
                                    </td>
                                    <td>
                                        Messsy Adam
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                 style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $245.30
                                    </td>
                                    <td>
                                        July 1, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face3.jpg" alt="image">
                                    </td>
                                    <td>
                                        John Richards
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                 style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $138.00
                                    </td>
                                    <td>
                                        Apr 12, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face4.jpg" alt="image">
                                    </td>
                                    <td>
                                        Peter Meggik
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 77.99
                                    </td>
                                    <td>
                                        May 15, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face5.jpg" alt="image">
                                    </td>
                                    <td>
                                        Edward
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                 style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 160.25
                                    </td>
                                    <td>
                                        May 03, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face6.jpg" alt="image">
                                    </td>
                                    <td>
                                        John Doe
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 123.21
                                    </td>
                                    <td>
                                        April 05, 2015
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1">
                                        <img src="../../../../images/faces/face7.jpg" alt="image">
                                    </td>
                                    <td>
                                        Henry Tom
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                 style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 150.00
                                    </td>
                                    <td>
                                        June 16, 2015
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection()
