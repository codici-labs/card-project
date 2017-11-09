<div class="ui secondary menu">
  <a href="<?=base_url('students/add')?>" class="ui button">Agregar nuevo</a>
  
</div>
<div class="ui segment">
  
  <h2>Alumnos</h2>
  <div class="ui search">
    <div class="ui icon input" style="width:100%;">
      <input class="prompt" type="text" placeholder="Alumno...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
</div>

<div class="ui segment" id="loader">
  <div class="ui active loader"></div>
</div>
<div id="students-container"></div>

<!-- Template: Products -->
<script id="template-students" type="x-tmpl-mustache">
  <table class="ui fixed single line celled table">
    <thead>
      <tr>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Credito</th>
        <th>Mail</th>
      </tr>
    </thead>
    <tbody>
      {{#data}}
      <tr>
        <td>{{apellido}}</td>
        <td>{{nombre}}</td>
        <td>{{credito}}</td>
        <td>{{mail}}</td>
      </tr>
      {{/data}}
    </tbody>
  </table>
 
</script>


<script type="text/javascript">
  //**************************/
  // Get contracts
  //**************************/
  function getStudents(filter){
    $('#loader').show();
    $('#students-container').html('');
    $.ajax({
      url: '<?=base_url();?>students/get',
      data: {filter: filter},
      success: function(data){
        var parsedData = JSON.parse(data);
        var template = $('#template-students').html();
        var rendered = Mustache.render(template, {data: parsedData});
        $('#students-container').html(rendered);
       
        $('#loader').hide();
        
      },
      method: 'post'
    });

  }

  $(document).ready(function(){
    getStudents();

    $('.ui.search')
        .search({
          apiSettings: {
            url: '<?=base_url();?>students/getJson/{query}'
          },
          fields: {
            results : 'items',
            title   : 'apellido',
            url     : 'html_url'
          },
          minCharacters : 3,
          onSelect: function(result, response){
            /*$('.content').hide();
            $('#prduct-detail').html('');
            $('.selected-product-container').fadeIn();
            $('#loader').fadeIn();*/
          
           /*var product_id = result.id;
            $.ajax({
              url: '<?=base_url();?>products/showProductDetails/'+product_id,
              method: 'get',
              success: function(template){
                  $('#loader').fadeOut('100', function(){
                    $('#prduct-detail').html(template);
                    $('#selected-product').fadeIn();
                    $('.content').show();
                   
                  });
                  
              }
            });*/
          }
        })
      ;
  });
</script>