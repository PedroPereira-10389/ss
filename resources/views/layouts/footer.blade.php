
@include('layouts.footer2')
   
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
  <script src="{{asset('https://colorlib.com/polygon/vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('build/js/custom.js')}}"></script>  

    <script src="{{asset('vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendors/morris.js/morris.min.js')}}"></script>      
    <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>  
    <script src="{{asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>   
    <script src="{{asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>  
    <script src="{{asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>    
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js')}}"></script>
    <script src="{{asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
  

<script>
    $(".alert").fadeTo(10000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
    </script>
    <script>
      $(document).ready(function(){
          // Read value on page load
          $("#result b").html($("#customRange").val());
  
          // Read value on change
          $("#customRange").change(function(){
              $("#result b").html($(this).val());
          });
      });        
  </script> 

<script>
function confirmation(){

    event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formcliente').submit();
    }); 
}
</script>

<script>
    function confirmation2(){
        event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formcliente').submit();
    }); 

    }

    </script>

<script>
    function confirmation3(){
        event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formfuncionario').submit();
    }); 

    }

    </script>

<script>
    function confirmation4(){
        
        event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formencomenda').submit();
    }); 

    }

    </script>

<script>
    function confirmation5(){
        
        event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formartigo').submit();
    }); 

    }

    </script>
    

    <script>
        function confirmation6(){
            
            event.preventDefault();
            
            swal({
                    title: "Pretende alterar os dados?",
                    text: "Caso confirme poderá alterar novamente",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-warning waves-effect waves-light',
                    confirmButtonText: "Alterar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                    document.getElementById('formprofile').submit();
        }); 
    
        }
    
        </script>

<script>
    function confirmation9(){
        
        event.preventDefault();
        
        swal({
                title: "Pretende alterar os dados?",
                text: "Caso confirme poderá alterar novamente",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Alterar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
                document.getElementById('formeditdespesa').submit();
    }); 

    }

    </script>




<script>
$('.deletebtn').on('click', function (event) {
    event.preventDefault();

    var id = $(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  
            swal({
                title: "Pretende eliminar o cliente?",
                text: "Os dados eliminados, não podem ser recuperados",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(){
            $.ajax({           
            url: "eliminarclienteid",
            type:"GET",
            data: {id:id,_token: CSRF_TOKEN},
            success:function(response){
                window.location=response.url;
            },
            error:function(){
                console.log("error");
            }
        })
    }); 
});
</script>
<script>
    $('.deletebtnreuniao').on('click', function (event) {
        event.preventDefault();
    
        var id = $(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
                swal({
                    title: "Pretende eliminar a reunião?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                $.ajax({           
                url: "eliminarreuniaoid",
                type:"GET",
                data: {id:id,_token: CSRF_TOKEN},
                success:function(response){
                    window.location=response.url;
                },
                error:function(){
                    console.log("error");
                }
            })
        }); 
    });
    </script>
<script>
    $('.deletebtnfuncionario').on('click', function (event) {
        event.preventDefault();
    
        var id = $(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
                swal({
                    title: "Pretende eliminar o funcionário?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                $.ajax({           
                url: "eliminarfuncionarioid",
                type:"GET",
                data: {id:id,_token: CSRF_TOKEN},
                success:function(response){
                    window.location=response.url;
                },
                error:function(){
                    console.log("error");
                }
            })
        }); 
    });
    </script>

<script>
$(document).ready(function(){
  $("#quantidade").change(function(e){
    e.preventDefault();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var quantidade = $(this).val(); // this.value
    var idfuncionario = $('#idfuncionario').attr('value');
    var precokilo = $("#precoacordado").val();
    
    var preco = quantidade * precokilo;
    $('#ultimopreco').inputmask({'mask':"9{0,5}.9{0,2}", greedy: false});
    var preco1 =  $("#ultimopreco").val(preco);
    var preco2 = $("#ultimopreco").val();
    $("#btneditvalue").show();
    });
  });
</script>

<script>
    $(document).ready(function(){
      $("#precoacordado").change(function(e){
        e.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var quantidade = $('#quantidade').val(); // this.value
        var idfuncionario = $('#idfuncionario').attr('value');
        var precokilo = $(this).val();       
        var preco = quantidade * precokilo;
        $('#ultimopreco').inputmask({'mask':"9{0,5}.9{0,2}", greedy: false});
        var preco1 =  $("#ultimopreco").val(preco);
        var preco2 = $("#ultimopreco").val();
        $("#btneditvalue").show();
        });
      });
    </script>




<script>
$(".editvalue").click(function(){

    var idfuncionario=$('#idfuncionario').attr('value');
    var quantidade= $("#quantidade").val();
    var ultimopreco= $("#ultimopreco").val();
    var precoacordado= $("#precoacordado").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
                    title: "Pretende editar os valores?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-warning waves-effect waves-light',
                    confirmButtonText: "Alterar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                    $.ajax({
                     url:"{{ route('editarvaloresfuncionario') }}",
                    type:'POST',  // change your route to use POST too
                    datatype:'JSON',
                    context: this,
                    data: {id: idfuncionario,_token: CSRF_TOKEN,quantidade:quantidade,ultimopreco:ultimopreco,precoacordado:precoacordado},  // set the data from the dropdown
                success: function( res ) {
                    window.location.href = res
              
          },
          error: function() {
              console.log( "Ajax Not Working" );
          }
    });
        }); 
  
});
    </script>


