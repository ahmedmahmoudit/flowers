@extends('layouts.master')


@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-dark c-font-uppercase">Modals</h3>
                    <div class="c-line-center c-theme-bg"></div>
                    <p class="c-center">Modals can be used with any component, block or content.</p>
                </div>

                <div class="c-content-panel">
                    <div class="c-label">default demo</div>
                    <div class="c-body">
                        <button type="button" class="btn c-btn-red c-btn-square c-btn-bold c-btn-uppercase" data-toggle="modal" data-target="#myModal">
                            Launch default modal
                        </button>
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident,
                                            sunt in culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase">Submit</button>
                                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- Large modal -->
                        <button type="button" class="btn c-btn-blue c-btn-square c-btn-bold c-btn-uppercase" data-toggle="modal" data-target=".bs-example-modal-lg">Launch Large modal</button>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content c-square">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident,
                                            sunt in culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn c-btn-dark c-btn-square c-btn-bold c-btn-uppercase">Submit</button>
                                        <button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- Small modal -->
                        <button type="button" class="btn c-btn-green c-btn-square c-btn-bold c-btn-uppercase" data-toggle="modal" data-target=".bs-example-modal-sm">Launch Small modal</button>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content c-square">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase">Submit</button>
                                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <button type="button" class="btn c-btn-purple c-btn-square c-btn-bold c-btn-uppercase" data-toggle="modal" data-target="#gridSystemModal">
                            Launch Long Modal
                        </button>
                        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title" id="gridModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident,
                                            sunt in culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase">Submit</button>
                                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!-- END: PAGE CONTENT -->
    </div>
@endsection