<div class="ui secondary menu">
  <a class="item" href="<?=base_url('stock');?>">
    <i class="left arrow icon"></i> Volver 
  </a>
  <a class="item">
    <i class="search arrow icon"></i>  Ver todo el stock
  </a>
 
  <div class="right menu">
   
  </div>
</div>
<div class="ui segment">
	<h2>Agregar stock</h2>
  
  <p>Por favor busque el producto al que desea agregar stock o cree uno <a href="javascript:void(0);" class="add-product">nuevo</a>.</p>
  <div class="ui search">
    <div class="ui icon input">
      <input class="prompt" type="text" placeholder="Producto...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
  <div class="ui segment selected-product-container" >
      <div class="ui active loader" id="loader"></div>
     
      <div class="ui" id="selected-product">
       
        <div class="content">
          <div id="prduct-detail"></div>
          <hr>
          <div class="ui form">
            <div class="fields">
              <div class="field">
                <label>Cantidad</label>
                <input type="number">
              </div>
              <div class="field">
                <label>Precio de compra</label>
                <input type="number">
              </div>
              <div class="field">
                <label>&nbsp;</label>
                <a href="javascript:void(0);">
                  <div class="ui animated button green" tabindex="0">
                    <div class="visible content">Guardar</div>
                    <div class="hidden content">
                      <i class="check icon"></i>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>  
  </div>
</div>


<!-- Modal para agregar nuevo producto desde aqui -->
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Agregar producto
  </div>
  <div class="content">
    
    <div class="description">
      <div class="ui header">Complete los detalles del producto</div>
      <div class="ui form">
        <div class="fields">
          <div class="field">
            <label>Nombre</label>
            <input type="text">
          </div>
          <div class="field">
            <label>Código de barras</label>
            <input type="number">
          </div>
          <div class="field">
            <label>Precio de venta</label>
            <input type="text">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Cancelar
    </div>
    <div class="ui positive right labeled icon button">
      Guardar
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>
<!-- / Modal -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.ui.search')
        .search({
          apiSettings: {
            url: '<?=base_url();?>products/getJson/{query}'
          },
          // fields: {
          //   results : 'items',
          //   title   : 'descripcion',
          //   url     : 'html_url'
          // },
          minCharacters : 1,
          onSelect: function(result, response){
            // $('.content').hide();
            // $('#prduct-detail').html('');
            // $('.selected-product-container').fadeIn();
            // $('#loader').fadeIn();
          
            // var product_id = result.id;
            // $.ajax({
            //   url: '<?=base_url();?>products/showProductDetails/'+product_id,
            //   method: 'get',
            //   success: function(template){
            //       $('#loader').fadeOut('100', function(){
            //         $('#prduct-detail').html(template);
            //         $('#selected-product').fadeIn();
            //         $('.content').show();
                   
            //       });
                  
            //   }
            // });
          }
        })
      ;

      $('.add-product').click(function(){
        $('.ui.modal').modal('show');
      });
  });
</script>