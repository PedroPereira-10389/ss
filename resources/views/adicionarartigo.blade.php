@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')

		<!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Criar Ficha de Produto</h3>
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
                                <h2>Produto</h2>
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
                                <form class="form-label-left input_mask" action="{{route('storeproduto') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left"   name ="referencia" placeholder="Referência..." >
                                        <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"  name="descricao" placeholder="Designação..." >
                                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-left"  name="precovenda" placeholder="Peço de Venda..." step=".01">
                                        <span class="fa  fa-eur form-control-feedback left" aria-hidden="true" ></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-left"  name="precocusto"  placeholder="Preço de Custo..." step=".01">
                                        <span class="fa  fa-eur form-control-feedback left" aria-hidden="true"   ></span>
                                    </div>                                   
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-left"  name="desconto" placeholder="Desconto Associado..." step=".01">
                                        <span class="fa fa-percent form-control-feedback left" aria-hidden="true" ></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">     
                                        <select class="form-control has-feedback-left" tabindex="-1" name="iva">
                                        <option>--Selecione o Iva--</option>
                                        <option value="0.05">6 %</option>   
                                        <option value="0.16">13 %</option>   
                                        <option value="0.23">23 %</option>   
                                        </select>
                                        <span class="fa  fa fa-percent form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"  name="validadeinicio" placeholder="Validade Mínima..." data-inputmask="'mask': '9999/99/99'" >
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true" ></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"  name="validadefim" placeholder="Validade Máxima..." data-inputmask="'mask': '9999/99/99'" >
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true" ></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"  name="lote" placeholder="Lote..." >
                                        <span class="fa  fa-cube form-control-feedback left" aria-hidden="true" ></span>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01" accept="image/jpeg">
                                                <label class="custom-file-label" for="inputGroupFile01">Selecione a foto do produto</label>
                                              </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">                                      
                                        <button type="submit"  class="btn btn-success">Adicionar</button>
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