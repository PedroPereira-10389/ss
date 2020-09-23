@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')

		<!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alterar Dados</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Cliente</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form class="form-label-left input_mask" id="formcliente" action="{{ route('editarreuniaoid')}}" method="POST">
                                    {{ csrf_field() }}
                                <input type="hidden" name="idreuniao" value="{{$reunioesid->idreuniao}}">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    @foreach($clientes as $cliente)
                                    <select class="form-control has-feedback-left" tabindex="-1" name="idcliente">
                                    <option value="{{$reunioesid->idcliente}}">{{$reunioesid->nomecliente}}</option>
                                    <option value="{{$cliente->idcliente}}">{{$cliente->nome}}</option>     
                                    </select>
                                    @endforeach
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="nome" value="{{$reunioesid->objetivo}}">
                                        <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="datainicio" value="{{$reunioesid->datainicio}}">
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="datafim" value="{{$reunioesid->datafim}}">
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="horainicio" value="{{$reunioesid->horainicio}}">
                                        <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="horafim" value="{{$reunioesid->horafim}}">
                                        <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="sala" value="{{$reunioesid->sala}}">
                                        <span class="fa  fa-suitcase form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">                                      
                                        <button type="submit" id="editcliente"  class="btn btn-warning" onclick="return confirmation2();">Alterar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
      

            </div>
        </div>

@include('layouts.footer')

</body>
</html>