@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Update Profile</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('update.profile',$editData->id)}} " enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData->name}}" name="name" class="form-control" required="" >

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>User Eamil <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" value="{{$editData->email}}" name="email" class="form-control" required="" >

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Mobile <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData->mobile}}" name="mobile" class="form-control" required="" >

                                                    </div>

                                                </div>


                                            </div>


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>User Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$editData->address}}" name="address" class="form-control" required="" >

                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>User Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="select" required="" class="form-control">
                                                            <option value="" selected="" disabled=""> Select Gender</option>
                                                            <option value="Male" {{($editData->gender == "Male" ? "selected" : "")}}>Male</option>
                                                            <option value="Female"  {{($editData->gender == "Female" ? "selected" : "")}}>Female</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" value="{{$editData->image}}"
                                                        name="image" class="form-control" id="image">

                                                    </div>




                                                </div>

                                                <div class="form-group">

                                                    <div class="controls">

                                                        <img id="showImage"

                                                        src="{{(!empty($editData->image)) ? url('upload/user_images/'.$editData->image)
                                                        : url('upload/no_image.jpg')}}" style="width: 100px; width:100px; border:2px;">
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


            <script type="text/javascript">

                $(document).ready(function () {
                    $('#image').change(function(e){
                        //  e.preventDefault();
                        var reader  = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    })

                });

            </script>

            @endsection