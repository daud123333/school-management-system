@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update Group</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('student.group.update',$editData->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Class Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData->name}}" name="name" class="form-control" required="" >

                                                    </div>

                                                </div>


                                            </div>

                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->

                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->

            </div>
        </div>





        @endsection
