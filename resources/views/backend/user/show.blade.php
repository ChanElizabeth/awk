@extends('backend.layouts.master')

@section('content')
@include('flash-message')

            <!-- .page-cover -->
            <header class="page-cover">
              <div class="text-center">
                <a href="user-profile.html" class="user-avatar user-avatar-xl fas fa-user"></a>
                <h2 class="h4 mt-2 mb-0"> {{Auth::user()->name}} </h2>
               
            </header><!-- /.page-cover -->
            <!-- Followers Modal -->
            <!-- .modal -->
            <div class="modal fade" id="followersModal" tabindex="-1" role="dialog" aria-labelledby="followersModalLabel" aria-hidden="true">
              <!-- .modal-dialog -->
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <!-- .modal-content -->
                <div class="modal-content">
                  <!-- .modal-header -->
                  <div class="modal-header">
                    <h6 id="followersModalLabel" class="modal-title"> Followers </h6>
                  </div><!-- /.modal-header -->
                  <!-- .modal-body -->
                  <div class="modal-body px-0">
                    <!-- .list-group -->
                    <div class="list-group list-group-flush list-group-divider">
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces2.jpg" alt="Johnny Day"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Johnny Day</a>
                          </h4>
                          <p class="list-group-item-text"> Computer Hardware Engineer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces3.jpg" alt="Sarah Bishop"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Sarah Bishop</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces5.jpg" alt="Craig Hansen"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Craig Hansen</a>
                          </h4>
                          <p class="list-group-item-text"> Software Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces9.jpg" alt="Jane Barnes"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Jane Barnes</a>
                          </h4>
                          <p class="list-group-item-text"> Social Worker </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces4.jpg" alt="Nicole Barnett"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Nicole Barnett</a>
                          </h4>
                          <p class="list-group-item-text"> Marketing Manager </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces6.jpg" alt="Michael Ward"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Michael Ward</a>
                          </h4>
                          <p class="list-group-item-text"> Lawyer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces8.jpg" alt="Juan Fuller"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Juan Fuller</a>
                          </h4>
                          <p class="list-group-item-text"> Budget analyst </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces7.jpg" alt="Julia Silva"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Julia Silva</a>
                          </h4>
                          <p class="list-group-item-text"> Photographer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces10.jpg" alt="Joe Hanson"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Joe Hanson</a>
                          </h4>
                          <p class="list-group-item-text"> Logistician </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces11.jpg" alt="Brenda Griffin"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Brenda Griffin</a>
                          </h4>
                          <p class="list-group-item-text"> Medical Assistant </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces12.jpg" alt="Ryan Jimenez"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Ryan Jimenez</a>
                          </h4>
                          <p class="list-group-item-text"> Photographer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces13.jpg" alt="Bryan Hayes"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Bryan Hayes</a>
                          </h4>
                          <p class="list-group-item-text"> Computer Systems Analyst </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces14.jpg" alt="Cynthia Clark"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Cynthia Clark</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces16.jpg" alt="Martha Myers"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Martha Myers</a>
                          </h4>
                          <p class="list-group-item-text"> Writer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces15.jpg" alt="Tammy Beck"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Tammy Beck</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces17.jpg" alt="Susan Kelley"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Susan Kelley</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces18.jpg" alt="Albert Newman"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Albert Newman</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces19.jpg" alt="Kyle Grant"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Kyle Grant</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button type="button" class="btn btn-sm btn-primary">Follow</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                    </div><!-- /.list-group -->
                    <!-- .loading -->
                    <div class="text-center p-3">
                      <!-- .spinner -->
                      <div class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div><!-- /.spinner -->
                    </div><!-- /.loading -->
                  </div><!-- /.modal-body -->
                  <!-- .modal-footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                  </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /Followers Modal -->
            <!-- Following Modal -->
            <!-- .modal -->
            <div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="followingModalLabel" aria-hidden="true">
              <!-- .modal-dialog -->
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <!-- .modal-content -->
                <div class="modal-content">
                  <!-- .modal-header -->
                  <div class="modal-header">
                    <h6 id="followingModalLabel" class="modal-title"> Following </h6>
                  </div><!-- /.modal-header -->
                  <!-- .modal-body -->
                  <div class="modal-body px-0">
                    <!-- .list-group -->
                    <div class="list-group list-group-flush list-group-divider">
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces2.jpg" alt="Johnny Day"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Johnny Day</a>
                          </h4>
                          <p class="list-group-item-text"> Computer Hardware Engineer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces3.jpg" alt="Sarah Bishop"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Sarah Bishop</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces5.jpg" alt="Craig Hansen"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Craig Hansen</a>
                          </h4>
                          <p class="list-group-item-text"> Software Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces9.jpg" alt="Jane Barnes"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Jane Barnes</a>
                          </h4>
                          <p class="list-group-item-text"> Social Worker </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces4.jpg" alt="Nicole Barnett"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Nicole Barnett</a>
                          </h4>
                          <p class="list-group-item-text"> Marketing Manager </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces6.jpg" alt="Michael Ward"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Michael Ward</a>
                          </h4>
                          <p class="list-group-item-text"> Lawyer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces8.jpg" alt="Juan Fuller"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Juan Fuller</a>
                          </h4>
                          <p class="list-group-item-text"> Budget analyst </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces7.jpg" alt="Julia Silva"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Julia Silva</a>
                          </h4>
                          <p class="list-group-item-text"> Photographer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces10.jpg" alt="Joe Hanson"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Joe Hanson</a>
                          </h4>
                          <p class="list-group-item-text"> Logistician </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces11.jpg" alt="Brenda Griffin"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Brenda Griffin</a>
                          </h4>
                          <p class="list-group-item-text"> Medical Assistant </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces12.jpg" alt="Ryan Jimenez"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Ryan Jimenez</a>
                          </h4>
                          <p class="list-group-item-text"> Photographer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces13.jpg" alt="Bryan Hayes"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Bryan Hayes</a>
                          </h4>
                          <p class="list-group-item-text"> Computer Systems Analyst </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces14.jpg" alt="Cynthia Clark"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Cynthia Clark</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces16.jpg" alt="Martha Myers"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Martha Myers</a>
                          </h4>
                          <p class="list-group-item-text"> Writer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces15.jpg" alt="Tammy Beck"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Tammy Beck</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces17.jpg" alt="Susan Kelley"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Susan Kelley</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces18.jpg" alt="Albert Newman"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Albert Newman</a>
                          </h4>
                          <p class="list-group-item-text"> Web Developer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                      <!-- .list-group-item -->
                      <div class="list-group-item">
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <a href="#" class="user-avatar"><img src="{{asset('assets')}}/images/avatars/uifaces19.jpg" alt="Kyle Grant"></a>
                        </div><!-- /.list-group-item-figure -->
                        <!-- .list-group-item-body -->
                        <div class="list-group-item-body">
                          <h4 class="list-group-item-title">
                            <a href="#">Kyle Grant</a>
                          </h4>
                          <p class="list-group-item-text"> Designer </p>
                        </div><!-- /.list-group-item-body -->
                        <!-- .list-group-item-figure -->
                        <div class="list-group-item-figure">
                          <button class="btn btn-sm btn-secondary">Following</button>
                        </div><!-- /.list-group-item-figure -->
                      </div><!-- /.list-group-item -->
                    </div><!-- /.list-group -->
                    <!-- .loading -->
                    <div class="text-center p-3">
                      <!-- .spinner -->
                      <div class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div><!-- /.spinner -->
                    </div><!-- /.loading -->
                  </div><!-- /.modal-body -->
                  <!-- .modal-footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                  </div><!-- /.modal-footer -->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /Following Modal -->
            <!-- .page-navs -->
            <!-- <nav class="page-navs"> -->
              <!-- .nav-scroller -->
              <!-- <div class="nav-scroller"> -->
                <!-- .nav -->
                <!-- <div class="nav nav-center nav-tabs"> -->
                    <!-- <a class="nav-link active" href="user-profile-settings.html">Settings</a> -->
                <!-- </div> -->
              <!-- </div> -->
            <!-- </nav> -->
            <!-- .page-inner -->
            <div class="page-inner">
              
              <!-- .page-section -->
              <div class="page-section">
                <!-- grid row -->
                <div class="row">
                  <!-- grid column -->
                  <div class="col">
                    <!-- .card -->
                    <div class="card card-fluid">
                        <div class="card-header"><strong>Profil Pengguna</strong><small> Ganti Data Diri</small></div>
                        <div class="card-body card-block">
                            <form method="POST" action="{{ route('dashboard.user.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">Nama</label>
                                    <input name="name" type="text" id="name" value="{{ $response->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class=" form-control-label">Nomor Telepon</label>
                                    <input name="phone" type="text" id="phone" value="{{ $response->phone }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" form-control-label">Email</label>
                                    <input name="email" type="email" id="email" value="{{ $response->email }}" class="form-control">
                                </div>
                                <input type="hidden" name="id" value={{ $response->id }}>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('dashboard.user.show') }}" class="btn btn-danger btn-sm">Reset</a>
                                </div>
                            </form>
                        </div>
                      
                    </div><!-- /.card -->
                  </div><!-- /grid column -->
                  <!-- grid column -->
                  <div class="col">
                    <!-- .card -->
                    
                    <div class="card card-fluid">
                        <div class="card-header"><strong>Kata Sandi Pengguna</strong><small> Ganti Kata Sandi</small></div>
                        <div class="card-body card-block">
                            <form method="POST" action="{{ route('user-password.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="current_password" class=" form-control-label">Kata Sandi Sekarang</label>
                                    <input type="password" id="current_password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class=" form-control-label">Kata Sandi Baru</label>
                                    <input type="password" id="new_password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class=" form-control-label">Konfirmasi Kata Sandi Baru</label>
                                    <input type="password" id="new_password_confirm" class="form-control" required>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('dashboard.user.show') }}" class="btn btn-danger btn-sm">Reset</a>
                                </div>
                            </form>
                        </div>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->

@endsection
