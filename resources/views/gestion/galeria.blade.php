@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Imagenes
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdgaleria')
		->contentType('application/json')
		->type('POST');
		
		//Inicializamos el Data Source de Transporte
		$transport = new \Kendo\Data\DataSourceTransport();

		//Agregamos atributos al datasource de transporte
		$transport
		->read($read)
		->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

		//Inicializamos el Modelo para la grid
		$model = new \Kendo\Data\DataSourceSchemaModel();

		//Inicializamos las columnas del Modelo
	

		$nombreGaleria = new \Kendo\Data\DataSourceSchemaModelField('nombreGaleria');
		$nombreGaleria->type('string');

		$descripcion = new \Kendo\Data\DataSourceSchemaModelField('descripcion');
		$descripcion->type('string');

		$nombreEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('nombreEstablecimiento');
		$nombreEstablecimiento->type('string');

		$imagen = new \Kendo\Data\DataSourceSchemaModelField('imagen');
		$imagen->type('string');

		$nombreGaleria = new \Kendo\Data\DataSourceSchemaModelField('nombreGaleria');
		$nombreGaleria->type('string');

		$estadoGaleria = new \Kendo\Data\DataSourceSchemaModelField('estadoGaleria');
		$estadoGaleria->type('string');

		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');

		//Agregamos las columnas al modelo de l grid
		$model
		->addField($nombreGaleria)
		->addField($descripcion)
		->addField($nombreEstablecimiento)
		->addField($imagen)
		->addField($nombreGaleria)
		->addField($accion)
		->addField($estadoGaleria);

		//Inicializamos el esquema de la grid
		$schema = new \Kendo\Data\DataSourceSchema();

		//Agregamos los aributos del esquema de l grid
		$schema
		->data('data')
		->model($model)
		->total('total');

		//Inicializamos el Data Source
		$dataSource = new \Kendo\Data\DataSource();

		//Agregamos atributos al datasource
		$dataSource
		->transport($transport)
		->pageSize(5)
		->schema($schema)
		->serverFiltering(true)
		->serverSorting(true)
		->serverPaging(true);

		//Inicializamos la grid
		$grid = new \Kendo\UI\Grid('grid');

		//Inicializamos las columnas de la grid
		$nombreGaleria = new \Kendo\UI\GridColumn();
		$nombreGaleria->field('nombreGaleria')->title('Nombre');

		$descripcion = new \Kendo\UI\GridColumn();
		$descripcion->field('descripcion')->title('descripcion');

		$nombreEstablecimiento = new \Kendo\UI\GridColumn();
		$nombreEstablecimiento->field('nombreEstablecimiento')->title('Establecimiento');

		$imagen = new \Kendo\UI\GridColumn();
		$imagen->field('imagen')->title('imagen')->hidden(true);

		$nombreGaleria = new \Kendo\UI\GridColumn();
		$nombreGaleria->field('nombreGaleria')->title('Tipo');

		$estadoGaleria = new \Kendo\UI\GridColumn();
		$estadoGaleria->field('estadoGaleria')->title('estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');


		$Column = new \Kendo\UI\GridColumn();
		$Column->field('ColumnName')
		->title('imagen')
		//->attributes(' bgcolor = '.getColorForValue(#: Column #) )
		->templateId('ColumnTemplate');	


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreGaleria, $descripcion, $nombreEstablecimiento,$imagen,$nombreGaleria,$estadoGaleria,$Column,$accion)
		->dataSource($dataSource)	
		->sortable(true)
		->filterable($gridFilterable)
		->pageable(true);

		//renderizamos la grid
		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
	
	</div>
</div>

@endsection



<script id="ColumnTemplate" type="text/x-kendo-tmpl">
   <img src="data:image/png;base64,#= imagen #" width="100" height="100" />
</script>

<script id="accion" type="text/x-kendo-tmpl">
<div>

      <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
</div>
  
</script>

