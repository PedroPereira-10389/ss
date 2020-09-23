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
                                <h2>Despesa</h2>
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
                                <form class="form-label-left input_mask" id="formeditdespesa" action="{{ route('editardespesaform')}}" method="POST">
                                    {{ csrf_field() }}
                                <input type="hidden" name="iddespesa" value="{{$despesas->iddespesa}}">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="{{$despesas->descricao}}" readonly>
                                        <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="valor" value="{{$despesas->valor}}" >
                                        <span class="fa fa-eur form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">                                       
                                        <select class="form-control has-feedback-left" tabindex="-1" name="formapagamento">
                                        <option value="{{$despesas->formapagamento}}">{{$despesas->formapagamento}}</option>
                                        <option></option>
                                        <option value="Dinheiro">Dinheiro</option>
                                        <option value="Multibanco">Multibanco</option>
                                        <option value="Cheque">Cheque</option>
                                        </select>
                                        <span class="fa  fa-credit-card  form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">                                       
                                        <select class="form-control has-feedback-left" tabindex="-1" name="estado">
                                        @if($despesas->estado == 0)
                                        <option value="{{$despesas->estado}}">Pendente</option>
                                        @else
                                        <option value="{{$despesas->estado}}">Pago</option>
                                        @endif
                                        <option></option>
                                        <option value="0">Pendente</option>
                                        <option value="1">Pago</option>
                                        </select>
                                        <span class="fa  fa-check form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">                                      
                                        <button type="submit" id="editcliente"  class="btn btn-warning" onclick="return confirmation9();">Alterar</button>
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