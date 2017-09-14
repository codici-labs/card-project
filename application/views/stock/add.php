<div class="ui secondary  menu">
  <a class="active item" href="<?=base_url();?>stock/add">
    Agrear nuevo
  </a>
  <a class="item">
    Messages
  </a>
  <a class="item">
    Friends
  </a>
  <div class="right menu">
    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
    <a class="ui item">
      Logout
    </a>
  </div>
</div>
<div class="ui segment">
	<h2>Agregar stock</h2>
  <div class="ui stackable two column grid">
    <div class="column">
      <p>Por favor busque el producto al que desea agregar stock o cree uno <a href="">nuevo</a>.</p>
        <div class="ui search">
          <div class="ui icon input">
            <input class="prompt" type="text" placeholder="Producto...">
            <i class="search icon"></i>
          </div>
          <div class="results"></div>
        </div>
    </div>
    <div class="column">
      <div class="ui segment" id="loader">
        <div class="ui active loader"></div>
        <br>
        <br>
  
      </div>
      <div id="prduct-detail"></div>
    </div>
    
  </div>
  

  
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.ui.search')
        .search({
          apiSettings: {
            url: '<?=base_url();?>products/getJson/{query}'
          },
          fields: {
            results : 'items',
            title   : 'name',
            url     : 'html_url'
          },
          minCharacters : 3,
          onSelect: function(result, response){
            $('#prduct-detail').html('');
            $('#loader').fadeIn();
          
            var product_id = result.id_producto;
            $.ajax({
              url: '<?=base_url();?>products/showProductDetails/'+product_id,
              method: 'get',
              success: function(template){
                  $('#loader').fadeOut('100', function(){
                    $('#prduct-detail').html(template);
                  });
                  
              }
            });
          }
        })
      ;
  });
</script>