<script>
    $('.deletebtnencomenda').on('click', function (event) {
        event.preventDefault();
    
        var id = $(this).data("id");
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
                swal({
                    title: "Pretende eliminar a encomenda?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                $.ajax({           
                url: "eliminarencomendaid",
                type:"GET",
                data: {id:id,_token: CSRF_TOKEN},
                success:function(response){

                    
                    window.location=response.url;
                },
                error:function(){
                    console.log("error");
                }
            })
        }); 
    });
    </script>
    

<script>
        $(document).ready(function(){
          $("#precovenda").change(function(e){
            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var precovenda = $(this).val(); // this.value
            var idfuncionario = $('#idproduto').attr('value');
            var precocusto = $("#precocusto").val();
            var desconto = $("#desconto").val();
            var precovendadesconto= precovenda - (precovenda*desconto) 
            
           var total = precovendadesconto - precocusto;

            $('#margem').inputmask({'mask':"9{0,5}.9{0,3}", greedy: false});

            var precocustofloat = parseFloat(precocusto);
            var precovendafloat = parseFloat(precovenda);
            if(precocustofloat<=precovendafloat)
        {
            var margem =  $("#margem").val(total);
            $("#refreshspin").show();
        

        }

        if(precocustofloat>precovendafloat)
        {
            total= '';
            $("#margem").val(total);

            swal({
                        title: "Verifique os valores",
                        text: "Preço de venda menor que o Preço de custo",
                        type: "error",
                        showCancelButton: true,
                        cancelButtonText: "Voltar",
                        closeOnCancel: true
                    },
                    function(){
          
            });
    
        }

       




            
        
          


            });
          });




        </script>

<script>
    $(document).ready(function(){
      $("#precocusto").change(function(e){
        e.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var precocusto = $(this).val(); // this.value
        var idfuncionario = $('#idproduto').attr('value');
        var precovenda = $("#precovenda").val();
        var desconto = $("#desconto").val();
        var precovendadesconto= precovenda - (precovenda*desconto) 
        
       var total = precovendadesconto - precocusto;
       

        $('#margem').inputmask({'mask':"9{0,5}.9{0,3}", greedy: false});

       

            var precocustofloat = parseFloat(precocusto);
            var precovendafloat = parseFloat(precovenda);

            if(precocustofloat<=precovendafloat)
        {
            var margem =  $("#margem").val(total);
            $("#refreshspin").show();
        

        }

        if(precocustofloat>precovendafloat)
        {
            total= '';
            $("#margem").val(total);

            swal({
                        title: "Verifique os valores",
                        text: "Preço de venda menor que o Preço de custo",
                        type: "error",
                        showCancelButton: true,
                        cancelButtonText: "Voltar",
                        closeOnCancel: true
                    },
                    function(){
          
            });
    
        }

      
           
          
        });
      });
    </script>

    
<script>
    $(document).ready(function(){
      $("#desconto").change(function(e){
        e.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var desconto = $(this).val(); // this.value
        var idproduto = $('#idproduto').attr('value');
        var precovenda = $("#precovenda").val();
        var precocusto = $("#precocusto").val();
        var precovendadesconto= precovenda - (precovenda*desconto) 
        
       var total = precovendadesconto - precocusto;
       
        $('#margem').inputmask({'mask':"9{0,5}.9{0,2}", greedy: false});
        var margem =  $("#margem").val(total);
        var margem2 = $("#margem").val();
        $("#refreshspin").show();
        });
      });
    </script>

<script>
    $(".refreshspin").click(function(){
    
        var desconto = $('#desconto').val(); // this.value
        var idproduto = $('#idproduto').attr('value');
        var precovenda = $("#precovenda").val();
        var precocusto = $("#precocusto").val();
        var iva = $("#iva").val();
     


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        swal({
                        title: "Pretende atualizar os valores?",
                        text: "A qualquer momento pode voltar a atualizar!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-warning waves-effect waves-light',
                        confirmButtonText: "Actualizar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(){
                        $.ajax({
                         url:"{{ route('editarvaloresprodutos') }}",
                        type:'POST',  // change your route to use POST too
                        datatype:'JSON',
                        context: this,
                        data: {id: idproduto,_token: CSRF_TOKEN,precovenda:precovenda,precocusto:precocusto,desconto:desconto,iva:iva},  // set the data from the dropdown
                    success: function( res ) {
                        window.location.href = res
                  
              },
              error: function() {
                  console.log( "Ajax Not Working" );
              }
        });
            }); 
      
    });
        </script>

<script>
    $('.deletebtnprodutos').on('click', function (event) {
        event.preventDefault();
    
        var id = $(this).data("id");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
                swal({
                    title: "Pretende eliminar o produto?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                $.ajax({           
                url: "eliminarprodutoid",
                type:"GET",
                data: {id:id,_token: CSRF_TOKEN},
                success:function(response){
                    window.location=response.url;
                },
                error:function(){
                    console.log("error");
                }
            })
        }); 
    });
    </script>   
<script>
    $('.deletedespesa').on('click', function (event) {
        event.preventDefault();
    
        var id = $(this).data("id");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
                swal({
                    title: "Pretende eliminar a despesa?",
                    text: "Os dados eliminados, não podem ser recuperados",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(){
                $.ajax({           
                url: "eliminardespesaid",
                type:"GET",
                data: {id:id,_token: CSRF_TOKEN},
                success:function(response){
                    window.location=response.url;
                },
                error:function(){
                    console.log("error");
                }
            })
        }); 
    });
    </script>

        
