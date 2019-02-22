$(document).ready(function() 
{
	 var $statelist, $usamap,
	 default_options =
        {
            fillOpacity: 0.6,
            render_highlight: {
                fillColor: '2aff00',
                stroke: true,
				strokeColor: '000000'
            },
            render_select: {
                 fillColor: '2aff00',
                stroke: true,
				strokeColor: '000000'
            },
            mouseoutDelay: 0,
            fadeInterval: 50,
            isSelectable: true,
            singleSelect: true,
            mapKey: 'municipio',
            mapValue: 'full',
			showToolTip: true,
			clickNavigate: true,
			onMouseover: function(e)
			{
				//alert(e.toSource());
				$usamap.mapster('tooltip',this,e.key);
			},
			onClick: goUrlMap
        };
		
		$usamap = $('#image');
        $usamap.mapster(default_options);
		$("a").mouseover(function()
		{
			$usamap.mapster('set', true, $(this).attr('id'));
  });
  $("a").mouseout(function(){
			$usamap.mapster('set', false, $(this).attr('id'));
  });
	
	function goUrlMap(e) 
	{
		//alert(e.toSource());
	//	window.open("http://upla.zacatecas.gob.mx/"+e.key);
	}
	
	$("#listLocalidades").find('a').click(function()
	{
	//	window.open("http://upla.zacatecas.gob.mx/"+$(this).attr('id'));
		//alert($(this).attr('id'))
	});		
});