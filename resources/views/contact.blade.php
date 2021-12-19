@extends('components.layouts.layout')
@section('content')

      <section class="dashboard-sec">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-lg-9 p-0">
                    <div class="dashboard-rght sm-hg">
                        <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="cmn-outr">
                                <div class="dash-hdr  mb-2">
                                    <h2>Contact Form</h2>
                                </div>
                                <div class="row">    
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Name <span class="required"> * </span></label>
                                             <input type="text" class="form-control" name="name" id="name" required>
                                         </div>
                                    </div>

                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Email-address <span class="required"> * </span></label>
                                             <input type="email" class="form-control" name="email" id="email" required>
                                         </div>
                                    </div>
                                </div>

                                <div class="row">    
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Subject <span class="required"> * </span></label>
                                             <input type="text" class="form-control" name="subject" id="subject" required>
                                         </div>
                                    </div>

                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Message <span class="required"> * </span></label>
                                             <textarea class="form-control" name="message" id="message" required></textarea>
                                         </div>
                                    </div>
                                </div>

                                <div class="row">    
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Date <span class="required"> * </span></label>
                                             <input type="text" class="form-control" name="date" id="date" value="{{date('Y-m-d')}}" readonly required>
                                         </div>
                                    </div>

                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">Time <span class="required"> * </span></label><br/>
                                             <select name="hh" id="hh" required style="width:30%">
                                                <option value="">HH</option>
                                                @for($i = 0;$i<=12;$i++)
                                                    <option value="{{ sprintf("%02d", $i) }}">{{ sprintf("%02d", $i) }}</option>
                                                @endfor
                                             </select>

                                             <select name="mm" id="mm" required style="width:30%">
                                                <option value="">MM</option>
                                                @for($i = 0;$i<=60;$i++)
                                                    <option value="{{ sprintf("%02d", $i) }}">{{ sprintf("%02d", $i) }}</option>
                                                @endfor
                                             </select>

                                             <select name="ampm" id="ampm" required style="width:30%">
                                                    <option value="AM">AM</option>
                                                    <option value="PM">PM</option>
                                             </select>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                             <label for="exam">File <span class="required"> Only jpeg, png, jpg, gif, svg, pdf accepted</span></label>
                                             <input type="file" name="file" id="file" class="form-control"/>
                                         </div>
                                    </div>

                                    <div class="col-md-6" style="text-align: right"> <br/>
                                        <input type="submit" value="SUBMIT" class="btn btn-primary"/>
                                    </div>
                                </div>
                         </form>
                         @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                         
                          @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif

                            @if (session('error'))                                
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

