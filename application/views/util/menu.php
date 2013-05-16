<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav">
			{menu_item}
			<li><a href="{base_url}{url}" data-toggle="tooltip"
				data-placement="bottom" title="{descricao}" rel="tooltip">{titulo}</a>
			</li> {/menu_item}
			<li><a href="{base_url}admin/logout" data-toggle="tooltip"
				data-placement="right" title="Logout do sistema" rel="tooltip"> Sair
			</a></li>
		</ul>
	</div>
</div>
<script>
	$(function() {
		$('[rel=tooltip]').tooltip() 
	}); 
</script>

