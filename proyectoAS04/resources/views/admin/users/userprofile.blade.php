@extends('layouts.app2')

@section('content')

@section('titulo', 'Perfil de Usuario')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/0.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block">Sierra Brooks</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="user-profile-lite.html">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.html">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.html">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Success!</strong> Your profile has been updated! </div>
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">Sierra Brooks</h4>
                    <span class="text-muted d-block mb-2">Project Manager</span>
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                      <i class="material-icons mr-1">person_add</i>Follow</button>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="Sierra"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Last Name</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="Brooks"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="sierra@example.com"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password</label>
                                <input type="password" class="form-control" id="fePassword" placeholder="Password"> </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" id="feInputAddress" placeholder="1234 Main St"> </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" name="feDescription" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-accent">Update Account</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
          </main>
        </div>
       </div>
  

@endsection


<div class="container">

                    <div class="card-body container-fluid">
                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users', $user->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.users.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>